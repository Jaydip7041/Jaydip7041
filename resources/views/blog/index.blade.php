@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add Blog</a>
        <form action="{{ route('blogs.search') }}" method="POST">
            @csrf
            <input type="text" name="search" placeholder="Search by Name or Surname" class="form-control mb-3">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Mobile No</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->surname }}</td>
                        <td>{{ $blog->mno }}</td>
                        <td>
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Soft Delete Button appears only for non-trashed blogs -->
                            @if (!$blog->trashed())
                                <form action="{{ route('blogs.destroy', $blog) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Soft Delete</button>
                                </form>
                            @endif

                            @if ($blog->trashed())
                                <form action="{{ route('blogs.restore', $blog->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>

                                <form action="{{ route('blogs.forceDelete', $blog->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark btn-sm">Permanently Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
