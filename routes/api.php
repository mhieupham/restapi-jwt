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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('auth/register', 'UserController@register');
Route::get('test',function (){
    return response()->json(['message'=>'test']);
});

Route::post('auth/login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user-info', 'UserController@getUserInfo');
    //Post
    Route::get('post-all','PostController@index');
    Route::get('post/{id}','PostController@show');
    Route::post('post-store','PostController@store');
    Route::post('post-update/{id}','PostController@update');
    Route::post('post-delete/{id}','PostController@destroy');
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
