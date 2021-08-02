<?php

use App\Http\Controllers\WebController;
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
    return view('welcome');
});

Route::get('/dashboard', [WebController::class, 'dashboard'])->name('dashboard');
Route::get('/task', [WebController::class, 'listTasks'])->name('tasks');
Route::get('/task/create', [WebController::class, 'showForm'])->name('form');
Route::get('/task/{task}/log/create', [WebController::class, 'showFormLog'])->name('form-log');
Route::post('/task/create', [WebController::class, 'createTask'])->name('create');
Route::post('/task/{task}/log/create', [WebController::class, 'createTaskLog'])->name('create-log');
Route::get('/task/show/{task}', [WebController::class, 'showTask'])->name('show');


require __DIR__.'/auth.php';
