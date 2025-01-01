@extends('layout')
@section('head')
Categories
@endsection

@section('body')
@include('success')
    <h1 class="text-center mb-4" >All category</h1>
    <div class="d-flex justify-content-center mb-4"><a class="btn btn-success" href='{{url("/cats/create")}}'>Add New Category</a></div>
    
    @include('errors')
    <form method="GET" action="{{ url('cats/search') }}" class="d-flex justify-content-center mb-4">
        @csrf
        <div class="form-group me-2">
            <label for="keyword" class="visually-hidden">Search:</label>
            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter keyword..." required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
    <div class="list-group">
        @foreach ($cats as $cat)
            <div class="list-group-item mb-3">
                <h3 class="mb-2">
                    {{ $cat->id }} - 
                    <a href="{{ url('/cats/show/' . $cat->id) }}">{{ $cat->name }}</a>
                </h3>
                <p>{{ $cat->decs }}</p>
                <div class="d-flex gap-2">
                    <a class="btn btn-warning btn-sm" href="{{ url('/cats/edit/' . $cat->id) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ url('/cats/delete/' . $cat->id) }}">Delete</a>
                </div>
                <div class="">
                    <img src="{{ asset('uploads/' . $cat->img) }}" alt="{{ $cat->name }}" class="img-fluid" style="max-width: 100px; max-height: 100px;">

                </div>
            </div>
        @endforeach

        {{$cats->links()}}
    </div>
</div>

 

    
    @endsection
    
