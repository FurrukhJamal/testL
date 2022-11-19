<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
        return [
            "title" => fake()->sentence(5),
            "excerpt" => fake()->sentence(10),
            "body" => fake()->paragraph(),
            "slug" => fake()->slug(),
            "user_id" => User::factory(),
            "category_id" => Category::factory(),
        ];
    }
}
