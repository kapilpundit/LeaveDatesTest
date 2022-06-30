<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CommonTestTraits;
use Tests\TestCase;

class UserWebsiteTest extends TestCase
{
    use RefreshDatabase;
    use CommonTestTraits;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSubscribeUserToWebsite()
    {
        $user = User::factory()->create();
        $website = Website::factory()->create();

        $response = $this->postJson(
            '/api/user/' . $user->id . '/website/' . $website->id,
            []
        );

        $response->assertStatus(200);

        $expected = [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'websites' => [
                    [
                        'id' => $website->id,
                        'name' => $website->name,
                        'url' => $website->url,
                    ]
                ],
            ]
        ];

        $response->assertJson($expected);
    }
}
