<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Docter;
use App\Shift;
use App\Visit;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    public function listDoctors()
    {
        $users = User::isActive(1);
        $docters = Docter::all();
        return view('patient.DoctorList', compact('users', 'docters'));
    }

    public function TakeTurn(User $user)
    {
        $docters = Docter::findDocter($user->id)->get();
        return view('patient.TakeTurn', compact('docters', 'user'));
    }

    public function ListVisit()
    {
        $user = User::find(Auth::user()->id);
        $visit = Visit::findUser(Auth::user()->id)->get();
        return view('patient.listVisit', compact('visit', 'user'));
    }


    public function ListTakeTurn()
    {
        $users = User::CheckDocter();
        $doctors = Docter::all();
        return view('patient.ListTakeTurn', compact('doctors', 'users'));
    }



    public function TakeVisit(Request $request, $shiftId, $docterId)
    {
        $docters = Docter::find($shiftId);
        $shift = Shift::find($shiftId);
        $user = User::find(Auth::user()->id);
        $visits = Visit::GetShiftByDay($request->day, $shiftId)->get();
        $visitFalse = Visit::VisitFalse($request->day, $shiftId, Auth::user()->id)->get();
        $visit = new Visit();
        if (count($visits) >= $shift->isCount) {
            return redirect()->back()->withErrors(['وقت ملاقات پر شده است ']);
            return false;
        }
        if (count($visitFalse) > 0) {
            return redirect()->back()->withErrors(['شما یک وقت ملاقات از قبل دارید ']);
            return false;
        }
        if (count($visits) > 0 && count($visits) < $shift->isCount) {
            $visit->time_start = $visit->setStartTimeVisit($shift->time_start, count($visits));
            $visit->time_end = $visit->setEndTimeVisit($shift->time_start, count($visits) + 1);
            $visit->user_id = $user->id;
            $visit->docter_id = $docterId;
            $visit->shift_id = $shift->id;
            $visit->day = $request->day;
            $visit->isCount = $shift->isCount;
            $visit->save();
            $visit->docters()->attach($docterId);
            $visit->shifts()->attach($shiftId);
            return redirect()->back()->with('success', 'نوبت ویزیت شما ثبت شد برای مشاهده ساعت حضور به صفحه مشاهده نوبت مراجعه کنید');
            return back();
        } elseif (count($visits) == 0 && count($visits) < $shift->isCount) {
            $visit->time_start = $shift->time_start;
            $visit->time_end = $visit->setStartTimeVisit($shift->time_start, 1);
            $visit->nowTime =  $visit->time_start;
            $visit->user_id = $user->id;
            $visit->docter_id = $docterId;
            $visit->shift_id = $shift->id;
            $visit->day = $request->day;
            $visit->isCount = $shift->isCount;
            $visit->save();
            $visit->docters()->attach($docterId);
            $visit->shifts()->attach($shiftId);
            return redirect()->back()->with('success', 'نوبت ویزیت شما ثبت شد برای مشاهده ساعت حضور به صفحه مشاهده نوبت مراجعه کنید');
            return back();
        }
    }

    public function deleteVisit($visitId, $shiftId, $docterId)
    {
        try {
            $vists = Visit::find($visitId);
            $vists->shifts()->detach($shiftId);
            $vists->docters()->detach($docterId);
            $vists->delete();
            $vists->save();
            return redirect()->back()->with('success', 'ویزت شما حذف شد  ');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([' ویزیت شما حذف نشد  ']);
            return false;
        }
    }
}
