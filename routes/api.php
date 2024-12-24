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

//Version 1 der joy-of-whitewater-api
//api/v1
Route::group(['prefix' => 'v1', 
              'namespace' => 'App\Http\Controllers\Api\V1',
              'middleware' => 'auth:sanctum'], 
              function(){
                Route::apiResource('events', EventController::class);
                Route::apiResource('states', StateController::class);
            });


Route::namespace('App\Http\Controllers\Api\V1')->group(function () {
  Route::prefix('v1')->group(function() {
    Route::controller(AuthController::class)->group(function () {
      Route::post('register', 'register');
      Route::post('login', 'login');
    });
  });  
});


//Logout braucht sanctum, weil das Token, dass beim login erstellt wurde, mit dem 
//Logout zurück gegeben werden muss. 
Route::namespace('App\Http\Controllers\Api\V1')->group(function () {
  Route::prefix('v1')->group(function() {
    Route::middleware('auth:sanctum')->group(function(){
      Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
      });
    });
  });  
});