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

/*Public Routes**************************************************/
Route::bind ('artwork',function($slug){
	return hedron\Artwork::whereSlug($slug)->first();
});


Route::get('/', 'PagesController@ShowHome');
Route::get('/home','PagesController@ShowHome');
Route::get('/about','PagesController@ShowAbout');

Route::get('/gallery/{artwork}','PagesController@ShowGallery');
Route::get('/gallery','PagesController@ShowGallery');


Route::get('/sketchbook/{artwork}','PagesController@ShowSketchbook');
Route::get('/sketchbook','PagesController@ShowSketchbook');

Route::get('/about', 'PagesController@ShowAbout');
//Route::get('/contact', 'PagesController@ShowContact');
//Route::get('/work', 'PagesController@ShowContact');
//Route::get('/latest-project', 'PagesController@ShowComingSoon');


/*Admin Routes***************************************************/

/*using defautl 'AUTH' class renamed admin for clarity and consistency
functions founs @ vendonr\laravelr\src\Illuminate\Foundation\auth\authenticates and registers users*/

Route::controllers([
	'password' => 'Auth\PasswordController',
]);

Route::get('/admin', 'PagesController@ShowAdminDashboard');
Route::get('/admin/artworks/new',['as' => 'createArtwork_path', 'uses' =>'ArtworksController@create']);
Route::get('/admin/artworks', ['as' => 'artworks_path', 'uses' =>'ArtworksController@index']);
Route::get('/admin/artworks/{artwork}', ['as' =>'editArtwork_path', 'uses' => 'ArtworksController@edit']);
Route::get('/admin/artworks/delete/{artwork}',['as' =>'deleteArtwork_path', 'uses' =>'ArtworksController@delete']);

Route::get('/admin/posts/new', 'PostsController@create');
Route::get('/admin/posts', 'PostsController@index');
Route::get('/admin/posts/{post}', 'PostsController@update');
Route::get('/admin/posts/delete/{post}', 'PostsController@delete');

Route::get('/admin/users/register',['as' => 'registerUser_path', 'uses' =>'UsersController@getRegister']);
Route::post('/admin/users/register',['as' => 'postRegisterUser_path', 'uses' =>'UsersController@postRegister']);
Route::get('/login',['as' => 'login_path', 'uses' =>'UsersController@getLogin']);
Route::post('/login',['as' => 'postlogin_path', 'uses' =>'UsersController@postLogin']);
Route::get('/logout',['as' => 'getlogout_path', 'uses' =>'UsersController@getLogout']);
Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/users/{user}', 'UsersController@update');
Route::get('/admin/users/delete/{user}', 'UsersController@delete');


/*Handle Forms*******************************************************/

Route::post('/admin/artworks/delete/{artwork}', 'ArtworksController@delete');
Route::post('/admin/artworks/new', 'ArtworksController@store');
Route::post('/admin/artworks/{artwork}', 'ArtworksController@post');
/*
Route::post('/admin/posts/new', 'PostsController@SaveNewUpdate');
Route::post('/admin/posts/{post}', 'PostsController@SaveUpdateEdit');
Route::post('/admin/posts/delete/{post}', 'PostsController@DeleteUpdate');

Route::post('/admin/users/new', 'UsersController@SaveNewUser');
Route::post('/admin/users/{user}', 'UsersController@SaveUserEdit');
Route::post('/admin/users/delete/{user}', 'UsersController@DeleteUser');

*/
