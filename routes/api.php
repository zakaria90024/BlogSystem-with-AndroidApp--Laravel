<?php
Route::apiResource('/categorie', 'Api\CategorieController');
Route::apiResource('/post','Api\PostController');

//for image transper
Route::get('/file/post','Api\ImageController@viewImage');
Route::post('/file/post/{id}','Api\ImageController@postImage');


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
