<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Home\MainPage;

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
//Route::group(['middleware' => ['auth']], function() {
Route::middleware(['auth'])->group(function() {
    Route::get('/', [MainPage::class,'__invoke'])
    ->name('home.mainPage');

    // USERS
    Route::get('users', [UserController::class,'list'])
        ->name('get.users');

    Route::get('users/{userId}', [UserController::class,'show'])
        ->name('get.user.show');

    //Route::get('users/{id}/profile', 'User\ProfilController@show')
    //    ->name('get.user.profile');

//    Route::get('users/{id}/address', 'User\ShowAddress')
//        ->where(['id' => '[0-9]+'])
//        ->name('get.users.address');

    // GAMES
    Route::group([
        'prefix' => 'games',
        'namespace' => 'Game',
        'as' => 'games.'
    ], function () {
        Route::get('dashboard', [GameController::class,'dashboard'])
            ->name('dashboard');

        Route::get('', [GameController::class,'index'])
            ->name('list');

        Route::get('{game}', [GameController::class,'show'])
            ->name('show');
    });

});

Auth::routes();
