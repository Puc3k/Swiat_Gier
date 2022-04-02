<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Game\GameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|ł
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])
    ->group(function (){
        Route::get('/', [Home\MainPage::class, '__invoke'])
            ->name('home.mainPage');

//USERS
        Route::get('users',[UserController::class,'list'])
            ->name('get.users');

        Route::get('users/{userId}',[UserController::class,'show'])
            ->name('get.user.show');

        Route::get('user-add',[UserController::class, 'add'])
            ->name('add.user');

//GAMES
        Route::get('b/game/{gameId}',[Game\BuilderController::class,'show'])
            ->name('game.b.show');

        Route::get('e/game/{gameId}',[Game\EloquentController::class,'show'])
            ->name('game.e.show');

        Route::group([
            'namespace'=>'App\Http\Controllers\Game',
            'prefix'=>'b/games',
            'as'=>'games.b.',
        ], function(){
            Route::get('dashboard',[Game\BuilderController::class,'dashboard'])
                ->name('dashboard');

            Route::get('',[Game\BuilderController::class,'index'])
                ->name('list');
        });

        Route::group([
            'namespace'=>'App\Http\Controllers\Game',
            'prefix'=>'e/games',
            'as'=>'games.e.',
        ], function(){
            Route::get('dashboard',[Game\EloquentController::class,'dashboard'])
                ->name('dashboard');

            Route::get('',[Game\EloquentController::class,'index'])
                ->name('list');
        });
        Route::get('/home', [HomeController::class, 'index'])->name('home');


});




Auth::routes();


