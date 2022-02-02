<?php

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
    return view('guest.welcome');
})->name('home');

Route::get('/apipost', function () {
    return view('guest.api.index');
})->name('api.posts');

Auth::routes();

Route::get('contacts', 'ContactController@show_contacts')->name('contacts');
Route::post('contacts', 'ContactController@store')->name('contacts.send');

Route::resource('posts', PostController::class)->only(['index', 'show'])->parameter('post', 'post:slug');

Route::get('categories/{category:slug}/posts', 'CategoryController@posts')->name('categories.post');

/* Route::get('guest/posts/index', 'PostController@index')->name('guest.posts.index')->parameter('post', 'post:slug');
Route::get('guest/posts/{post}', 'PostController@show')->name('guest.posts.show')->parameter('post', 'post:slug'); */

Route::namespace ('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');

});
