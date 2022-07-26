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
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard/index');
})->name('dashboard.index');

Route::post('/dashboard', function () {
    return view('dashboard/index');
})->name('dashboard.index');


Route::get('/transactions/stats', function () {
    return view('dashboard/transaction/stats');
})->name('transactions.stats');

Route::get('/transactions', function () {
    return view('dashboard/transaction/index');
})->name('transactions.index');
