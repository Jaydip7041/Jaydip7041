<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>List of Data</title>
</head>

<body>
    <div class="container py-5">
        <div class="d-flex mb-4">
            <a href="{{ route('create') }}" class="btn btn-primary ml-auto">Add Product</a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Email</th>
                    <th scope="col">MobileNo</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($products as $product) --}}
                <tr>
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    {{-- <td>{{ $product->FirstName }}</td>
                        <td>{{ $product->LastName }}</td>
                        <td>{{ $product->Email }}</td>
                        <td>{{ $product->MobileNo }}</td>
                        <td>{{ $product->Gender }}</td> --}}
                    <td>
                        {{-- <a href="{{ route('edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('delete', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form> --}}
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</body>

</html>
