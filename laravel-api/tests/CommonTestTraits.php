<?php

namespace Tests;

use Illuminate\Testing\TestResponse;

trait CommonTestTraits
{
    protected function decodeResponse(TestResponse $response): array
    {
        return json_decode($response->getContent(), true);
    }
}
