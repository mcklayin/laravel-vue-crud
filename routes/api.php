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



Route::group(['prefix' => '/v1', 'as' => 'api.', 'namespace' => '\App\Application\Http\Api\Controllers'], function () {

    Route::post('/register', 'Auth\AuthController@register');
    Route::post('/login', 'Auth\AuthController@login');

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', 'Auth\AuthController@logout');
        Route::get('/get-user', 'Auth\AuthController@getUser');

        /** Teams */
        Route::resource('teams', 'TeamController');

        /** Team Players */
        Route::resource('teams.players', 'PlayerTeamController')->only(['index']);

        /** Players */
        Route::resource('players', 'PlayerController')->only(['index', 'store', 'update', 'show']);
    });
});