<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Mockery\Generator\Parameter;

class ListProject extends Component
{
    public $listProjects = [];
    public $onRefresh = false;
    public function mount()
    {
        $this->refreshListProject();
    }
    public function render()
    {
        return view('livewire.list-project');
    }
    public function refreshListProject()
    {
        $this->listProjects = Project::where('status', 'PUBLISHED')->get();
    }
    public function sendSubmission($projectId)
    {
        // mengirim Parameter projectID melalui session
        session()->put('selectedProjectId', $projectId);
        $this->redirectIntended(route('login'), navigate: true);
        
    }
}
