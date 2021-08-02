<?php

use App\Http\Controllers\ChallengeOneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/challenge/one/one/{invoice}', [ChallengeOneController::class, 'challengeOneOne'])->name('challenge11');
Route::get('/challenge/one/two', [ChallengeOneController::class, 'challengeOneTwo'])->name('challenge12');
Route::get('/challenge/one/tree/a', [ChallengeOneController::class, 'challengeOneTreeA'])->name('challenge13a');
Route::get('/challenge/one/tree/b', [ChallengeOneController::class, 'challengeOneTreeB'])->name('challenge13a');
