<?php

namespace App\Http\Controllers\MasterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginIndex(){
        return view('MasterAdmin.Pages.LoginPage');
    }

    public function loginPost(Request $request){

//        $this->validate($request, [
//            'email'           => 'required|max:255|email',
//            'password'           => 'required|confirmed',
//        ]);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();

            return response()->json([
                'data' => $user->toArray(),
            ]);
        }

        return var_Dump($this->sendFailedLoginResponse($request));
    }
}
