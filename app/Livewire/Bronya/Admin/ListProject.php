<?php

namespace App\Livewire\Bronya\Admin;


use Livewire\Component;
use App\Models\Project;
use Livewire\Attributes\On;

use function Pest\Laravel\delete;

class ListProject extends Component
{
    public $projects = [];
    public function mount()
    {
        $this->getListProjects();
    }
    public function render()
    {
        return view('livewire.bronya.admin.list-project');
    }
    #[On('project-created')]
    #[On('project-delete')]
    public function getListProjects()
    {
        $this->projects = Project::with('user')->get();
    }
    public function deleteProject($projectId)
    {
        $project = Project::find($projectId);
        $project->delete();
        $this->dispatch('project-deleted')->self();
    }
}
