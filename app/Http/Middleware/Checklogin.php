<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Checklogin
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next){

        if ($request->session()->has('password')) {

            $get_password = $request->session()->get('password');

            $get_check_session = DB::select("SELECT * FROM user WHERE password = '$get_password'");

            if( count($get_check_session) == 1 ){

                return redirect('home');
            
            }else{

                return $next($request);   
            }
        
        }else{

           return $next($request);   
        }
    }
}
