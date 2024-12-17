@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Blog</h1>
        <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $blog->name }}" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ $blog->surname }}"
                    required>
            </div>
            <div class="form-group">
                <label for="mno">Mobile Number</label>
                <input type="text" name="mno" id="mno" class="form-control" value="{{ $blog->mno }}"
                    required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="" width="50" class="mt-2">
            </div>
            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection
