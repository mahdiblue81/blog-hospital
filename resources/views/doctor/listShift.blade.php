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
            background: linear-gradient(110deg, rgb(11, 11, 58) 50%, rgb(9, 9, 48) 50%);
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

    </style>
</head>

<body>

    <section>
        <!--for demo wrap-->
        <h1>انتخاب شیفت</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>

                    <tr>
                        <th>سال</th>
                        <th>ماه</th>
                        <th> ساعت شروع</th>
                        <th>ساعت پایان</th>
                        <th></th>
                    </tr>

                </thead>
            </table>

        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                            @foreach ($shifts as $item)
                            <tr>
                                <td>{{ $item->yers }}</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ $item->time_start }}</td>
                                <td>{{ $item->time_end }}</td>
                                <td>
                                    <form action="/doctor/{{ $item->id }}/storeShift" method="POST">
                                    {{ csrf_field()}}
                                    <input type="submit" value="ثبت">
                                </form>
                                </td>

                            </tr>
                    @endforeach

                    </tr>

                    <tr>
                        <td>
                            <a href="{{ route('home') }}"> <input type="button" value="برگشت">
                        </td>
                    </tr>
                </tbody>

            </table>
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
        </div>
    </section>



</body>

</html>
