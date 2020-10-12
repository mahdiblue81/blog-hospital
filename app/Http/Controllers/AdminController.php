<?php

namespace App\Http\Controllers;

use App\Doc;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createManager()
    {
        return view('admin.createManager');
    }

    public function listManager(Request $request)
    {
        $users = User::isMember(2)->get();
        return view('admin.listManager', compact('users'));
    }

    public function storeManager(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->codMeli = $request->input('codMeli');
        $user->phone = $request->input('phone');
        $user->isMember = 2;
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->roles()->attach(2);
        return redirect('home');
    }

    //storeDoctor

    public function createDoctor()
    {
        return view('manager.createDoctor');
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->create(request()->all());
        $user->save();
        if ($request->isDoctor === 1) {
            $user->roles()->attach(3);
        }
        return redirect('home');
    }


    public function doctorManager()
    {
        $doctor = User::find(Auth::user()->id);
        $property = $doctor->doctors;

        return view('doctor.doctorManager', compact('doctor', 'property'));
    }
}
