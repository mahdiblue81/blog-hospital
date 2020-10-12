<?php

namespace App\Policies;

use App\Docter;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class DocterPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function doctersAuth(User $user, Docter $docter)
    {
        return $docter->where('user_id', Auth::user()->id)->where('submit', 1)->first();
    }

    // public function doctersIsLogin(User $user, Docter $docter)
    // {
    //     return $docter->where('user_id', Auth::user()->id)->where('submit', 0)->first();
    // }
}
