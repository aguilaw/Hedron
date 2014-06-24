<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*Route::model('page', 'pages');*/
Route::model('image','Image');
Route::model('update','Update');

Route::get('/', 'HomeController@ShowHome');
Route::get('/home','HomeController@ShowHome');

/*Admin Routes*/
Route::get('/admin', 'AdminController@AdminDashboard');
Route::get('/adminLogin', 'AdminController@AdminLogin');
Route::get('/logout', 'AdminController@Logout');
Route::get('/{page}', 'PagesController@ShowComingSoon');

Route::get('/admin/images/new', 'ImagesController@ImageNew');
Route::get('/admin/images/{image}', 'ImagesController@ImageEdit');
Route::get('/admin/images/delete/{image}', 'ImagesController@ImageDelete');

Route::get('/admin/updates/new', 'UpdatesController@UpdateNew');
Route::get('/admin/updates/{update}', 'UpdatesController@UpdateEdit');
Route::get('/admin/updates/delete/{update}', 'UpdatesController@UpdateDelete');


/*Handle Forms*/
Route::post('/admin/images/delete/{image}', 'ImagesController@ImageDelete');
Route::post('/admin/images/new', 'ImagesController@SaveImageNew');
Route::post('/admin/images/{image}', 'ImagesController@SaveImageEdit');

Route::post('/admin/updates/new', 'UpdatesController@SaveUpdateNew');
Route::post('/admin/updates/{update}', 'UpdatesController@SaveUpdateEdit');
Route::post('/admin/updates/delete/{update}', 'UpdatesController@UpdateDelete');

Route::post('/adminLogin', 'AdminController@VerifyLogin');
