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
            height: 110px;
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


        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        body {
            background: linear-gradient(#141e30, #243b55);
            font-family: 'Roboto', sans-serif;
        }

        section {
            margin: 50px;
        }


        /* follow me template */
        .made-with-love {
            margin-top: 40px;
            padding: 10px;
            clear: left;
            text-align: center;
            font-size: 10px;
            font-family: arial;
            color: #fff;
        }

        .made-with-love i {
            font-style: normal;
            color: #F50057;
            font-size: 14px;
            position: relative;
            top: 2px;
        }

        .made-with-love a {
            color: #fff;
            text-decoration: none;
        }

        .made-with-love a:hover {
            text-decoration: underline;
        }


        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
        a:link {
    font-family: Tahoma, Geneva, sans-serif;
    font-size:17px;
    color: #06C;
    text-decoration: none;
}

a:visited {
    color: rgb(224, 224, 224);
}

a:hover {
    color: #008CC7;
}

a:active {
    background-color: #999;
}
    </style>
</head>

<body>

    <section>
        <!--for demo wrap-->
        <h1>مشخصات</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>مدرک</th>
                        <th>تخصص</th>
                        <th>سن</th>
                        <th>توضیحات</th>
                        <th>مشاهده مدرک</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr>
                        @foreach ($user as $item)
                            <td>{{ $item->madrak }}</td>
                            <td>{{ $item->skill }}</td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->bio }}</td>
                            <td><a style="size: 25px" href="madrak/{{$item->path_file}}">مشاهده مدرک</a></td>
                        @endforeach

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
    @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li style="color: chartreuse;font-size:20px">{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif


</body>

</html>
