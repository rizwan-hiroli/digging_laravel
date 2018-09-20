<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    //overriding trait authenticated  
    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $maxAttempts = 1;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     *  Overridng auth logout function as we need to make,
     *  log before logout.
     *  See authenticated trait used above.
     */
    public function logout(Request $request){
        //getting routes visited by user from session
        $routes = session()->get('log');
        $db_routes = Log::where('user_id',\Auth::id())->value('routes');
        //checking if we already have an entry in db if yes add these route in that array
        if(!is_null($db_routes)){
            $db_routes = json_decode($db_routes);;
            $routes = array_merge($db_routes,$routes);
        }
        Log::updateOrCreate(['user_id'=>\Auth::id()],['name'=>'dunnmy','routes'=>json_encode($routes)]);
        $this->performLogout($request);
        return redirect('/');
    }

}
