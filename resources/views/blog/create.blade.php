@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Blog</h1>
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mno">Mobile Number</label>
                <input type="text" name="mno" id="mno" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
@endsection
