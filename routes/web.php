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

// Group
Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::delete('/groups/{group}', [GroupController::class, 'delete'])->name('groups.delete');
Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');




Route::get('/invites/form', [InviteController::class, 'showInviteForm'])->name('invites.form');

Route::post('/invites', [InviteController::class, 'sendInvite'])->name('invites.send');
Route::get('/invites', [MailInvitationEmail::class, 'build'])->name('invites.email');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');