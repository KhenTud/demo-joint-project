<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');
Route::post('submission', [ProjectController::class, 'sendSubmission'])->name('submission');

Route::view('dashboard', 'dashboard',['pageTitle' => 'dashboard'])

    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    // Route untuk admin

    // Route::view('admin-dashboard', 'admin-dashboard', ['pageTitle' => 'admin-dashboard'])->name('admin-dashbaord');
    Route::get('/admin-project', [ProjectController::class, 'project'])->name("admin-project");
    Route::get('/admin-dashboard', [ProjectController::class, 'index'])->name("admin-dashboard");
    Route::get('/posts', [PostController::class,'index'])->name("posts");
    Route::get('/todo', [TodoListController::class,'index'])->name("todo");

    // Route untuk User



});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
