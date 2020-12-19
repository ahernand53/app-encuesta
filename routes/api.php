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

Route::resource('/stages', 'api\StageController');
Route::get('/stages/{stage}/questions', 'api\StageController@getQuestions');
Route::post('/stages/{stage}/questions', 'api\StageController@storeQuestion');
Route::put('/stages/{stage}/questions/{question}', 'api\StageController@updateQuestion');
Route::delete('/stages/{stage}/questions/{question}', 'api\StageController@storeQuestion');
Route::get('/types', 'api\TypeController@index');
