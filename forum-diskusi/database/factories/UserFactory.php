<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => fake()->unique()->userName(),
            'email'    => fake()->unique()->safeEmail(), // ✅ Tambahkan ini
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}