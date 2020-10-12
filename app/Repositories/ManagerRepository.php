<?php

namespace App\Repositories;

use App\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
class ManagerRepository
{
  public function permissionOk($id)
  {
    $user=User::find($id);
    $user->is_active=1;
    $user->roles()->attach(3);
    $user->save();
    return back();
  }

  //delete user
  public function permissionFalse($id)
  {
    $user=User::find($id);
    $user->is_active=0;
    $user->save();
    return back();
  }

  public function scopeIdDoctor($isDoctor)
  {
      return User::where('isDoctor', $isDoctor)->where('is_active', null);
  }



}
