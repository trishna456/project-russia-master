<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route to Check if the UserID entered by User has already given the survey */

Route::post('/usedids', "App\Http\Controllers\UsedIDController@check");

Route::get('/card',"App\Http\Controllers\Card@getCard");

Route::post('/card',"App\Http\Controllers\Card@storeResult");

Route::post('/card/undo',"App\Http\Controllers\Card@undoSort");

Route::get('/flushall',"App\Http\Controllers\Card@flushall");

Route::get('/card/show',"App\Http\Controllers\Card@storeFinalData");