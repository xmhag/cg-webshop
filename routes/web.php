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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/buy', function () {
    return view('/product/buy');
});
Route::get('/buy2', function () {
    return view('/product/buy2');
});
Route::get('/congrats', function () {
    return view('/product/congrats');
});




Route::get('/register', function () {
    return view('/user/register');
});
Route::get('/edit', function () {
    return view('/user/edit');
});
Route::get('/login', function () {
    return view('/user/login');
});
Route::get('/profile', function () {
    return view('/user/profile');
});



Route::get('/product/show', function () {
    return view('/product/show');
});
