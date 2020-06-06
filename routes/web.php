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
    return view('welcome');
});

Route::get('contact','ContactController@index');
Route::post('contact', ['as'=>'contact.store','uses'=>'ContactController@send']);

Route::get('archive','ArchiveController@index');
Route::get('insert_archive','ArchiveController@insert_archive');
Route::post('insert_archive', ['as'=>'archive.store','uses'=>'ArchiveController@send']);
Route::get('edit_archive/{id}','ArchiveController@edit');
Route::any('update_archive/{id}','ArchiveController@update')->name('update_archive');
Route::get('delete_archive/{id}','ArchiveController@delete')->name('delete_archive');
Route::get('show_archive/{id}','ArchiveController@show');
//images

Route::get('showall','ImagesController@showall');
Route::get('image','ImagesController@index');
Route::any('store','ImagesController@store');
Route::get('show/{id}','ImagesController@show');
Route::get('edit/{id}','ImagesController@edit');
Route::get('delete/{id}','ImagesController@delete');

//Cookie

Route::get('cookie/set','CookieController@setCookie');
Route::get('cookie/get','CookieController@getCookie');


Route::group(['middleware' => ['web']], function()
{

});
?>