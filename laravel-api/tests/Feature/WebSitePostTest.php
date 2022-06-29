<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CommonTestTraits;
use Tests\TestCase;

class WebSitePostTest extends TestCase
{
    use RefreshDatabase;
    use CommonTestTraits;

    protected $website;

    protected function setUp(): void
    {
        parent::setUp();

        $this->website = Website::factory()
            ->create(
                [
                    'name' => 'example.com',
                    'url' => 'http://example.com',
                ]
            );
    }

    /**
     * Create Website Post Validations Test.
     *
     * @return void
     */
    public function testValidationsCreateWebsitePost()
    {
        $response = $this->post(
            '/api/posts/'. $this->website->id .'/create',
            [
                'title' => '',
                'body' => ''
            ]
        );

        $decoded = $this->decodeResponse($response);

        $expected = [
            'title' => [
                0 => 'The title field is required.'
            ],
            'body' => [
                0 => 'The body field is required.'
            ],
        ];

        $this->assertEquals($expected, $decoded);
    }

    /**
     * Create Website Post Test.
     *
     * @return void
     */
    public function testCreateWebsitePost()
    {
        $data = [
            'title' => 'Post 1',
            'body' => 'Post 1 body',
        ];

        $response = $this->postJson(
            '/api/posts/'. $this->website->id .'/create',
            $data
        );

        $response->assertStatus(200);

        $expected = [
            'post' => [
                'title' => 'Post 1',
                'body' => 'Post 1 body',
            ],
        ];

        $response->assertJson($expected);
    }
}
