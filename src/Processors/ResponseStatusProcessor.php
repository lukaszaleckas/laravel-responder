<?php

namespace LaravelResponder\Processors;

use Illuminate\Http\Response;
use LaravelResponder\Processors\Contracts\ProcessorInterface;

class ResponseStatusProcessor implements ProcessorInterface
{
    /**
     * @param Response $response
     * @return Response
     */
    public function process(Response $response): Response
    {
        return $response->setContent([
            'status'  => $response->status(),
            'success' => $response->isSuccessful(),
            'data'    => $response->getOriginalContent()
        ]);
    }
}
