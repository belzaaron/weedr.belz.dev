<?php

namespace App\Http\Controllers;

use App\Exceptions\ZipcodeNotFoundException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GenerationController extends Controller
{
    /**
     * The time to live for caching.
     *
     * @return int
     */
    public function ttl(): int
    {
        return 600;
    }

    /**
     * Handle the incoming request.
     *
     * @param  string  $zip
     * @return \Illuminate\Http\Response
     */
    public function perform(string $zip)
    {
        if (Cache::has("full:{$zip}")) return Cache::get("full:{$zip}");

        $url = $this->getUrl(
            $this->getPlaceId($zip)
        );

        return Cache::remember("full:{$zip}", $this->ttl(), function () use ($url) {
            return "https://forecast7.com/en/{$url}/";
        });
    }

    /**
     * Get the place id from Forecast7's Autocomplete endpoint.
     *
     * @param string $zip
     * @return string
     */
    public function getPlaceId(string $zip): string
    {
        return Cache::remember("placeId:{$zip}", $this->ttl(), function () use ($zip) {
            $response = Http::get("https://forecast7.com/api/autocomplete/{$zip}");

            $this->breakHereIfNotFound($response);

            return $response->json('0.place_id');
        });
    }

    /**
     * Get the url from the Forecast7 endpoint.
     *
     * @param string $placeId
     * @return string
     */
    public function getUrl(string $placeId): string
    {
        return Cache::remember("url:{$placeId}", $this->ttl(), function () use ($placeId) {
            $response = Http::get("https://forecast7.com/api/getUrl/{$placeId}");

            $this->breakHereIfNotFound($response);

            return $response->body();
        });
    }

    /**
     * Throws an exeception if the response is a failure.
     *
     * @param Response $response
     * @return void
     * @throws \App\Exceptions\ZipcodeNotFoundException
     */
    public function breakHereIfNotFound(Response $response): void
    {
        throw_if($response->failed(), ZipcodeNotFoundException::class);
    }
}
