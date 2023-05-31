<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Groups\GroupController;
use App\http\Controllers\InviteController;
use App\Http\Controllers\Mail\InvitationEmail as MailInvitationEmail;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Groups
Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');




//Join form
Route::get('/groups/join', [GroupController::class, 'joinForm'])->name('groups.joinForm');
Route::post('/groups/join', [GroupController::class, 'join'])->name('groups.join');


// Invites (ga kepake)
Route::get('/invites/form', [InviteController::class, 'showInviteForm'])->name('invites.form');
Route::post('/invites', [InviteController::class, 'sendInvite'])->name('invites.send');
Route::get('/invites', [MailInvitationEmail::class, 'build'])->name('invites.email');

//Task Individual Feature
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::resource('tasks', TaskController::class);
