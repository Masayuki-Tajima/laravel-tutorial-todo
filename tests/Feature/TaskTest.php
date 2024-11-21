<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_task_can_be_stored()
    {
        $task = [
            'task_name' => 'テストタスク',
            'due_date' => '2024-11-21 22:00:00',
            'is_deleted' => 0
        ];
        $this->post(route('tasks.store'), $task);

        $this->assertDatabaseHas('tasks', $task);
    }
}
