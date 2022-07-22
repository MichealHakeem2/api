<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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
//public route
Route::get('empindex', "EmployeeController@index");
Route::get('empshow', "EmployeeController@show");
Route::post('register',"AuthController@register");
Route::post('login',"AuthController@login");

//Private route
Route::group(['middleware'=>["auth:sanctum"]],function(){

    Route::post('empstore',"EmployeeController@store");
    Route::put('update/{id}',"EmployeeController@update");
    Route::delete('delete/{id}',"EmployeeController@destroy");
    Route::post('logout',"AuthController@logout");
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
