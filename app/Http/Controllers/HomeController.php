<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = new User();
        if ($user::loginCheck()) {
            $alert = 'درخواست پذیرش شما هنوز توسط مدیر به ثبت نرسیده است';
            return view('errorLogin', compact('alert'));
        }
        elseif ($user->loginFalse()) {
            $error = 'درخواست پذیرش شما توسط مدیر رد شده است ';
            return view('errorLogin', compact('error'));
        }

        if( $user::CheckClerk()){
            $alert = 'درخواست پذیرش شما هنوز توسط مدیر به ثبت نرسیده است';
            return view('errorLogin', compact('alert'));
        }
        elseif ($user->FalseClerk()) {
            $error = 'درخواست پذیرش شما توسط مدیر رد شده است ';
            return view('errorLogin', compact('error'));
        }

        else {
            return view('home');
        }
    }
}
