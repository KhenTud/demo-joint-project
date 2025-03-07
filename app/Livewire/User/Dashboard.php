<?php

namespace App\Livewire\User;

use App\Models\{Project, Team};
use Livewire\Component;
use Livewire\Livewire;

class Dashboard extends Component
{
    public $project = [];
    public $listProject = []; //untuk keseluruhan data
    public $confirms = [];
    public function mount()
    {
        $requestProjectId = request()->query('projectId');

        //
        if ($requestProjectId) { //cek kondisi apakah ada $ruequestProjectId, ambil single data
            $this->project = Project::with(['user', 'teams'])->where('id', $requestProjectId)->first(); //mengambil id dari modal Project dan masukkan ke $project

        } else {
            $this->listProject = Project::with(['user', 'teams'])->get(); // dalam kondisi false, mengambil semua data dan memasukkannya ke dalam listProjects

        }
    }
    public function render()
    {
        return view('livewire.user.dashboard');
    }
    public function sendSubmission($projectId)
    {
        Team::create([
            'user_id' => auth()->id(),
            'project_id' => $projectId
        ]);
    }
    public function cancelSubmission()
    {
        return redirect()->route('dashboard');
    }
}
