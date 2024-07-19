<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $userName;
    protected $userId;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->getUserNameAndId();

        return [
            'name' => fake()->title(),
            'body' => fake()->text(),
            'user_name' => $this->userName,
            'user_id' => $this->userId,
            'created_at' => now(),
        ];
    }

    private function getUserNameAndId()
    {
        $this->userName = User::inRandomOrder()->first()->name;
        return $this->userId = User::inRandomOrder()->where('name', $this->userName)->first()->id;
    }
}
