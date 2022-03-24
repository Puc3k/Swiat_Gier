<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ShowAddress;
use App\Models\User;
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

Route::get('/', [Home\MainPage::class, '__invoke'])
    ->name('home.mainPage');

Route::get('users',[UserController::class,'list'])
    ->name('get.users');

Route::get('users/{userId}',[UserController::class,'show'])
    ->name('get.user.show');

Route::get('user-add',[UserController::class, 'add'])
    ->name('add.user');

Route::get('game/{gameId}',[GameController::class,'show'])
    ->name('game.show');

//Route::resource('games',GameController::class)
//->only([
//    'index','show'
//]);
//Route::get('games',[GameController::class, 'index'])
//    ->name('games.index');

Route::get('games/dashboard',[GameController::class,'dashboard'])
    ->name('games.dashboard');

Route::get('games/index',[GameController::class,'index'])
    ->name('games.index');

Route::resource('admin/games', GameController::class)
    ->only([
        'store','create','destroy'
    ]);
