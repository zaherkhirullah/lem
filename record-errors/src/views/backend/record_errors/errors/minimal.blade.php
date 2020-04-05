<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .code {
            border-right: 2px solid;
            font-size: 26px;
            padding: 0 15px 0 15px;
            text-align: center;
        }

        .message {
            font-size: 20px;
            text-align: center;
        }

        .border {
            border: 1px solid #ddd;
            border-radius: 50px;
            box-shadow: 1px 10px 20px -20px rgba(150, 160, 170, 0.5);
        }

        .border > .message {
            padding: 0 25px;
        }
        .home{
            position: absolute;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="flex-center border">
        <div class="code">
            @yield('code')
            <?php $code = app()->view->getSections()['code']; ?>
        </div>

        <div class="message" style="padding: 10px;">
            @yield('message')
        </div>
    </div>
    <div class="home">
        <a href="{{url('/')}}">{{__('backend.return_to_home')}}</a>
    </div>
</div>
<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: '{{ url("ajax/error-record/$code") }}',
            type: 'POST',
            cache: false,
            data: {
                _token: "{{ csrf_token() }}",
                link: "{{ url()->current() }}",
                previous: "{{ url()->previous() }}",
            }
        });
    });
</script>
</body>
</html>
