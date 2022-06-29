<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $website = Website::factory()->create();

        return [
            'website_id' => $website->id,
            'title' => $this->faker->numerify('Post ###'),
            'body' => $this->faker->text(200),
        ];
    }
}
