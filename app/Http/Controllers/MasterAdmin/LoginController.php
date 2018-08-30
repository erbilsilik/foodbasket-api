<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Manager\UserManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Notification;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function loginIndex(Request $request)
    {
//        if (!$request->session()->has('owner')) {
//            return Redirect('/admin');
//        }
        return view('MasterAdmin.Pages.LoginPage');
    }

    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->access_type == UserManager::ACCESS_TYPE_OWNER) {
                $request->session()->put(UserManager::ACCESS_TYPE_OWNER, Auth::user());
                return Redirect('/admin');
            }
            return 'Error';
        }
        return 'Error';
    }
}
