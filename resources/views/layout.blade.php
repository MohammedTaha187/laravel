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
      <ul class="nav justify-content-end">
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{url('/logout')}}">logout</a>
        </li>
        @endauth
      </ul>
 @yield('body')

    </div>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}" ></script>
@yield('scribts')
</body>
</html>