<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>List Category</title>
</head>

<body>
    <div class="container">
        <a href="{{ route('category.create') }}" class="btn btn-primary mt-2">Add category</a><br><br>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Srname</td>
                    <td>Email</td>
                    <td>City</td>
                    <td>Mobileno</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorys as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td> <!-- Corrected variable name to lowercase -->
                        <td>{{ $category->srname }}</td>
                        <td>{{ $category->email }}</td>
                        <td>{{ $category->city }}</td>
                        <td>{{ $category->mobileno }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Update</a>
                            <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $categorys->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>

</html>
