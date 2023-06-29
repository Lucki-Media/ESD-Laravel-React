<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//CONVERGE
Route::get("convergeData", 'App\Http\Controllers\ConvergeController@convergeData');
Route::get("collaborateData", 'App\Http\Controllers\CollaborateController@collaborateData');
Route::get("cogitateData", 'App\Http\Controllers\CogitateController@cogitateData');
Route::get("communicateData", 'App\Http\Controllers\CommunicateController@communicateData');
Route::post("sendRequest", 'App\Http\Controllers\CommunicateController@sendRequest');