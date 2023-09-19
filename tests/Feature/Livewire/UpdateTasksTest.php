<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Tasks\UpdateTasks;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateTasksTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UpdateTasks::class)
            ->assertStatus(200);
    }
}
