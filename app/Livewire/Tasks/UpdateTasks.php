<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Component;

class UpdateTasks extends Component
{
    public TaskForm $form;

    public function mount(Task $task):void
    {
        $this->form->setTask($task);
    }
    public function updateTask()
    {
        $this->validate();

        $this->form->update();
        return $this->redirect('/tasks');
    }

    public function render()
    {
        return view('livewire.tasks.update-tasks');
    }
}
