<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::group(['middleware' => ['web'], 'prefix' => config('crudbooster.ADMIN_PATH'), 'namespace' => $namespace], function () {

    Route::post('unlock-screen', ['uses' => 'AdminController@postUnlockScreen', 'as' => 'postUnlockScreen']);
    Route::get('lock-screen', ['uses' => 'AdminController@getLockscreen', 'as' => 'getLockScreen']);
    Route::post('forgot', ['uses' => 'AdminController@postForgot', 'as' => 'postForgot']);
    Route::get('forgot', ['uses' => 'AdminController@getForgot', 'as' => 'getForgot']);
    Route::post('register', ['uses' => 'AdminController@postRegister', 'as' => 'postRegister']);
    Route::get('register', ['uses' => 'AdminController@getRegister', 'as' => 'getRegister']);
    Route::get('logout', ['uses' => 'AdminController@getLogout', 'as' => 'getLogout']);
    Route::post('login', ['uses' => 'AdminController@postLogin', 'as' => 'postLogin']);
    Route::get('complaints', ['uses' => 'ComplaintsController@index', 'as' => 'index']);
});
*/
Route::get('/saga/viewannouncements', ['uses' => 'viewsController@getIndex', 'as' => 'complaints']);
Route::get('/saga/viewcomplaints', ['uses' => 'ComplaintsController@index', 'as' => 'complaints']);

Route::get("/saga/viewcomplaints/comments/".'{id}', ['uses' => 'ComplaintsController@show', 'as' => 'cond']);
Route::post("/saga/complaints/", ['uses' => 'CommentsController@store']);

Route::get("/saga/calander/", ['uses' => 'viewsController@postCalander']);
Route::post('/saga/calander', ['uses' => 'viewsController@postCalander', 'as' => 'postCalander']);
Route::get('/saga/curriculum', ['uses' => 'viewsController@getCurriculum', 'as' => 'getCurriculum']);
    Route::post('/saga/curriculum', ['uses' => 'viewsController@postCurriculum', 'as' => 'postCurriculum']);
    Route::get('/saga/maps', ['uses' => 'viewsController@getMap', 'as' => 'getCurriculum']);