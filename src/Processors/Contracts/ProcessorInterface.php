<?php

namespace LaravelResponder\Processors\Contracts;

use Illuminate\Http\Response;

interface ProcessorInterface
{
    /**
     * @param Response $response
     * @return Response
     */
    public function process(Response $response): Response;
}
