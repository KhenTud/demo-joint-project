<?php

namespace App\Livewire\Admin\Todo;

use App\Models\Project;
use App\Models\Todo;
use Livewire\Component;

class ListTodo extends Component
{
    public $todos = [];
    public function render()
    {
        return view('livewire.admin.todo.list-todo');
    }
    public function mount()
    {
        $this->getListTodo();
    }

    public function getListTodo()
    {
        // how to get the Todo data with relation Project
        $this->todos = Todo::with('project')->get();
    }

    public function deleteProject($projectId)
    {
        $project = Todo::find($projectId);

        $project->delete();
        $this->dispatch('project-deleted')->self();
    }
}
