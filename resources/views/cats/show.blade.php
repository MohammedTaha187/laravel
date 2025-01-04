@extends('layout')

@section('head')
    {{ $cat->name }}
@endsection

@section('body')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Category: {{ $cat->name }}</h1>
        </div>
        <div class="card-body">
            <h3>ID: {{ $cat->id }}</h3>
            <a href="#" class="btn btn-info my-3">{{ $cat->name }}</a>
            <p class="text-muted">{{ $cat->desc }}</p>
            <div class="text-center my-3">
                <img src="{{ asset('uploads/' . $cat->img) }}" alt="{{ $cat->name }}" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
            </div>
            <ul>
                @foreach ($cat->books as $book)
                <i> Book: {{ $book->name }}</i>
                @endforeach
            </ul>
           
        </div>
        <div class="card-footer text-end">
            <a href="/cats" class="btn btn-secondary">Back to Categories</a>
        </div>
    </div>
</div>
@endsection
