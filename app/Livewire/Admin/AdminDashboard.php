<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Project;
use App\Models\Team;

class AdminDashboard extends Component
{
    // registrasi array kosong dengan nama listProject
    public $listProject = [];
    public function mount()
    {
        $this->getListSubmission();
    }
    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
    public function getListSubmission()
    {
        $post = Project::with('teams')->where('status', 'PUBLISHED')->get();
        

    }
}
