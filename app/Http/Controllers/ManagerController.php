<?php

namespace App\Http\Controllers;

use App\Docter;
use App\Events\AcceptEvent;
use App\Events\MyEvent;
use App\Events\RejectEvent;
use App\madrak;
use App\Manager;
use App\property;
use App\Repositories\ManagerRepository;
use App\Shift;
use App\skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\ManagerInterface;
use App\Contracts\DocterReject;
use App\Contracts\DocterAccept;
use App\QueryFillters\Active;
use App\QueryFillters\isMember;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\App;
use Illuminate\Pipeline\Pipeline;

class ManagerController extends Controller implements ManagerInterface
{
    // private $repository;
    // public function __construct(ManagerRepository $repository)
    // {
    //     $this->repository = $repository;
    // }
    public function listRequest()
    {
        $user = User::isMember(1)->get();
        return view('manager.requestList', compact('user'));
    }

    public function madrakDocter($dir)
    {
        return view('manager.madrakDocter', compact('dir'));
    }

    public function listRequestClerk()
    {
        $user = User::isMember(3)->get();
        return view('manager.listRequestClerk', compact('user'));
    }

    public function listDoctors()
    {
        // $users = User::isActive(1);
        $docters = Docter::all();
        $users = app(Pipeline::class)
        ->send(User::query())
        ->through([
            Active::class
        ])
        ->thenReturn()
        ->get();

        // if(request()->has('is_active'))
        // {
        //     $users->where('is_active',request('is_active'))->get();
        // }

        // if(request()->has('sort'))
        // {
        //     $users->orderby('name',request('sort'))->get();
        // }
        // $users=$users->get();
        // $docters = Docter::all();
        return view('manager.listDoctors', compact('users', 'docters'));
    }


    public function clerkReject($id)
    {
        $user= User::find($id);
        Event(new AcceptEvent($user));
        return redirect()->back()->withErrors([' درخواست استخدام رد شد ']);
        return back();
    }

    public function clerkAccept($id)
    {
        $accept = resolve('DocterAccept', [$id]);
        return $accept->docterAcceptOrReject();
    }

    public function docterAccept($id)
    {
        // $manager = new Manager();
        // return $manager->docterAccept($id);

        //* event */***************************** */

        // $user = User::find($id);
        // event(new AcceptEvent($user));ریر
        // return redirect()->back()->with('success', ' پزشک تایید شد');
        // return back();

        //abstract *****************************
        $accept = resolve('DocterAccept', [$id]);
        return $accept->docterAcceptOrReject();
    }

    public function docterReject($id)
    {
        // $manager = new Manager();
        // return $manager->docterReject($id);

        //* event */***************************** */

        $user = User::find($id);
        event(new RejectEvent($user));
        return redirect()->back()->withErrors([' درخواست استخدام رد شد ']);
        return back();


        //abstract *****************************

        // $accept = resolve('DocterReject',[$id])
        // return $accept->docterAcceptOrReject();
    }

    public function madrak()
    {
        $madrak = madrak::all();
        return view('manager.madrak', compact('madrak'));
    }


    public function MakeShift()
    {
        $shifts = Shift::all();
        return view('manager.makeShift', compact('shifts'));
    }


    public function skill()
    {
        $skill = skill::all();
        return view('manager.skill', compact('skill'));
    }

    public function Storemadrak(Request $request)
    {
        try {
            $madrak = new madrak();
            $madrak->title = $request->madrak;
            $madrak->save();
            return redirect()->back()->with('success', ' مدرک دلخواه ثبت شد ');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([' مدرک دلخواه شما قبلا ثبت شده است  ']);
            return false;
        }
    }

    public function StoreShift(Request $request)
    {
        $shifts = new Shift();
        $status = 0;
        $date = Shift::CheckDateTime($request->yers, $request->month)->get();
        foreach ($date as $item) {
            if ($shifts->TimeBetween($request->time_start, $item->time_start, $item->time_end) == 1) {
                $status++;
            }
            if ($shifts->TimeBetween($request->time_end, $item->time_start, $item->time_end) == 1) {
                $status++;
            }
        }
        if ($status == 0) {
            $isCount = $shifts->countVisit($request->time_start, $request->time_end);
            $shifts->yers = $request->yers;
            $shifts->month = $request->month;
            $shifts->time_start = $request->time_start;
            $shifts->time_end = $request->time_end;
            $shifts->time_end = $request->time_end;
            $shifts->isCount = $isCount;
            $shifts->nowTime = $request->time_start;
            $shifts->save();
            return redirect()->back()->with('success', 'زمان کاری شما ثبت شد');
        } else {
            return redirect()->back()->withErrors(['زمان کاری ثبت نشد ساعت ها باهم تداخل دارند ']);
        }
    }

    public function StoreSkill(Request $request)
    {
        try {
            $skill = new skill();
            $skill->title = $request->get('skill');
            $skill->save();
            return redirect()->back()->with('success', 'تخصص دلخواه ثبت شد ');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([' تخصص دلخواه قبلا ثبت شده   ']);
            return false;
        }
    }

    public function deleteMadrak($id)
    {
        try {
            $madrak = madrak::find($id);
            $madrak->delete();
            return redirect()->back()->with('success', 'مدرک حذف شد  ');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([' تخصص دلخواه حذف نشد  ']);
            return false;
        }
    }

    public function deleteShift($id)
    {
        try {
            $shift = Shift::find($id);
            $shift->delete();
            return redirect()->back()->with('success', 'ساعت کاری حذف شد  ');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([' ساعت دلخواه حذف نشد  ']);
            return false;
        }
    }

    public function deleteSkill($id)
    {
        $skill = skill::find($id);
        $skill->delete();
        return redirect()->back()->with('success', 'تخصص حذف شد  ');
    }
}
