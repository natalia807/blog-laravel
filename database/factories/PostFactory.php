<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(), 
            'content' => $this->faker->paragraph(3, true), 
            'user_id' => User::factory(),
            'image' => $this->faker->imageUrl(640, 480, 'posts', true),
        ];
    }
}