{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>update Product</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputFirstName">FirstName</label>
                <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter FirstName"
                    name="FirstName" value="{{ $product->FirstName }}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputLastName">LastName</label>
                <input type="text" class="form-control" id="exampleInputLastName" placeholder="Enter LastName"
                    name="LastName" value="{{ $product->LastName }}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" value="{{ $product->Email }}" name="Email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputMobileNo">MobileNo</label>
                <input type="text" class="form-control" id="exampleInputMobileNo" placeholder="Enter MobileNo"
                    name="MobileNo" value="{{ $product->MobileNo }}" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Gender</label>
                <select class="form-control" name="Gender" id="exampleFormControlSelect1">
                    <option value="Male" {{ $product->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $product->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html> --}}
