<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoterSalaryTarget;
use App\Models\User;
use App\Models\Product;
use App\Models\PaymentStatus;
use Illuminate\Support\Facades\Auth;

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

            } elseif($user->usertype == 3) {
                return redirect()->intended('/manager/dashboard');
            }elseif($user->usertype == 0) {
                return redirect()->intended('/shop-index');
            }
            elseif($user->usertype == 4) {
                return redirect()->intended('/shopkeeper/dashboard');
            }
        }
        else{
            return redirect()->route('login')->with(['status'=>"Login credentials don't match!!"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
