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


Route::get('/admin/images/new', 'ImagesController@MakeNewImage');
Route::get('/admin/images', 'ImagesController@MakeNewImage');
Route::get('/admin/images/{image}', 'ImagesController@EditImage');
Route::get('/admin/images/delete/{image}', 'ImagesController@DeleteImage');

Route::get('/admin/updates/new', 'UpdatesController@MakeNewUpdate');
Route::get('/admin/updates', 'UpdatesController@MakeNewUpdate');
Route::get('/admin/updates/{update}', 'UpdatesController@EditUpdate');
Route::get('/admin/updates/delete/{update}', 'UpdatesController@DeleteUpdate');

Route::get('/admin/users/new', 'UsersController@MakeNewUser');
Route::get('/admin/users', 'UsersController@MakeNewUser');
Route::get('/admin/users/{user}', 'UsersController@EditUser');
Route::get('/admin/users/delete/{user}', 'UsersController@DeleteUser');

/*Public Routes*/
Route::get('/', 'PagesController@ShowHome');
Route::get('/home','PagesController@ShowHome');

Route::get('/gallery/{image}','PagesController@ShowGallery');
Route::get('/gallery','PagesController@ShowGallery');


Route::get('/sketchbook/{image}','PagesController@ShowSketchbook');
Route::get('/sketchbook','PagesController@ShowSketchbook');

Route::get('/about', 'PagesController@ShowAbout');
Route::get('/contact', 'PagesController@ShowComingSoon');
Route::get('/latest-project', 'PagesController@ShowComingSoon');


/*Handle Forms*/
Route::post('/admin/images/delete/{image}', 'ImagesController@DeleteImage');
Route::post('/admin/images/new', 'ImagesController@SaveNewImage');
Route::post('/admin/images/{image}', 'ImagesController@SaveImageEdit');

Route::post('/admin/updates/new', 'UpdatesController@SaveNewUpdate');
Route::post('/admin/updates/{update}', 'UpdatesController@SaveUpdateEdit');
Route::post('/admin/updates/delete/{update}', 'UpdatesController@DeleteUpdate');

Route::post('/admin/users/new', 'UsersController@SaveNewUser');
Route::post('/admin/users/{user}', 'UsersController@SaveUserEdit');
Route::post('/admin/users/delete/{user}', 'UsersController@DeleteUser');

Route::post('/adminLogin', 'AdminController@VerifyLogin');
