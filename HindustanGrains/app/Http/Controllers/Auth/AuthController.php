<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;

class AuthController extends Controller
{

    public function home()
    {
        
        return view('pramoter.home');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                return redirect()->intended('/dashboard');
            } elseif ($user->usertype == 2) {
                return redirect()->intended('/home');
            }
        }
    }

    
}
