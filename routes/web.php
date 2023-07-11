<?php

use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Auth;
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
    return view('React.build');
});

Route::get('/admin', function () {
    return view('auth.login');
});

//  LOGIN
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@authenticate');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');

    //CONVERGE
    Route::get('/converge', 'App\Http\Controllers\ConvergeController@index')->name('converge-index');

    //CONVERGE TOPIC
    Route::get('/add_converge_topic', 'App\Http\Controllers\ConvergeTopicController@add')->name('add_converge_topic');
    Route::post('/save_converge_topic', 'App\Http\Controllers\ConvergeTopicController@insert')->name('save_converge_topic');
    Route::get('/edit_topic/{id}', 'App\Http\Controllers\ConvergeTopicController@edit')->name('edit_topic');
    Route::post('/update_topic/{id}', 'App\Http\Controllers\ConvergeTopicController@update')->name('update_topic');
    Route::get('/delete_topic/{id}', 'App\Http\Controllers\ConvergeTopicController@delete')->name('delete_topic');

    //COLLABORATE HEADING
    Route::get('/collaborate_heading', 'App\Http\Controllers\CollaborateController@collaborate_heading')->name('collaborate_heading');

    //COLLABORATE PORTFOLIO
    Route::get('/collaborate_portfolio', 'App\Http\Controllers\CollaborateController@collaborate_portfolio')->name('collaborate_portfolio');
    Route::get('/add_portfolio', 'App\Http\Controllers\CollaborateController@add_portfolio')->name('add_portfolio');
    Route::post('/save_portfolio', 'App\Http\Controllers\CollaborateController@save_portfolio')->name('save_portfolio');
    Route::get('/view_portfolio/{id}', 'App\Http\Controllers\CollaborateController@view_portfolio')->name('view_portfolio');
    Route::get('/edit_portfolio/{id}', 'App\Http\Controllers\CollaborateController@edit_portfolio')->name('edit_portfolio');
    Route::post('/update_portfolio/{id}', 'App\Http\Controllers\CollaborateController@update_portfolio')->name('update_portfolio');
    Route::post('/image_upload/{id}', 'App\Http\Controllers\CollaborateController@image_upload')->name('image_upload');
    Route::get('/delete_image/{id}/{image}', 'App\Http\Controllers\CollaborateController@deleteImage')->name('delete_image');
    Route::get('/delete_portfolio/{id}', 'App\Http\Controllers\CollaborateController@delete_portfolio')->name('delete_portfolio');

    //COGITATE HEADING
    Route::get('/cogitate_heading', 'App\Http\Controllers\CogitateController@cogitate_heading')->name('cogitate_heading');

    //COGITATE SERVICE
    Route::get('/serviceIndex', 'App\Http\Controllers\CogitateController@serviceIndex')->name('serviceIndex');
    Route::get('/add_service', 'App\Http\Controllers\CogitateController@add_service')->name('add_service');
    Route::post('/save_service', 'App\Http\Controllers\CogitateController@save_service')->name('save_service');
    Route::get('/edit_service/{id}', 'App\Http\Controllers\CogitateController@edit_service')->name('edit_service');
    Route::post('/update_service/{id}', 'App\Http\Controllers\CogitateController@update_service')->name('update_service');
    Route::get('/delete_service/{id}', 'App\Http\Controllers\CogitateController@delete_service')->name('delete_service');

    //COGITATE SERVICE LINK
    Route::get('/serviceLinkIndex', 'App\Http\Controllers\CogitateController@serviceLinkIndex')->name('serviceLinkIndex');
    Route::get('/add_serviceLink', 'App\Http\Controllers\CogitateController@add_serviceLink')->name('add_serviceLink');
    Route::post('/save_serviceLink', 'App\Http\Controllers\CogitateController@save_serviceLink')->name('save_serviceLink');
    Route::get('/edit_serviceLink/{id}', 'App\Http\Controllers\CogitateController@edit_serviceLink')->name('edit_serviceLink');
    Route::post('/update_serviceLink/{id}', 'App\Http\Controllers\CogitateController@update_serviceLink')->name('update_serviceLink');
    Route::get('/delete_serviceLink/{id}', 'App\Http\Controllers\CogitateController@delete_serviceLink')->name('delete_serviceLink');

    //COMMUNICATE HEADING
    Route::get('/communicate_heading', 'App\Http\Controllers\CommunicateController@communicate_heading')->name('communicate_heading');

    //COMMUNICATE MESSAGE
    Route::get('/communicate_message', 'App\Http\Controllers\CommunicateController@communicate_message')->name('communicate_message');
    Route::get('/update_readStatus', 'App\Http\Controllers\CommunicateController@update_readStatus')->name('update_readStatus');
    Route::get('/messageData/{id}', 'App\Http\Controllers\CommunicateController@messageData')->name('messageData');
    Route::get('/messageDetails/{id}', 'App\Http\Controllers\CommunicateController@messageDetails')->name('messageDetails');
    Route::get('/view_data/{id}', 'App\Http\Controllers\CommunicateController@view_data')->name('view_data');

    //PARTNERS
    Route::get('/partners', 'App\Http\Controllers\ConvergeLinkController@index')->name('partners-index');
    Route::get('/add_converge_link', 'App\Http\Controllers\ConvergeLinkController@add')->name('add_converge_link');
    Route::post('/save_converge_link', 'App\Http\Controllers\ConvergeLinkController@insert')->name('save_converge_link');
    Route::get('/edit_link/{id}', 'App\Http\Controllers\ConvergeLinkController@edit')->name('edit_link');
    Route::post('/update_link/{id}', 'App\Http\Controllers\ConvergeLinkController@update')->name('update_link');
    Route::get('/delete_link/{id}', 'App\Http\Controllers\ConvergeLinkController@delete')->name('delete_link');

    //content
    Route::get('/content/{page}', 'App\Http\Controllers\ContentController@index')->name('content-index');
    Route::get('/add_content/{page}', 'App\Http\Controllers\ContentController@add_content')->name('add_content');
    Route::post('/set_content', 'App\Http\Controllers\ContentController@set_content')->name('set_content');
    Route::get('/delete_content/{page}/{id}', 'App\Http\Controllers\ContentController@delete_content')->name('delete_content');
    Route::get('/edit_content/{page}/{id}', 'App\Http\Controllers\ContentController@edit_content')->name('edit_content');
    Route::post('/update_content/{id}', 'App\Http\Controllers\ContentController@update_content')->name('update_content');

    //HEADING
    Route::get('/heading/{page}', 'App\Http\Controllers\ContentController@heading')->name('heading');
    Route::get('/update_heading/{type}', 'App\Http\Controllers\HeadingController@update_heading')->name('update_heading');
    Route::post('/heading_update', 'App\Http\Controllers\HeadingController@heading_update')->name('heading_update');


});