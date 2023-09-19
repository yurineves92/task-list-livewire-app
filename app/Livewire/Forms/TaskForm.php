<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Rule;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task = null;

    #[Rule('required|min:4')]
    public string $description = '';

    public function setTask(Task $task): void
    {
        $this->task = $task;
        $this->description = $task->description;
    }
    public function store(): void
    {
        Task::create($this->all());
        $this->reset('description');
    }

    public function update(): void
    {
        $this->task->update($this->all());
    }
}
