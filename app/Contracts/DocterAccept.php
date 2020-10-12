<?php

namespace  App\Contracts;
use App\User;
use App\Contracts\ManagerAbstract;
class DocterAccept extends ManagerAbstract
{
    public function docterAcceptOrReject()
    {
        $user=User::find($this->value);
        $user->is_active = 1;
        $user->save();
        return redirect()->back()->with('success', ' پزشک تایید شد');
    }

}
