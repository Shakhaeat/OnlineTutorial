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
 
// Route::group([
 
//    'middleware' => 'api',
 
// ], function ($router) {
 
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');
// });

// Route::post('users', 'UserController@store');
// Route::get('users', 'UserController@index');


// Route::post('login', 'AuthController@login');
// Route::post('logout', 'AuthController@logout');
// Route::post('register', 'AuthController@register');
// Route::post('refresh', 'AuthController@refresh');
// Route::post('me', 'AuthController@me');

// Route::get('course', 'CourseController@index');



//This also important

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
// });
 
// Route::group([
 
//    'middleware' => 'api',
 
// ], function ($router) {
 
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');
//    Route::post('register', 'AuthController@register');
//  //  Route::get('users', 'UserController@index');
//    Route::get('users', 'CourseController@index');
// });
//Route::get('users', 'CourseController@index');

////////

//For JWT Middleware

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('course', 'CourseController@index');
Route::group([
    'middleware' => ['api','jwt.verify'],
], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
   // Route::get('users', 'CourseController@index');
});