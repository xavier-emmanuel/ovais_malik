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
Route::get('/admin-video', 'PagesController@adminVideo');
Route::get('/admin-blog', 'AdminController@adminBlog');
Route::get('/admin-blog/create', 'AdminController@createBlog');

Route::get('/contact', 'PagesController@contact');
Route::get('/blog-single', 'PagesController@blogSingle');
Route::get('/blogs', 'PagesController@blogs');
Route::get('/videos-show', 'PagesController@videos');
Route::get('/gallery', 'PagesController@gallery');
Route::get('/about', 'PagesController@about');
Route::get('/', 'PagesController@index');
