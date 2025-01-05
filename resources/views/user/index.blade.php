@extends('layout')

@section('head')
users
@endsection

@section('body')

<div class="container mt-5">    
    @include('success')
    <h1 class="text-center mb-4">All users</h1>


    <div class="list-group">
        @foreach ($users as $user)
            <div class="list-group-item mb-3 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-2">
                        {{ $user->id }} - {{ $user->name }}</a>
                    </h3>
                </div>
                <p class="text-muted">{{ $user->role }}</p>
               
            </div>
        @endforeach
    </div>
@endsection
