<?php

namespace App\Livewire\Tasks;

use App\Models\Task as TaskModel;
use Livewire\Component;

class Task extends Component
{
    public $title,$description,$status;
    // public TaskModel $task;
    public function save() {
        $this->validate([
            'title'=>"required",
            'description'=>'min:6',
            'status'=>"required"
        ]);
        //  dd($this->all());
        TaskModel::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'status'=>$this->status,
        ]);
        session()->flash('message',[
            'message'=>'task succsessfully created.',
            'class'=>'alert-success',
        ]);
        $this->reset('title','description','status');
    }
    public function render()
    {
        return view('livewire.tasks.task')->extends('layouts.app')->section('content');
    }
}
