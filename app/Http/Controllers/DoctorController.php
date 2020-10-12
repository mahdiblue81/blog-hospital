<?php

namespace App\Http\Controllers;

use App\Doc;
use App\Docter;
use App\Jobs\myJob;
use App\Jobs\processMadrak;
use Illuminate\Http\Request;
use App\Repositories\DoctorRepository;
use Illuminate\Support\Facades\Auth;
use App\skill;
use App\madrak;
use App\Shift;
use App\Turn;
use App\User;
use App\Visit;
use Illuminate\Support\Facades\Redirect;

use function Ramsey\Uuid\v1;

class DoctorController extends Controller
{

    private $repository;
    public function __construct(DoctorRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Docter $docter)
    {
        $this->authorize('doctersAuth', $docter);
        $user = Docter::findDocter(Auth::user()->id)->get();
        return view('doctor.index', compact('user'));
    }


    public function compelet()
    {

     
        $madrak = madrak::all();
        $skill = skill::all();
        return view('doctor.compelet', compact('madrak', 'skill'));
    }


    public function listShift(Docter $docter)
    {
        $this->authorize('doctersAuth', $docter);
        $shifts = new Shift();
        $shifts = $shifts->all();
        $docters =  Docter::findDocter(Auth::user()->id)->first();
        return view('doctor.listShift', compact('shifts', 'docters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDoctor(Request $request)
    {
        $doctor = new Docter();
        $doctor->skill = $request->skill;
        $doctor->madrak = $request->madrak;
        $doctor->bio = $request->bio;
        $doctor->age = $request->age;
        $doctor->submit = 1;
        $user = User::find(Auth::user()->id);
        $user->docters()->save($doctor);
        $name = $doctor->id . '.' . $request->file('pic')->getClientOriginalExtension();
        $file = $request->file('pic')->move(public_path('files_upload'), $name);
        $fileUpload = $doctor->path_file = $name;
        // processMadrak::dispatchNow($fileUpload);
        $doctor->save();
        return redirect('home')->with('success', 'پروفایل شما کامل شد ');
    }

    public function madrak($dir)
    {

        return view('doctor.madrak', compact('dir'));
    }

    public function storeShift(Request $request, $shiftId, Docter $docter)
    {
        $this->authorize('doctersAuth', $docter);
        try {
            $shift = Shift::find($shiftId);
            $doctor = Docter::findDocter(Auth::user()->id)->first();
            $shift->docters()->attach($doctor->id);
            return redirect()->back()->with('success', 'شیفت شما انتخاب شد');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['این ساعت کاری باعث تداخل در زمان ساعت های کاری شما میشود']);
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showShift(Docter $docter)
    {
        $this->authorize('doctersAuth', $docter);
        $docters = Docter::findDocter(Auth::user()->id)->get();
        $shifts = new Shift();
        $shifts = $shifts->docters()->findDocter(Auth::user()->id)->get();
        return view('doctor.showShift', compact('docters', 'shifts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Docter $docter)
    {
        $this->authorize('doctersAuth', $docter);
        $madrak = madrak::all();
        $skill = skill::all();
        return view('doctor.edit', compact('madrak', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Docter $docter)
    {
        $this->authorize('doctersAuth', $docter);
        $name = $docter->id . '.' . $request->file('pic')->getClientOriginalExtension();

        $doctor = Docter::where('user_id', $id)->update([
            $request->file('pic')->move(public_path('files_upload'), $name),
            'madrak' => $request->madrak,
            'skill' => $request->skill,
            'age' => $request->age,
            'bio' => $request->bio,
            'path_file' => $name
        ]);
        return  redirect(route('doctor.index'))->with('success', 'اطلاعات ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteShift($id, Docter $docter)
    {
        $this->authorize('doctersAuth', $docter);
        try {
            $shift = Shift::find($id);
            $doctor = Docter::findDocter(Auth::user()->id)->first();
            $shift->docters()->detach($doctor->id);
            return redirect()->back()->with('success', 'شیفت شما حذف شذ شد');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
