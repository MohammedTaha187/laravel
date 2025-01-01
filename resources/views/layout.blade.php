<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('head')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    @yield('styles')
</head>
<body>
    <div class="container">
 @yield('body')
    </div>


<script src="{{asset('js/bootstrap.bundle.min.js')}}" ></script>
@yield('scribts')
</body>
</html>