<?php

namespace App\Http\Controllers;

use App\Clerk;
use App\Mytrait\myTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClerkController extends Controller
{
use myTrait;

    public function Complete()
    {
        // return view('clerk.compeletClerk');
        return $this->show();
    }

    public function storeClerk(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $user->clerkable()->create(['bio'=>$request->bio]);
        $user->save();
        return back();
    }

}
