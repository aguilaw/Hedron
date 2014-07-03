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
Route::model('user','User');



/*Admin Routes*/
Route::get('/admin', 'AdminController@AdminDashboard');
Route::get('/adminLogin', 'AdminController@AdminLogin');
Route::get('/logout', 'AdminController@Logout');


Route::get('/admin/images/new', 'ImagesController@ImageNew');
Route::get('/admin/images/{image}', 'ImagesController@ImageEdit');
Route::get('/admin/images/delete/{image}', 'ImagesController@ImageDelete');

Route::get('/admin/updates/new', 'UpdatesController@UpdateNew');
Route::get('/admin/updates/{update}', 'UpdatesController@UpdateEdit');
Route::get('/admin/updates/delete/{update}', 'UpdatesController@UpdateDelete');

Route::get('/admin/users/new', 'UsersController@UserNew');
Route::get('/admin/users/{user}', 'UsersController@UserEdit');
Route::get('/admin/users/delete/{user}', 'UsersController@UserDelete');

/*Public Routes*/
Route::get('/', 'PagesController@ShowHome');
Route::get('/home','PagesController@ShowHome');

Route::get('/gallery/{image}','PagesController@ShowImage');
Route::get('/gallery','PagesController@ShowGallery');

Route::get('/sketchbook','PagesController@ShowSketchbook');
Route::get('/sketchbook/{image}','PagesController@ShowSketch');

Route::get('/{page}', 'PagesController@ShowComingSoon');


/*Handle Forms*/
Route::post('/admin/images/delete/{image}', 'ImagesController@ImageDelete');
Route::post('/admin/images/new', 'ImagesController@SaveImageNew');
Route::post('/admin/images/{image}', 'ImagesController@SaveImageEdit');

Route::post('/admin/updates/new', 'UpdatesController@SaveUpdateNew');
Route::post('/admin/updates/{update}', 'UpdatesController@SaveUpdateEdit');
Route::post('/admin/updates/delete/{update}', 'UpdatesController@UpdateDelete');

Route::post('/admin/users/new', 'UsersController@SaveUserNew');
Route::post('/admin/users/{user}', 'UsersController@SaveUserEdit');
Route::post('/admin/users/delete/{user}', 'UsersController@UserDelete');

Route::post('/adminLogin', 'AdminController@VerifyLogin');
