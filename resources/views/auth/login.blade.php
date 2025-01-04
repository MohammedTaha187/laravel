@extends('layout')

@section('head')
    <title>Login</title>
@endsection

@section('body')
    <div class="container">
        @include('errors')
       
        <h2 class="text-center my-4">Login</h2>

        <form method="POST" action="{{ url('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <p>Don't have an account? <a href="{{ url('register') }}">Register</a></p>
        </div>
    </div>
@endsection
