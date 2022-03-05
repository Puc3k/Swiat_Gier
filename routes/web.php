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


//Route::get('users/{id}',[ProfileController::class,'show'])
//->name('get.users');

//Route::get('users/test/{id}',[UserController::class,'testShow'])
//    ->name('get.users.test');
//Route::get('request/{id}',[UserController::class,'testShow2']);
//
//Route::post('users/test/{id}',[UserController::class,'testStore'])
//    ->name('post.users.test.store');

//Route::get('users/{id}/address',[ShowAddress::class,'__invoke']);

//Route::resource('games', GameController::class);
//Route::resource('games', GameController::class)-> only([
//    'index', 'show'
//]);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
//Route::get('/hello',[HelloController::class,'hello']);
Route::get('/hello/{name}','App\Http\Controllers\HelloController@sayHello');

//Route::get('/example', function () {
//    return 'jestem GET';
//});

//Metody
$uri = '/example';
Route::get($uri, fn() => 'jestem arrow GET');
Route::post($uri, fn() => 'jestem POST');
Route::put($uri, fn() => 'jestem put');
Route::patch($uri, fn() => 'jestem patch');
Route::delete($uri, fn() => 'jestem delete');
Route::options($uri, fn() => 'jestem options');
Route::match(['get', 'post'],'/match',function (){
    return 'Smacznej maczy';
});

Route::any('/all', fn() => 'all methods');

//View Routes
Route::view('/view/route','route.view');
Route::view(
    '/view/route/var1',
    'route.viewParam',
    ['param1'=> 'var1 - to nasza dana']
);

//Obsługa parametrów

Route::get('posts/{postId}/{title}',function (int $postId, string $title){
    var_dump($postId);
    var_dump($title);
    dd($postId);
    dd($title);
});

//opcjonalne/domyślne parametry
//Route::get('users/{nick?}',function (string $nick = null){
//   dd($nick);
//});

//Route::get('users/{nick?}',function (string $nick = 'Gracz'){
//    dd($nick);
//});

Route::get('users/{nick?}',function (string $nick = 'Gracz'){
    dd($nick);
})->where(['nick' => '[a-z]+']);


//nazwy Routeów
Route::get('items',function  (){

})->name('shop.items');

Route::get('elements/{id}',function  (int $id){
    return 'Element:' . $id;
})->name('shop.item.single');

Route::get('example', function (){
  // $url = route('shop.items');
   $url = route('shop.item.single', ['id' => 4444]);
   dd($url);
});

*/

