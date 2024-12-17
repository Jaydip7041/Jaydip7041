<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Customers</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/customer">Customers</a>
                </li>

            </ul>
        </div>

    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('customers.store') }}" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" id="" class="form-control"
                            placeholder="Description">
                    </div>
                    <button class="btn btn-primary mt-2">submit</button>
                </form>

            </div>
        </div>

    </div>
</body>

</html>
