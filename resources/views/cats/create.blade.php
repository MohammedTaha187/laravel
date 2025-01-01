@extends('layout')

@section('head')
    <title>Create Category</title>
@endsection

@section('body')
@include('success')

    <div class="container mt-4">
        @include('errors')

        <h2>Create Category</h2>

        <form method="POST" action="{{ url('/cats/store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="decs" class="form-label">decs</label>
                <input type="text" name="decs" id="decs" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection
