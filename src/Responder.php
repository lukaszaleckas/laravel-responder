<?php

namespace LaravelResponder;

use Illuminate\Http\Response;
use LaravelResponder\Processors\Contracts\ProcessorInterface;

class Responder
{
    /** @var ProcessorInterface[] */
    private array $processors;

    /**
     * @param ProcessorInterface ...$processors
     */
    public function __construct(ProcessorInterface ...$processors)
    {
        $this->processors = $processors;
    }

    /**
     * @param mixed $data
     * @param int   $status
     * @return Response
     */
    public function buildResponse(mixed $data = null, int $status = 200): Response
    {
        $response = response($data, $status);

        foreach ($this->processors as $processor) {
            $response = $processor->process($response);
        }

        return $response;
    }
}
