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

//For Courses

//Route::get('course', 'CourseController@index');
//Route::get('/course', 'CourseController@allCourse');
Route::get('/course', 'CourseController@index');
//Route::post('/create', 'CourseController@create');
Route::get('/course/{id}', 'CourseController@courseByID');


//For Comments
Route::get('/comment/', 'CommentController@index');

Route::get('/comment/{lecture_list_id}', 'CommentController@show');

Route::group([
    'middleware' => ['api','jwt.verify'],
], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('users', 'CourseController@index');

    //For Comments
    Route::post('comment/{lecture_list_id}', 'CommentController@store');
    Route::get('comment/{comment_id}/edit', 'CommentController@edit');
    Route::put('comment/{comment_id}', 'CommentController@update');
    Route::delete('comment/{comment_id}', 'CommentController@destroy');

    //For Courses
    Route::post('/course', 'CourseController@store');
    Route::get('/course', 'CourseController@latestCourse');
    Route::delete('/course/{course_id}', 'CourseController@delete()');
    Route::get('/lecture_list/{lectureList_id}/edit', 'LectureListController@edit');
    Route::put('/course/{course_id}', 'LectureListController@update');



    //For lecture_list
    Route::get('/lecture_list', 'LectureListController@index');
    Route::post('/lecture_list', 'LectureListController@store');
    Route::get('/lecture_list/{course_id}', 'LectureListController@show');
    Route::get('/lecture_list/{lectureList_id}/edit', 'LectureListController@edit');
    Route::put('/lecture_list/{lectureList}', 'LectureListController@update');
    Route::delete('/lecture_list/{lectureList_id}', 'LectureListController@delete');





});