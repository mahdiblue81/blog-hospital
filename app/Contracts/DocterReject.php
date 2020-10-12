<?php

namespace  App\Contracts;
use App\User;
use App\Contracts\ManagerAbstract;
class DocterReject extends ManagerAbstract
{

    public function DocterAcceptOrReject()
    {
        $user=User::find($this->value);
        $user->is_active = 0;
        $user->save();
        return redirect()->back()->with('success', ' پزشک تایید شد');
    }
}
