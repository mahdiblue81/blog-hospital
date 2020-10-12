<?php

namespace App\Policies;

use App\Manager;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function manager(User $user)
    {
        return $user->hasRole('manager');
    }
}
