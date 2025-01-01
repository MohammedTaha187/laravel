@extends('layout')

@section('head')
     {{ $keyword }}
@endsection

@section('body')
    <div class="container mt-4">
        <h1>{{ $keyword }} Categories</h1>

        <a href="{{ url('/cats/') }}" class="btn btn-success mb-3">Add Category</a>

        @include('errors')

        <form method="GET" action="{{ url('cats/search') }}" class="form-inline mb-4">
            @csrf
            <div class="form-group">
                <label for="keyword" class="sr-only">Search:</label>
                <input type="text" value="{{ old('keyword') }}" name="keyword" id="keyword" class="form-control" placeholder="Enter keyword..." required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        @foreach ($cats as $cat)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $cat->id }} - <a href="{{ url('/cats/show/' . $cat->id) }}" class="text-decoration-none">{{ $cat->name }}</a>
                    </h5>
                    <p class="card-text">{{ $cat->desc }}</p>
                    <a href="{{ url('/cats/edit/' . $cat->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
