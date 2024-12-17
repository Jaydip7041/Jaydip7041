@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Blog</h1>

        <!-- Display errors if there are any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to edit the blog -->
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $blog->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" class="form-control"
                    value="{{ old('surname', $blog->surname) }}" required>
            </div>

            <div class="form-group">
                <label for="mno">Mobile Number</label>
                <input type="text" name="mno" id="mno" class="form-control"
                    value="{{ old('mno', $blog->mno) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($blog->image)
                    <p>Current image: <img src="{{ asset('storage/' . $blog->image) }}" width="100" alt="Blog Image"></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
@endsection
