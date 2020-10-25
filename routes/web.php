<?php

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

Auth::routes();



Route::get('/', "WelcomeController@index")->name("welcome");

Route::get('/select-club', "PlayersController@create")->name("select"); 
Route::get('/get_club', "PlayersController@get_club")->name("get_club");
//Route::get('/golden_boot', "WelcomeController@golden_boot")->name("golden_boot");
Route::get('/golden_boot', 'WelcomeController@test')->name('golden_boot');
Route::get('/golden_boot/action', 'WelcomeController@action')->name('golden_boot.action');
//Route::get('/player/create', "PlayersController@create")->name("player.create");
//Route::post('/player/store', "PlayersController@store")->name("player.store");



Route::group(['middleware' => 'auth'] , function(){

    Route::get('/home', 'HomeController@index')->name('home'); 
    Route::resource('/categories' , 'CategoriesController');
    Route::resource('/players' , 'PlayersController');
    Route::resource('/stats' , 'StatsController');
    
    Route::resource('/tags' , 'TagsController');
    Route::resource('/posts' , 'PostsController');
    Route::get('/trased-post' , 'PostsController@trashed')->name('trashed.index');
    Route::get('/trased-post/{id}' , 'PostsController@restore')->name('posts.restore');



});




Route::middleware(['auth' , 'admin'])->group(function(){ 
    Route::get('/users' , 'UsersController@index')->name('users.index');
    Route::post('/users/{user}/make-admin' , 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('/users/{user}/make-writer' , 'UsersController@makeWriter')->name('users.make-writer');
});


Route::middleware(['auth'])->group(function(){ 
    Route::get('/users/{user}/profile' , 'UsersController@edit')->name('users.edit');
    Route::post('/users/{user}/profile' , 'UsersController@update')->name('users.update');
    //Route::post('/users/{user}/make-writer' , 'UsersController@makeWriter')->name('users.make-writer');
});