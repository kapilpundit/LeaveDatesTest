<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test to get all websites.
     *
     * @return void
     */
    public function testWebsites()
    {
        Website::factory()->times(3)->create();

        $response = $this->get('api/websites');

        $response->assertStatus(200);

        /**
         * Assert three websites created in database
         */
        $this->assertEquals(
            count($response['data']['websites']),
            3
        );

        $this->assertArrayHasKey('name', $response['data']['websites'][0]);
        $this->assertArrayHasKey('url', $response['data']['websites'][0]);
    }
}
