<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener el usuario con ID 1
        $user = User::find(1);
        
        // IDs de las categorías cine y videojuegos
        $categoryIds = Category::pluck('id')->toArray();

        return [
            'author_id' => $user->id,
            'category_id' => $this->faker->randomElement($categoryIds),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'habilitated' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}