<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/profileid', function () {
    return view('profileid');
});

Route::get('/invalid', function () {
    return view('invalid');
});

Route::get('/instructions', function () {
    return view('instructions');
});

Route::get('/instructions1', function () {
    return view('instructions1');
});

Route::post('/sorting0', function () {
    return view('sorting0');
});

Route::post('/sorting1', function () {
    return view('sorting1');
});