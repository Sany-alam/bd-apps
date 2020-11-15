<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->where('password',$request->password)->first();
        if ($user) {
            auth()->loginUsingId($user->id);
            return redirect('/');
        }else{
            return redirect('login')->with('message','Invalid credential');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
