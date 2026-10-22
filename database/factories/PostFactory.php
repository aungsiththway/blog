<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'status' => fake()->randomElement(['draft', 'published']),
            'description' => fake()->paragraph(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
