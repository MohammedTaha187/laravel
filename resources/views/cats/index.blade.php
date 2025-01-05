@extends('layout')

@section('head')
Category
@endsection

@section('body')

<div class="container mt-5">    
    @include('success')
    <h1 class="text-center mb-4">All Cats</h1>

    <div class="d-flex justify-content-center mb-4">
        <a class="btn btn-success" href="{{ url('/cats/create') }}">Add New Cat</a>
    </div>

    @include('errors')

    <form method="GET" action="{{ url('cats/search') }}" class="d-flex justify-content-center mb-4">
        <div class="form-group me-2">
            <label for="keyword" class="visually-hidden">Search:</label>
            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter keyword..." required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="list-group">
        @foreach ($cats as $cat)
            <div class="list-group-item mb-3 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-2">
                        {{ $cat->id }} - 
                        <a href="{{ url('/cats/show/' . $cat->id) }}">{{ $cat->name }}</a>
                    </h3>
                    <div class="d-flex gap-2">
                        <a class="btn btn-warning btn-sm" href="{{ url('/cats/edit/' . $cat->id) }}">Edit</a>
                        <form action="{{ url('/cats/delete/' . $cat->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
                <p class="text-muted">{{ $cat->desc }}</p>
                <div class="text-center my-3">
                    <img src="{{ asset('uploads/' . $cat->img) }}" alt="{{ $cat->name }}" class="img-fluid rounded" style="max-width: 150px; max-height: 150px;">
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $cats->links() }}
    </div>
</div>
@endsection
