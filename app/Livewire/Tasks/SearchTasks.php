<?php

namespace App\Livewire\Tasks;

use App\Livewire\Url;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SearchTasks extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';
    public ?string $startDate = null;
    public ?string $endDate = null;
    public $complete = null;
    public function render(): View
    {
        $query = Task::query();

        if ($this->search !== '') {
            $query->where('description', 'LIKE', '%' . $this->search . '%');
        }

        if ($this->startDate !== null) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if ($this->endDate !== null) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        if ($this->complete !== null) {
            if ($this->complete == 0) {
                $query->where('complete', 0);
            } elseif ($this->complete == 1) {
                $query->where('complete', 1);
            }
        }

        $tasks = $query->orderBy('id', 'DESC')->paginate(5);

        return view('livewire.tasks.search-tasks', compact('tasks'));
    }

    protected function formatDate($date)
    {
        return date('d/m/Y H:i:s', strtotime($date));
    }

    public function completeTask($id)
    {
        $task = Task::find($id);
        $task->update([
            'complete' => true,
            'completed_at' => now(),
        ]);
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
