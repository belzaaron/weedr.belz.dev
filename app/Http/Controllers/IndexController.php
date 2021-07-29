<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('index', [
            'widget' => app(GenerationController::class)->perform('20001').'?unit=us',
        ]);
    }
}
