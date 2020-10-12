<html>

<head>
    <style>
        .alert {
            padding: 25px;
            font-size: 20px;
            background-color: #0508a0;
            color: white;
            direction: rtl;
        }

        .error {
            padding: 25px;
            font-size: 20px;
            background-color: #a0051a;
            color: white;
            direction: rtl;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

    </style>
    <title>
        صفحه انتظار
    </title>
</head>

<body style="background-color: black">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <center style="color: brown;font-size:15px; margin-top:60px "></center>
                    @isset($alert)
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">
                        </span>
                            {{ $alert }}

                    </div> @endisset
                    @isset($error)
                    <div class="error">


                            {{ $error }}

                    </div> @endisset
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="خروج"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
