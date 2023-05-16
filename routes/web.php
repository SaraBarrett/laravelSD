<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello_world', function () {
    return "<h1>Hello World</h1>";
});
Route::get('/hello/{id}', function ($id) {
    return "</h1>Hello<h1>" . $id;
});
Route::get('/laravel_blade', function () {
    return view('laravel_blade');
});

Route::get('/simple_php', function () {
    return view('simple_php');
});
Route::get('/hello_world/software_dev', function () {
    return "</>Hello Developer<h1>";
});
Route::get('/portfolio', function () {
    return "</h1>Sou o Portfólio<h1>";
});

Route::fallback(function () {
    return view('fallback');
});

/* Software Developer */

Route::get(
    '/home',
    [UserController::class, 'index']
)->name('home');

Route::get(
    '/home_all_users',
    [UserController::class, 'all_users']
)->name('show_all_users');

Route::get(
    '/home_all_tasks',
    [UserController::class, 'all_tasks']
)->name('show_all_tasks');

Route::get(
    '/view_task/id={id}',
    [UserController::class, 'viewTask']
)->name('show_task');

Route::get(
    '/delete_task{id}',
    [UserController::class, 'deleteTask']
)->name('delete_task');

Route::get(
    '/view_user/id={id}',
    [UserController::class, 'viewUser']
)->name('show_user');

Route::get(
    '/delete_user{id}',
    [UserController::class, 'deleteUser']
)->name('delete_user');

Route::get('/home_add_user',   [UserController::class, 'addUser'])->name('add_user');
Route::post('/create_user',   [UserController::class, 'createUser'])->name('create_user');


Route::get('/home_add_task',   [UserController::class, 'addTask'])->name('add_task');
Route::post('/create_task',   [UserController::class, 'storeTask'])->name('create_task');
