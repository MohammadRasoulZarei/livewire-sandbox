<?php

namespace App\Livewire\Tasks;

use App\Models\Task as TaskModel;
use Livewire\Component;
use Livewire\WithPagination;

class Task extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title, $description, $status;
    public $filterTitle = '';
    public $filterStatus = '';
    public $edit=false;
    public $taskId=null;
    protected $queryString = [
        'filterTitle',
        'filterStatus'
    ];

    public function createTask()
    {
        $this->validate([
            'title' => "required",
            'description' => 'min:6',
            'status' => "required"
        ]);
        //  dd($this->all());
        TaskModel::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
        ]);
        session()->flash('message', [
            'message' => 'task succsessfully created.',
            'class' => 'alert-success',
        ]);
        $this->reset('title', 'description', 'status');
    }
    public function editTask(TaskModel $task)
    {
        $this->edit=true;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->taskId=$task->id;

    }
    public function updateTask() {
        $this->validate([
            'title' => "required",
            'description' => 'min:6',
            'status' => "required"
        ]);
        //  dd($this->all());
      $task=TaskModel::findOrFail($this->taskId);
      $task->update([
        'title' => $this->title,
        'description' => $this->description,
        'status' => $this->status,
      ]);
        session()->flash('message', [
            'message' => 'task succsessfully updated.',
            'class' => 'alert-warning',
        ]);
        $this->reset('title', 'description', 'status');
        $this->edit=false;
    }
    public function resetCreate(){
        $this->reset('title','description','taskId','status');
        $this->edit=false;
    }
    public function delete(TaskModel $task) {
        session()->flash('message', [
            'message' => "task $task->title succsessfully deleted.",
            'class' => 'alert-info',
        ]);
        $task->delete();
    }
    public function render()
    {
        $tasks = TaskModel::filter(collect($this->all())->only(['filterTitle', 'filterStatus']))->paginate(3);
        return view('livewire.tasks.task', compact('tasks'))->extends('layouts.app')->section('content');
    }
}
