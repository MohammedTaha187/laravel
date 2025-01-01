@extends('layout')

@section('head')
    <title>Edit Category</title>
@endsection

@section('body')
    <div class="container mt-4">
        @include('errors')

        <h2>Edit Category</h2>

        <form method="POST" action="{{ url("/cats/update/$cat->id") }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $cat->name }}" required>
            </div>

            <div class="mb-3">
                <label for="decs" class="form-label">decsription</label>
                <textarea name="decs" id="decs" class="form-control" rows="5" required>{{ $cat->decs }}</textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
