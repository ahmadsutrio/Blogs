<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $status = ['published','private'];
        return [
            'title'=>$title,
            'slug'=>Str::slug($title),
            'status'=>fake()->randomElement($status),
            'foto'=>"public/blogs/default.png",
            'content'=>fake()->paragraph(100),
            'id_users'=>1,
            'id_kategori'=>1
        ];
    }
}
