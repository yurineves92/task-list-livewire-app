<?php

namespace Tests\Feature\Livewire;


use App\Livewire\Tasks\CreateTasks;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    /** @test */
    public function it_creates_a_task_and_redirects_to_search_tasks()
    {
        Livewire::test(CreateTasks::class)
            ->set('description', 'Nova Tarefa')
            ->call('saveTask')
            ->assertRedirect(route('tasks.index'));

        $this->assertTrue(Task::where('description', 'Nova Tarefa')->exists());
    }

    /** @test */
    public function it_validates_description_as_required()
    {
        Livewire::test(CreateTasks::class)
            ->call('saveTask')
            ->assertHasErrors(['form.description' => 'required']);
    }
}
