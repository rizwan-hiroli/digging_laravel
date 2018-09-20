<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Jobs\SendEmail;
use App\User;

class MailController extends Controller
{
   public function SendMail(){
   	$users  = User::get()->toArray();
   	SendEmail::dispatch($users)->delay(now()->addMinutes(1));
   	return back();
   }
}
