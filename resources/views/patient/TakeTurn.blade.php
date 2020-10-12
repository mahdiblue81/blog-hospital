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
            height:250px;
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
    <h1>{{$user->name}} لیست نوبت های دکتر </h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th> متخصص</th>
                        <th> سال</th>
                        <th>ماه  </th>
                        <th> روز </th>
                        <th> از ساعت </th>
                        <th> تا ساعت </th>
                        <th> </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach ($docters as $item)

                        @if (isset($item->shifts))
                        <tr>

                        @foreach ($item->shifts as $shifts)
                        <td>{{$item->skill}}</td>
                        <td>{{$shifts->yers}}</td>
                        <td>{{$shifts->month}}</td>
                        <td>
                        <form action="../{{$shifts->id}}/{{$item->id}}/TakeVisit" method="POST">
                            <select name="day">
                                @if ($shifts->month<=6)
                                @for ( $i=1 ;$i<=31; $i++)
                                <option>

                                    {{$i}}

                                 </option>
                                @endfor
                                @endif

                                @if ($shifts->month>6&& $shifts->month<12)
                                @for ( $i=1 ;$i<=30; $i++)
                                <option>

                                    {{$i}}

                                 </option>
                                @endfor
                                @endif

                                @if ( $shifts->month==12)
                                @for ( $i=1 ;$i<=29; $i++)
                                <option>

                                    {{$i}}

                                 </option>
                                @endfor
                                @endif



                            </select>
                        </td>

                            {{ csrf_field() }}
                        <td>{{$shifts->time_start}}</td>
                        <td>{{$shifts->time_end}}</td>
                        <td><input type="submit" value=" ارسال "></td>
                    </form>
                    </tr>

                        @endforeach
                        @else


                        @endif

                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        <tr>
            <td>
                <a href="{{ route('patient.ListTakeTurn') }}"> <input type="button" value="برگشت">
            </td>
        </tr>
    </section>

    @if (\Session::has('success'))
    <script>
        alert('با موفقیت اعمال شد');

    </script>
    <div class="alert alert-success">
        <ul>
            <li style="color: chartreuse;font-size:20px">{!! \Session::get('success') !!}</li>
        </ul>
    </div>

@endif
@if ($errors->any())
    <script>
        alert('خطا در ثبت');

    </script>
    <ul>
        <li style="color:red;font-size:20px">
            <h4>{{ $errors->first() }}</h4>
        </li>
    </ul>

@endif


</body>

</html>
