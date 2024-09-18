<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return redirect('/admin');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin', //admin/tamu
    'as' => 'admin.' 
], function() {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//routing crud dari institusion
Route::resource('/institution', App\Http\Controllers\InstitutionController::class);
});