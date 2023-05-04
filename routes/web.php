<?php

use App\Http\Controllers\HomeController;
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
Route::get('/contacts', function () {
    return "</h1>Sou os Contactos<h1>";
})->name('contacts.show');

Route::fallback(function () {
    return view('fallback');
});

Route::get('/home_contacts', [HomeController::class, 'index'])->name('index.contacts');
Route::get('/all_contacts', [HomeController::class, 'allContacts'])->name('contacts.all');

Route::get('/add_contact', [HomeController::class, 'addUser'])->name('add_contact');

Route::post('/create_contact', [HomeController::class, 'createUser'])->name('create_contact');

Route::get('/add_task', [HomeController::class, 'addTask'])->name('add_task');
Route::post('/create_task', [HomeController::class, 'createTask'])->name('create_task');

Route::post('/update_contact', [HomeController::class, 'updateUser'])->name('update_contact');


Route::get('/view_contact/{id}', [HomeController::class, 'viewContact'])->name('view_contact');
Route::get('/delete_contact/{id}', [HomeController::class, 'deleteContact'])->name('delete_contact');

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
