<?php

namespace Tests\Feature\Livewire;

use App\Models\Task;
use App\Livewire\Tasks\UpdateTasks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateTasksTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_updates_a_task_and_redirects_to_search_tasks()
    {
        $task = Task::factory()->create();

        Livewire::test(UpdateTasks::class, ['task' => $task])
            ->set('description', 'Nova Tarefa')
            ->set('complete', true)
            ->call('updateTask')
            ->assertRedirect(route('tasks.index'));

        $this->assertTrue(Task::where('description', 'Nova Tarefa')->exists());
    }

    /** @test */
    public function description_field_is_required()
    {
        $task = Task::factory()->create();

        Livewire::test(UpdateTasks::class, ['task' => $task])
            ->set('form.description', '')
            ->call('updateTask')
            ->assertHasErrors(['form.description' => 'required']);
    }
}
