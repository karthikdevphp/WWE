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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes important
Route::get('/videos/add', 'VideosController@add')->name('addVideo');
Route::post('/videos/save', 'VideosController@save')->name('saveVideo');
Route::get('/videos', 'VideosController@all')->name('listVideo');

Route::get('/metadata/keywords/add', 'MetadataController@addKeyword')->name('addKeyword');
Route::post('/metadata/keywords/save', 'MetadataController@saveKeyword')->name('saveKeyword');

Route::get('/metadata/locations/add', 'MetadataController@addLocation')->name('addLocation');
Route::post('/metadata/locations/save', 'MetadataController@saveLocation')->name('saveLocation');

Route::get('/metadata', 'MetadataController@listAll')->name('listMetadata');

Route::post('/videos/{videoId}/keywords/{keywordId}/add', 'VideosController@assignKeyword')->name('assignKeyword');
Route::post('/videos/{videoId}/keywords/{keywordId}/remove', 'VideosController@unAssignKeyword')->name('unAssignKeyword');

Route::post('/videos/{videoId}/locations/{locationId}/assign', 'VideosController@assignLocation')->name('assignLocation');
Route::post('/videos/{videoId}/location/remove', 'VideosController@removeLocation')->name('removeLocation');

Route::post('/videos/{videoId}/like', 'VideosController@like')->name('like');
Route::post('/videos/{videoId}/dislike', 'VideosController@dislike')->name('dislike');

Route::get('/videos/liked', 'VideosController@likedVideos')->name('likedVideos');

Route::resource('api/videos', 'VideoApiController');

