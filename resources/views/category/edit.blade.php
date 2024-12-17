<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Data Update</title>
    <style>
        /* Add custom arrow */
        .custom-dropdown select {
            appearance: none;
            /* Removes default arrow */
            -webkit-appearance: none;
            /* For Safari */
            -moz-appearance: none;
            /* For Firefox */
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20"%3E%3Cpath fill="black" d="M10 12l5-5H5z"/%3E%3C/svg%3E');
            /* Dropdown arrow */
            background-repeat: no-repeat;
            background-position: right 10px center;
            /* Position the arrow */
            background-size: 20px 20px;
            /* Size of the arrow */
            padding-right: 30px;
            /* Space for the arrow */
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This simulates the PUT request -->

            <!-- Form Fields -->
            <div class="form-group py-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $category->Name }}"
                    required>
            </div>

            <div class="form-group py-2">
                <label for="srname" class="form-label">Surname</label>
                <input type="text" id="srname" class="form-control" name="srname" value="{{ $category->srname }}"
                    required>
            </div>

            <div class="form-group py-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ $category->email }}"
                    required>
            </div>

            <div class="form-group py-2">
                <label for="city" class="form-label">Select City</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="" disabled>Select a City</option>
                    <option value="ahmedabad" {{ $category->city == 'ahmedabad' ? 'selected' : '' }}>Ahmedabad</option>
                    <option value="baroda" {{ $category->city == 'baroda' ? 'selected' : '' }}>Baroda</option>
                    <option value="botad" {{ $category->city == 'botad' ? 'selected' : '' }}>Botad</option>
                </select>
            </div>

            <div class="form-group py-2">
                <label for="mobileno" class="form-label">Mobile Number</label>
                <input type="tel" id="mobileno" class="form-control" name="mobileno"
                    value="{{ $category->mobileno }}" required pattern="[0-9]{10}" maxlength="10">
            </div>

            <div class="form-group py-3">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>


    </div>
</body>

</html>
