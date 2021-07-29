<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ZipcodeNotFoundException extends HttpException
{
    /**
     * Instantiate a new error instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(422, 'Zipcode was not found.');
    }
}
