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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// h获取dingo api路由实例
$api = app('Dingo\Api\Routing\Router');

// 定义一个版本组
$api->version('v1', ['middleware'=>''],function ($api) {
    $api->group(['middleware'=>''], function ($api){
        $api->get('users/{id}', 'App\Api\Controllers\UserController@show');
    });
});