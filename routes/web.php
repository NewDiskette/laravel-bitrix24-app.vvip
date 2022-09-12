<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VvipController;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

//tasks
Route::match(['get', 'post'], '/tasks',
    [TaskController::class, 'index']
)->name('tasks.index');

Route::get('/tasks/create',
    [TaskController::class, 'create']
)->name('tasks.create');

Route::post('/tasks/store',
    [TaskController::class, 'store']
)->name('tasks.store');

//vvip
Route::match(['get', 'post'], '/vvip',
    [VvipController::class , 'index']
)->name('vvip.index');

Route::post('/vvip/store',
    [VvipController::class , 'store']
)->name('vvip.store');
