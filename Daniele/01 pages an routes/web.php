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
    return view('welcome_guest');
})->middleware('guest');


Route::get('/home', function () {
    return view('welcome_logged');
})->middleware('auth');


Route::get('about', function () {
    return view('about');
});


Route::get('references', function () {
    return view('references');
});

Route::get('terms', function () {
    return view('terms');
});

Route::get('partners', function () {
    return view('partners');
});

Route::get('blog', function () {
    return view('blog');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('legal', function () {
    return view('legal');
});

Route::get('press', function () {
    return view('press');
});

Route::get('socialmedia', function () {
    return view('socialmedia');
});

Route::get('dataprotection', function () {
    return view('dataprotection');
});

Route::get('newsletter', function () {
    return view('newsletter');
});




Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('admin', 'RoleController@role')->name('cane');

Route::get('/prova', function () {
    return view('prova');
})->middleware('auth','sys_admin');


