<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ShowAddress;
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
