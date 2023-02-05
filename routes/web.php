<?php

use Illuminate\Support\Facades\Route;

Route::any('/register', function() {
    return  view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('cctvs', 'cctvController');
    Route::resource('home', 'HomeController');
});

require __DIR__.'/auth.php';


Auth::routes();