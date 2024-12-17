@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Trashed Blogs</h2>
        <a href="{{ route('blogs.index') }}" class="btn btn-primary mb-3">Back to All Blogs</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Mobile No</th>
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
                            <form action="{{ route('blogs.restore', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>
                            <form action="{{ route('blogs.forceDelete', $blog->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Permanently Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
