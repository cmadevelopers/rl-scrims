<?php

use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'middleware' => 'api',
    'prefix'     => 'auth',
    'namespace'  => 'App\\Http\\Controllers\\API'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::resource('users', UserAPIController::class)->middleware('api.jwt');

Route::fallback(function () {
    return response()->json(['error' => 'Não encontrado!'], 404);
});
