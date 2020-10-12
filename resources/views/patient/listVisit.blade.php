<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>لیست نوبت ها</title>

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
            margin-bottom: 12px;

        }

        table {
            width: 100%;
            table-layout: fixed;

        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-content {
            height: 350px;
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

    </style>
</head>

<body>

    <section>
        <!--for demo wrap-->
        <h1>وقت های ملاقات </h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="" border="0">
                <thead>
                    <tr>
                        <th>متخصص</th>
                        <th> سال</th>
                        <th>ماه</th>
                        <th>روز</th>
                        <th>ساعت شروع</th>
                        <th>ساعت پایان</th>
                        <th> </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">


                @foreach ($visit as $item)
                    <tbody>
                        <tr>
                            @foreach ($item->docters as $docter)

                                <td>{{ $docter->skill }}</td>

                                @foreach ($item->shifts as $shift)

                                    <td>{{ $shift->yers }}</td>
                                    <td>{{ $shift->month }}</td>

                                    <td>{{ $item->day }}</td>
                                    <td>{{ $item->time_start }}</td>
                                    <td>{{ $item->time_end }}</td>
                                    <form
                                        action="/patient/{{ $item->id }}/{{ $shift->id }}/{{ $docter->id }}/deleteVisit"
                                        method="POST">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <td> {{ $item->title }} <input style="margin-left: 60px" class="btn btn-danger"
                                                type="submit" value="حذف"></td>
                                    </form>

                        </tr>
                    </tbody>
                @endforeach
                @endforeach
                @endforeach


            </table>
        </div>
        <tr>
            <td>
                <a href="{{ route('home') }}"> <input type="button" value="برگشت">
            </td>
        </tr>
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
