<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Home\MainPage;
use App\Http\Controllers\User\UserController as UserControllerProfile;

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

    //USER - ME
    Route::group(['prefix'=> 'me','as'=>'me.'], function(){
        Route::get('profile',[UserControllerProfile::class,'profile'])
            ->name('profile');
        Route::get('edit',[UserControllerProfile::class,'edit'])
            ->name('edit');
        Route::post('update',[UserControllerProfile::class,'update'])
            ->name('update');
    });

    // USERS
    Route::get('users', [UserController::class,'list'])
        ->name('get.users');

    Route::get('users/{userId}', [UserController::class,'show'])
        ->name('get.user.show');

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
