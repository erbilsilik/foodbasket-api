<?php

namespace App\Http\Middleware;

use App\Http\Manager\UserManager;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class CheckCustomer
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
        $userId = Auth::user()->getAuthIdentifier();
        $user = User::find($userId);

        if (isset($user) && $user->access_type === UserManager::ACCESS_TYPE_CUSTOMER) {
            return $next($request);
        }

        throw new Exception('You are not authorized to make this request');

    }
}
