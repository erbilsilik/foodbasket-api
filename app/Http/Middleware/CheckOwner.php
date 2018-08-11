<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use App\Http\Manager\UserManager;

class CheckOwner
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
//        if (Auth::user()->access_type !== UserManager::ACCESS_TYPE_OWNER) {
//            throw new Exception('You don\'t have a permission to access this page');
//        }
        return $next($request);
    }
}
