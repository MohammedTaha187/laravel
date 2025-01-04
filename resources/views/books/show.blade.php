@extends('layout')

@section('head')
    {{ $book->name }}
@endsection

@section('body')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1> Book Name: {{ $book->name }}</h1>
        </div>
        <div class="card-body">
            <h3>ID: {{ $book->id }}</h3>
           <p>Book Category :  <a href='{{url("cats/show/" . $book->cat->id)}}' class="btn btn-info my-3">{{ $book->name }}</a></p>
           <div class="text-center my-3">
            <img src="{{ asset('uploads/' . $book->img) }}" alt="{{ $book->name }}" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
        </div>
            <p class="text-muted">{{ $book->desc }}</p>
            <p>price :{{$book->price}}</p>
            
        </div>
        <div class="card-footer text-end"> 
            <a href="/books" class="btn btn-secondary">Back to Categories</a>
        </div>
    </div>
</div>
@endsection
