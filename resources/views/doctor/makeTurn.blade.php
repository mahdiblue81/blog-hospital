<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>نوبت ها</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js"></script>
    </script>
    <!-- Styles -->
    <style>
        html,
        body {}

        .full-height {
            height: 100vh;
        }



        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }


        .title {
            font-size: 40px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            background: linear-gradient(45deg, #49a09d, red);
            font-family: sans-serif;
            font-weight: 100;
        }

        .container {
            position: absolute;
            top: 30%;
            left: 70%;
            transform: translate(-50%, -50%);
        }




        table {
            margin-top: -160px;
            width: 800px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        th {
            text-align: left;
        }

        thead {
            th {
                background-color: #55608f;
            }
        }

        tbody {
            tr {
                &:hover {
                    background-color: rgba(255, 255, 255, 0.3);
                }
            }

            td {
                position: relative;

                &:hover {
                    &:before {
                        content: "";
                        position: absolute;
                        left: 0;
                        right: 0;
                        top: -9999px;
                        bottom: -9999px;
                        background-color: rgba(255, 255, 255, 0.2);
                        z-index: -1;
                    }
                }
            }
        }




        html {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#141e30, #243b55);
        }

        .login-box {
             margin-top: 115px;
            position: absolute;
            top: 30%;
            left: 15%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .login-box form a {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px
        }

        .login-box a:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
        }

        .login-box a span {
            position: absolute;
            display: block;
        }

        .login-box a span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #03e9f4);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        .login-box a span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #03e9f4);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,
            100% {
                top: 100%;
            }
        }

        .login-box a span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #03e9f4);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,
            100% {
                right: 100%;
            }
        }

        .login-box a span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #03e9f4);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,
            100% {
                bottom: 100%;
            }
        }

    </style>
</head>

<body>
    <div class="login-box">

        <form action="/doctor/storeTurn" method="POST">
            {{ csrf_field() }}

            <div class="user-box">
              <p style="color: white">تاریخ</p> <input id="Date1" type="date" placeholder="تاریخ" name="date"><br>
            </div>
            <div class="user-box">
                <p style="color: white">ساعت شروع</p><input type="time" placeholder="ساعت" name="time_start"><br>
            </div>
            <div class="user-box">
                <p style="color: white">ساعت پایان</p> <input type="time" placeholder="ساعت" name="time_end"><br>
            </div>
            <div class="user-box">
                {{-- @foreach ($user as $item)
                    <select name="skill">
                        <option>
                        <td value="{{ $item->docters->id }}">{{ $item->docters->skill }}</td>
                        <td name="id" value={{ $item->docters->id }}></td>
                    </option>

                    </select><br>
                        <td name="id" value="{{ $item->docters->id }}"></td>
                @endforeach --}}
            </div>
            <a href="#">
                <input type="submit" value="ثبت">
            </a>
            <a href="{{ route('home') }}"> <input type="button" value="برگشت">



    </div>

    </div>

    </form>
    <div class="container">

        <table class="table table-hover">
            <thead>

                <tr>
                    <th>نام</th>
                    <th>تخصص</th>
                    <th>مدرک</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tbody>
                <tr>
                    @foreach ($user as $item)
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->docters->skill }}</td>
                        <td>{{ $item->docters->madrak }}</td>
                    @endforeach
                </tr>
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li style="color: chartreuse;font-size:20px">{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @if($errors->any())
                <ul>
                    <li style="color:brown;font-size:20px"><h4>{{$errors->first()}}</h4></li>
                </ul>
                @endif
            </tbody>
        </table>

    </div>
    </form>

</body>

</html>
