<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // dd("dd");
        if(session()->get('User_Signup')['email'] == $request->email) {

            return redirect()->route('AmeaToday_user-dashboard');
        }
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
