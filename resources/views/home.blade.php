@extends('layouts.app')
@section('content')
<style>
#img {
    width: 100%;
    height: 100%;

}
</style>



    <nav role="navigation">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">

                @can('admin-user')
                    <a href="{{ route('admin.createManager') }}">
                        <li>ایجاد مدیر</li>
                    </a>
                    <a href="{{ route('admin.listManager') }}">
                        <li> لیست مدیران</li>
                    </a>
                @endcan

                @can('manager-user')
                <body style="background-image: url(12.jpg);no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
                    <a href="{{ route('manager.listDoctors') }}">
                        <li> لیست کاربران </li>
                    </a>
                    <a href="{{ route('manager.listRequest') }}">
                        <li>  استخدام پزشک </li>
                    </a>
                    <a href="{{ route('manager.listRequestClerk') }}">
                        <li>  استخدام منشی </li>
                    </a>
                    <a href="{{ route('manager.madrak') }}">
                        <li> مدیرت مدرک ها</li>
                    </a>
                    <a href="{{ route('manager.skill') }}">
                        <li> مدیرت تخصص ها</li>
                    </a>
                    <a href="{{ route('manager.MakeShift') }}">
                        <li> مدیرت شیفت کاری </li>
                    </a>
                @endcan
                @can('doctor-user')
                <body class="img" style=" background-image: url(docter.jpg);no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
                    <a href="#">
                        @can('doctorCompelet')
                            <a href="{{ route('doctor.compelet') }}">
                                <li> تکمیل مشخصات</li>
                            </a>
                        @endcan
                        @cannot('doctorCompelet')
                        <a href="{{ route('doctor.index') }}">
                            <li> مشاهده مشخصات</li>
                        </a>
                        @endcannot

                        @cannot('doctorCompelet')
                        <a href="{{ route('doctor.edit') }}">
                            <li> ویرایش مشخصات</li>
                        </a>

                        @endcannot

                        @cannot('doctorCompelet')
                        <a href="{{ route('doctor.listShift') }}">
                            <li> شیفت های کاری</li>
                        </a>
                        @endcannot

                        @cannot('doctorCompelet')
                        <a href="{{ route('doctor.showShift') }}">
                            <li> مشاهده شیفت شما </li>
                        </a>
                        @endcannot
                        </li>
                    </a>
                @endcan

                @can('clerk-user')
                <a href="#">
                    @can('clerk-compelet')
                        <a href="{{ route('clerk.compeletClerk') }}">
                            <li> تکمیل مشخصات</li>
                        </a>
                    @endcan
                    @cannot('clerk-compelet')
                    <a href="{{ route('doctor.index') }}">
                        <li> مشاهده مشخصات</li>
                    </a>
                    @endcannot

                    @cannot('clerk-compelet')
                    <a href="{{ route('doctor.edit') }}">
                        <li> ویرایش مشخصات</li>
                    </a>

                    @endcannot

                    @cannot('clerk-compelet')
                    <a href="{{ route('doctor.listShift') }}">
                        <li> شیفت های کاری</li>
                    </a>
                    @endcannot

                    @cannot('clerk-compelet')
                    <a href="{{ route('doctor.showShift') }}">
                        <li> مشاهده شیفت شما </li>
                    </a>
                    @endcannot
                    </li>
                </a>
            @endcan



            <body style="background-image: url(2.jpg);no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;">
                <a href="{{ route('patient.doctorslist') }}">
                    <li>لیست پزشکان</li>
                </a>
                <a href="{{ route('patient.ListTakeTurn') }}">
                    <li>نوبت گیری</li>
                </a>
                <a href="{{ route('patient.ListVisit') }}">
                    <li> لیست نوبت های شما</li>
                </a>

            </ul>

        </div>
    </nav>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header" >  اخرین فعالیت  {{$timeOn}} </div>

                    @can('doctor-checkFalse')
                        <center style="color: brown">درخواست استخدام شما در حال برسی میباشد</center>
                    @endcan()

                    @can('admin-user')
                        <h2 style="color: black">
                            <center style="font-size: 30"> صفحه ادمین </center>
                        </h2>
                    @endcan

                    @can('manager-user')
                        <h2 style="color: black">
                            <center style="font-size: 30"> صفحه مدیر </center>
                        </h2>
                    @endcan

                    @can('doctor-user')
                        <h2 style="color: black">
                            <center style="font-size: 30"> صفحه پزشک </center>
                        </h2>
                    @endcan
                    @can('clerk-user')
                    <h2 style="color: black">
                        <center style="font-size: 30"> صفحه منشی </center>
                    </h2>
                @endcan
                    @cannot('doctor-user')
                    @cannot('manager-user')
                    @cannot('admin-user')
                    @cannot('clerk-user')
                    <h2 style="color: black">
                        <center style="font-size: 30"> صفحه بیمار </center>
                    </h2>
                    @endcannot
                    @endcannot
                    @endcannot
                    @endcannot
                </div>
            </div>
        </div>

    </div>
    </div>
    @if (\Session::has('success'))

        <ul>
            <li style="color: chartreuse;font-size:20px">{!! \Session::get('success') !!}</li>
        </ul>

    @endif

@endsection


