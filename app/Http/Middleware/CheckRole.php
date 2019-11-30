<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Log;
use Redirect;
use App\Constants;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
            
        if (Auth::user()->role->name !== Constants::ROLE_ADMIN) {
            return Redirect::to('/errors/404');
        }

        return $next($request);
    }
}
