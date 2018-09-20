<?php

namespace App\Http\Middleware;
use App\Log;

use Closure;
use Session;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //get current url hit by user.
        $url = $request->route()->uri;
        $routes = session()->get('log');
        //append currrent url in session array
        if(!is_null($routes)){
            $routes[0] =$url ;
            array_push($routes,$url);
        }else{
            $routes=[$url];
        }
        //putting the new array of url in session.
        Session::put('log', $routes);
        return $next($request);
    }
}
