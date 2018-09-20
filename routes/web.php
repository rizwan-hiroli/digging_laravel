<?php

use App\Http\Middleware\LogMiddleware;
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

Route::group(['middleware' => 'log'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/send_mail', 'MailController@SendMail');
	Route::get('/send_notification', 'NotificationController@SendNotification');
	Route::get('/read_notification', 'NotificationController@ReadNotification');
	Route::get('markAsRead', function(){
		auth()->user()->unreadNotifications->markAsRead();
		return back();
	})->name('markRead');

	Route::get('/middleware_test',function(){
		echo "inside test middleware route";
		$middleware = new LogMiddleware();
		// dd($middleware->log_array);
	});
});