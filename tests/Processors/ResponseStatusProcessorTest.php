<?php

namespace Tests\Processors;

use Illuminate\Support\Facades\Config;
use LaravelResponder\Processors\ResponseStatusProcessor;
use LaravelResponder\Responder;
use Tests\AbstractTest;

class ResponseStatusProcessorTest extends AbstractTest
{
    /** @var Responder */
    protected Responder $responder;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('responder.processors', [
            ResponseStatusProcessor::class
        ]);

        $this->responder = app(Responder::class);
    }

    /**
     * @dataProvider dataProvider
     *
     * @param int   $status
     * @param mixed $data
     * @param bool  $success
     * @return void
     */
    public function testProcessesResponse(int $status, mixed $data, bool $success): void
    {
        self::assertEquals(
            [
                'status'  => $status,
                'data'    => $data,
                'success' => $success
            ],
            $this->responder->buildResponse($data, $status)->getOriginalContent()
        );
    }

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        $this->setUp();

        return [
            [200, [$this->faker->word => $this->faker->sentence], true],
            [400, [], false],
        ];
    }
}
