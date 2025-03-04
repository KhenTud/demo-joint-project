<?php

namespace App\Livewire\Bronya\Admin;

use App\Models\Project;
use Livewire\Component;

class FormCreateProject extends Component
{
    public $titleComponent = "FORM PAGE CREATE PORJECT COMPONENT";
    public $content = "";
    public $name = "";
    public $description = "";
    public $status = "";
    public $category = "";

    public function render()
    {
        return view('livewire.bronya.admin.form-create-project');
    }
    public function save()
    {
        dd($this->content);
    }
    public function sendDataProject()
    {
        $this->validate([
            'name' => 'required|min:10',
            'description' => 'required|min:10',
            'status' => 'required',
            'category' => 'required'
        ], [
            'name.required' => '*wajib diisi, cerdas!',
            'name.min' => '*wajib lebih dari 10 karakter, pintar!',
            'status.required' => '*ini juga wajib',
            'description.required' => '*jangan lupa ini juga',
            'description.min' => '*ini juga lebih 10 karakter',
            'category.required' => '*woi, ini juga'
        ]);

        Project::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
            'status' => $this->status,
            'category' => $this->category,
            'description' => $this->description
        ]);;
        $this->resetForm();

        $this->dispatch('project-created');
    }
    public function resetForm()
    {
        $this->name = "";
        $this->description = "";
        $this->status = "";
        $this->category = "";
        $this->resetErrorBag();
    }
}
