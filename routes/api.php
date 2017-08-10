<?php

use Illuminate\Http\Request;

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

Route::middleware(['auth:api'])->prefix('/user')->group(function () {

    Route::get('/', function (Request $request) {
        return $request->user();
    });

    Route::get('/all', 'API\UserController@getAllUsers');
    Route::get('/followers', 'API\UserController@getFollowers');
    Route::get('/followings', 'API\UserController@getFollowing');
    Route::post('/toggle', 'API\UserController@toggleFriend');

});

Route::middleware(['auth:api'])->prefix('/post')->group(function () {

    Route::get('/', 'API\PostController@getPosts');
    Route::post('/make', 'API\PostController@makePost')->middleware('post');

});
