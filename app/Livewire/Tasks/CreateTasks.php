<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use Livewire\Component;

class CreateTasks extends Component
{
    public TaskForm $form;

    public function saveTask()
    {
        $this->validate();

        $this->form->store();
        return redirect()->to('/tasks');
    }
    public function render()
    {
        return view('livewire.tasks.create-tasks');
    }
}
