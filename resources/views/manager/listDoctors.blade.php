<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->

    <style>
        .nav {
            position: relative;
            display: flex;
            list-style: none;
            padding: 10px 20px;

            a {
                position: relative;
                padding: 0.6em 2em;
                font-size: 20px;
                border: none;
                outline: none;
                color: #fff;
                display: inline-block;
                text-decoration: none;
                text-shadow: 1px 1px 0 #888;
                z-index: 3;
            }

            .slide1,
            .slide2 {
                position: absolute;
                display: inline-block;
                height: 0.4em;
                box-shadow: 1px 1px 0 #666;
                transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1.05);
                transform: skew(-20deg);
                bottom: 0px;
                height: 100%;
            }

            .slide1 {
                background-color: #eeeeee30;
                z-index: 2;
            }

            .slide2 {
                opacity: 0;
                background-color: transparent;
                border: 1px solid #eeeeee70;
                z-index: 1;
            }
        }

        // *************** Presentation ******************** //
        @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,800&display=swap");

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,


        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e0e0e0;
            font-family: poppins;
            line-height: 1.5;
            background: linear-gradient(110deg, #333 50%, #444 50%);
        }

        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-content {
            height: 100%;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 20px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 15px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: right;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        a:link {
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 17px;
            color: #06C;
            text-decoration: none;
        }

        /* حالت لینک دیده شده */
        a:visited {
            color: rgb(255, 255, 255);
        }

        /* حالت لینک فعال */
        a:hover {
            color: #008CC7;
        }

        /* حالت لینک در لحظه ای که روی آن کلیک می کنیم */
        a:active {
            background-color: #999;
        }

    </style>
</head>

<body>
    <section>
        <th>
            <ul>
                <li><a class="active" href="?active=1">پزشکان</a></li>
                <li><a href="?active=0">بیماران</a></li>
                <li><a href="?active=2">مدیران</a></li>
                <li><a href="{{ route('manager.listDoctors') }}">همه کاربران</li>
            </ul>
        </th>
        <!--for demo wrap-->
        <h1>مشخصات</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>

                    <tr>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>شماره تلفن</th>
                        <th>تخصص</th>
                        <th>مدرک</th>

                    </tr>
                </thead>
                @foreach ($users as $item)

            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        @if (isset($item->docters['id']))
                            <td> {{ $item->docters['skill'] }}</a>
                            <td>

                                <a href="madrakDocter/{{ $item->docters['path_file'] }}">{{ $item->docters['madrak'] }}</td>

                            </td>
                        @else
                            <td>__</td>
                            <td>__</td>
                        @endif
                        @endforeach

                        {{-- @foreach ($docters->users as $item)
                            <td>{{ $item->skill }}</td>
                        @endforeach --}}
                    </tr>

                    <tr>
                        <td>
                            <a href="{{ route('home') }}"> <input type="button" value="برگشت">
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </section>



</body>

</html>
