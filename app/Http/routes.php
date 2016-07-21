<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// AuthController
Route::get('/', 'Auth\AuthController@index');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', ['as'=>'logout','uses' => 'Auth\AuthController@logout']);

// AdminController
Route::get('/admin', 'AdminController@index');
Route::get('/personal', 'AdminController@getPersonal');
Route::post('/save_personal', 'AdminController@postSavePersonal');
Route::get('/manage_exam/{id}', 'AdminController@getManageExam');
Route::post('/save_exam/{set}', 'AdminController@postSaveExam');
Route::get('/manage_member', 'AdminController@getManageMember');
Route::get('/view_member/{username}', 'AdminController@getViewMember');
Route::post('/save_edit_member', 'AdminController@postSaveEditMember');
Route::get('/search_member', 'AdminController@getSearchMember');
Route::post('/view_member_search', 'AdminController@postViewMemberSearch');
Route::post('/save_edit_member_search', 'AdminController@postSaveEditMemberSearch');

// UserController
Route::get('/home', 'UserController@index');
Route::get('/info_personal', 'UserController@getPersonal');
Route::post('/save_info_personal', 'UserController@postSavePersonal');
Route::get('/start_exam', 'UserController@getStartExam');
Route::post('/send_answer', 'UserController@postSendAnswer');
