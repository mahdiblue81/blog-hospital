<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Manager extends Model
{
    public function docterAccept($id)
    {
        $user = User::find($id);
        $user->is_active = 1;
        $user->save();
        return redirect()->back()->with('success', ' پزشک تایید شد');
    }

    public function docterReject($id)
    {
        $user = User::find($id);
        $user->is_active = 0;
        $user->save();
        return redirect()->back()->withErrors([' درخواست استخدام رد شد ']);
    }





}
