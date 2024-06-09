<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Edit extends Component
{
    protected $listeners=['showModalForm'];
    public function showModalForm(Task $task)
    {
        $this->dispatch('runEditModal');
    }
    public function render()
    {
        return view('livewire.task.edit');
    }
}
