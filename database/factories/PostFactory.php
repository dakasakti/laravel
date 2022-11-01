<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->sentence(2);

        return [
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title, '-'),
            'body' => fake()->paragraph(),
            'user_id' => rand(1,5),
        ];
    }
}
