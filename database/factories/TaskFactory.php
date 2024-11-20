<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_name' => fake()->randomElement(['掃除', '洗濯', '皿洗い', '資格勉強', '歯磨き', '布団干し', '草むしり']),
            'due_date' => fake()->dateTime(),
            'is_deleted' => false,
        ];
    }
}
