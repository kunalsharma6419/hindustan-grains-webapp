<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoterSalaryTarget;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\PaymentStatus;

class AuthController extends Controller
{

    public function home()
    {
        $target=PromoterSalaryTarget::where('promoter_id',Auth::user()->id)->first();
        $amountpaid=PaymentStatus::where('promoter_id',Auth::user()->id)->sum('amount_paid');
        return view('pramoter.home',compact('target','amountpaid'));
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->usertype == 1) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->usertype == 2) {
                return redirect()->intended('/promoter/home');
<<<<<<< HEAD
            }else{
                return redirect()->intended('home');      
=======
            } else {
                return redirect()->route('dashboard');
>>>>>>> d2852ac828ac8eeb015f735df31fc61f740115a8
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
