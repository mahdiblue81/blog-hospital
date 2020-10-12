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
            background: linear-gradient(45deg, #49a09d, #5f2c82);
            font-family: sans-serif;
            font-weight: 100;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        table {
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

    </style>
</head>

<body>

    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>

                <tr>
                    <th> نام</th>
                    <th>کد ملی</th>
                    <th>شماره تلفن</th>
                    <th>ایمیل</th>
                    <th>قبول کردن</th>
                    <th> رد کردن</th>
                </tr>

                @foreach ($user as $item)
                    <form action="/manager/{{ $item->id }}/clerkAccept" method="POST">
                        {{ csrf_field() }}

            </thead>
            <tbody>
                    <tr>
                    <td> {{ $item->name }}</td>
                    <td> {{ $item->codMeli }}</td>
                    <td> {{ $item->phone }}</td>
                    <td> {{ $item->email }}</td>
                    @if (isset($item->name))

                        <td>
                            <input type="submit" name="subOk" value="قبول کردن">
                        </td>
                        <td>
                            <a href="/manager/{{ $item->id }}/clerkReject"> <input type="button" class=""
                                    name="subNo" value="رد کردن"></a>
                        </td>

                    @else
                        <center style="color:white;font-size:50px;margin-top:50px"> رکوردی برای نمایش وجود ندارد
                        </center>
                    @endif
                    @endforeach
                </tr>
            </tbody>

        </table>

    </div>

    </form>
    <tr>

    </tr>
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

    alert(' درخواست رد  انجام شد');
</script>
<ul>
    <li style="color:red;font-size:20px">
        <h4>{{ $errors->first() }}</h4>
    </li>
</ul>

@endif
</body>

</html>
