<?php

namespace App\Livewire\Admin\Todo;

use App\Models\Project;
use App\Models\Todo as ModelTodos;
use Livewire\Component;

class Todo extends Component
{
    public $project = [];
    public $content = "";
    public $name = "";
    public $project_id = "";
    public $status = "";
    public $category = "";

    public function save()
    {
        dd($this->content);
    }
    public function sendDataTodo()
    {
        $this->validate([
            'name' => 'required|min:10',
            'project_id' => 'required',
            'status' => 'required',
            'category' => 'required'
        ], [
            'name.required' => '*wajib diisi, cerdas!',
            'status.required' => '*ini juga wajib',
            'project_id.required' => '*jangan lupa ini juga',
            'category.required' => '*woi, ini juga'
        ]);

        ModelTodos::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
            'status' => $this->status,
            'category' => $this->category,
            'project_id' => $this->project_id
        ]);;
        $this->resetForm();
        $this->dispatch('todo-created');
    }
    public function mount()
    {
        return $this->takeTodoData();
    }
    public function render()
    {
        return view('livewire.admin.todo.todo');
    }
    public function takeTodoData()
    {
        $this->project = Project::with('todos')->get();
    }
    public function resetForm()
    {
        $this->name = "";
        $this->project_id = "";
        $this->status = "";
        $this->category = "";
        $this->resetErrorBag();
    }
}
