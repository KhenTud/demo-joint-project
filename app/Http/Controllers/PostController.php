<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.posts.index',['pageTitle' => 'Posts']);
    }

}
