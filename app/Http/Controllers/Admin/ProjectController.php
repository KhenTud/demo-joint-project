<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin-dashboard', [
            'pageTitle' => 'Dashboard'
        ]);
    }


    public function project()
    {
        return view('admin-project', [
            'pageTitle' => 'Projects'
        ]);
    }

}
