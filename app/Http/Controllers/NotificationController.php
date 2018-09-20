<?php

namespace App\Http\Controllers;
use Notification;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\SendMail;

class NotificationController extends Controller
{
    public function SendNotification(){

    	$users = User::get();
    	$invoice = "some invoice text";
    	Notification::send($users, new SendMail($invoice));
    	return back();
    }

    public function ReadNotification(){

    	$user = User::find(1);
		foreach ($user->notifications as $notification) {
		    echo $notification;
		}
    }
}
