<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index(){
        return view('admin.todo.index',['pageTitle' => 'TODO-LIST']);
    }

}
