<?php

namespace Tests\Feature\Livewire;


use App\Livewire\Tasks\SearchTasks;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SearchTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search_tasks_by_description()
    {
        $task1 = Task::factory()->create(['description' => 'Tarefa 1']);
        $task2 = Task::factory()->create(['description' => 'Tarefa 2']);
        $task3 = Task::factory()->create(['description' => 'Outra Task']);

        Livewire::test(SearchTasks::class)
            ->set('search', 'Tarefa')
            ->assertSee($task1->description)
            ->assertSee($task2->description)
            ->assertDontSee($task3->description);
    }

    /** @test */
    public function it_can_filter_tasks_by_start_date()
    {
        $task1 = Task::factory()->create(['created_at' => now()->subDays(7)]);
        $task2 = Task::factory()->create(['created_at' => now()->subDays(3)]);
        $task3 = Task::factory()->create(['created_at' => now()]);

        Livewire::test(SearchTasks::class)
            ->set('startDate', now()->subDays(5)->toDateString())
            ->assertSee($task2->description)
            ->assertSee($task3->description)
            ->assertDontSee($task1->description);
    }

    /** @test */
    public function it_can_mark_a_task_as_completed()
    {
        $task = Task::factory()->create();

        Livewire::test(SearchTasks::class)
            ->call('completeTask', $task->id)
            ->assertSuccessful();

        $this->assertTrue((boolean)Task::find($task->id)->complete);
    }


    /** @test */
    public function it_can_delete_a_task()
    {
        $task = Task::factory()->create();

        Livewire::test(SearchTasks::class)
            ->call('deleteTask', $task->id);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
