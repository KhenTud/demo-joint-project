<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index(){
        return view('admin.todo.index',['pageTitle' => 'MEMMEK']);
    }
}
