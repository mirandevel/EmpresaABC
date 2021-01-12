<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('auth.login');
});

Route::post('/login',[\App\Http\Controllers\LoginController::class,'authenticate']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/createuser',\App\Http\Livewire\User\Create::class)->name('createuser');

    Route::get('/users',\App\Http\Livewire\Users::class)->name('users');
    Route::get('/users/more/{id}',\App\Http\Livewire\User\More::class)->name('users.more');

    Route::get('/tasks',\App\Http\Livewire\Tasks\Tasks::class)->name('tasks');
    Route::get('/tasks/more/{id}',\App\Http\Livewire\Tasks\More::class)->name('tasks.more');

    Route::get('/clientes',\App\Http\Livewire\Clientes\Clientes::class)->name('clientes');
    Route::get('/clientes/more/{id}',\App\Http\Livewire\Clientes\More::class)->name('clientes.more');

});

