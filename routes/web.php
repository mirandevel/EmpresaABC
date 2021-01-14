<?php

use App\Models\Cliente;
use App\Models\Tarea;
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
    Route::get('/tasks/update/{id}',\App\Http\Livewire\Tasks\Update::class)->name('tasks.update');
   /* Route::get('/tasks/more/{id}',function ($id){
        $tarea=Tarea::find($id);
        $tarea->load('technical');
        $tarea->load('administrator');
        $tarea->load('client');
        $tarea->load('task_assitance');
        return $tarea;
    })->name('tasks.more');*/

    Route::get('/clientes',\App\Http\Livewire\Clientes\Clientes::class)->name('clientes');
    Route::get('/clientes/more/{id}',\App\Http\Livewire\Clientes\More::class)->name('clientes.more');
    Route::get('/clientes/update/{id}',\App\Http\Livewire\Clientes\Update::class)->name('clientes.update');
    /*Route::get('/clientes/more/{id}',function ($id){
        $cliente=Cliente::find($id);
        $cliente->load('tasks');
        return $cliente;
    })->name('tasks.more');*/

    Route::get('/reportes',[\App\Http\Controllers\ReportController::class,'download'])->name('report');

});

