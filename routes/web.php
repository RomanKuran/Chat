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
// Route::get('/', 'Chat\ChatController@index')->name('index');
// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'Chat\ChatController@index')->name('chats')->middleware(['auth', 'verified']);
Route::get('/chat/{id}', 'Chat\ChatController@chat')->name('chat')->middleware(['auth', 'verified']);
Route::post('/chat/sendMessage', 'Chat\ChatController@sendMessage')->name('sendMessage');