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
Route::group( [ 'middleware' => 'auth' ], function()
{
	Route::post('/admin-video/delete', 'AdminVideoController@ajaxDelete');
	Route::post('/admin-video/update', 'AdminVideoController@ajaxUpdate');
	Route::post('/admin-video/create', 'AdminVideoController@ajaxStore');
	Route::get('/admin-video/update-check', 'AdminVideoController@updateCheckExist');
	Route::get('/admin-video/create-check', 'AdminVideoController@addCheckExist');
	Route::get('/admin-video/show', 'AdminVideoController@ajaxShow');
	Route::get('/admin-video', 'AdminController@adminVideo');

	Route::get('/admin-blog', 'AdminController@adminBlog');
	Route::get('/admin-blog/create', 'AdminController@createBlog');
	Route::get('/admin-blog/show', 'AdminBlogController@ajaxShow');
	Route::post('/admin-blog/create/store', 'AdminBlogController@ajaxStore');
	Route::get('/check-blog-title', 'AdminBlogController@checkBlogTitle');
	Route::get('/admin-blog/edit/{slug}', 'AdminController@editBlog')->name('edit-blog');
	Route::post('/admin-blog/edit/update', 'AdminBlogController@ajaxUpdate');
	Route::post('/admin-blog/delete', 'AdminBlogController@ajaxDelete');

	Route::get('/admin-category', 'AdminController@adminCategory');
	Route::get('/admin-category/show', 'CategoryController@ajaxShow');
	Route::post('/admin-category/store', 'CategoryController@ajaxStore');
	Route::get('/check-category-name', 'CategoryController@checkCategoryName');
	Route::post('/admin-category/update', 'CategoryController@ajaxUpdate');
	Route::post('/admin-category/delete', 'CategoryController@ajaxDelete');

	Route::post('/admin-logo/delete', 'AdminLogoController@ajaxDelete');
	Route::post('/admin-logo/update', 'AdminLogoController@ajaxUpdate');
	Route::post('/admin-logo/create', 'AdminLogoController@ajaxStore');
	Route::get('/admin-logo/show', 'AdminLogoController@ajaxShow');
	
	Route::post('/admin-gallery/delete', 'AdminImageController@ajaxDelete');
	Route::post('/admin-gallery/update', 'AdminImageController@ajaxUpdate');
	Route::post('/admin-gallery/create', 'AdminImageController@ajaxStore');
	Route::get('/admin-gallery/show', 'AdminImageController@ajaxShow');
	Route::get('/admin-gallery', 'AdminController@adminGallery');

	Route::get('/admin-audio', 'AdminController@adminAudio');
	Route::post('/admin-audio/store', 'AudioController@ajaxStore');
	Route::get('/check-audio-title', 'AudioController@checkAudioTitle');
	Route::get('/admin-audio/show', 'AudioController@ajaxShow');
	Route::post('/admin-audio/update', 'AudioController@ajaxUpdate');
	Route::post('/admin-audio/delete', 'AudioController@ajaxDelete');
});

Route::get('/blogs', 'PagesController@blogs');
Route::get('/blogs/{slug}', 'PagesController@blogSingle')->name('blog-single');

Route::get('/videos-show/display', 'AdminVideoController@ajaxDisplayVideos');

Route::get('/contact', 'PagesController@contact');
Route::post('/contact/send', 'ContactController@contactSend');

Route::get('/blog-single', 'PagesController@blogSingle');
Route::get('/videos-show', 'PagesController@videos');
Route::get('/gallery', 'PagesController@gallery');
Route::get('/about', 'PagesController@about');
Route::get('/', 'PagesController@index');

Route::get('/auth/logout', 'LoginController@logout');
Route::post('/auth/login', 'LoginController@login');
