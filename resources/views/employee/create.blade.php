<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
</head>

<body>
    {{-- Navbar Start --}}

    @include('employee.navbar');

    {{-- Navbar End --}}

    <div class="container">
        <h1 class="bg-dark text-light text-center py-1 mb-5">Insert Employee's Data</h1>

        <form action="{{ route('employees.store') }}" method="post" class="form" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <input type="text" name="name" id="" placeholder="Enter Full Name"
                        class="form-control mb-3 border-dark @error('name')is -invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="ivalid-feedback text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-6">
                    <input type="email" name="email" id="" placeholder="Enter Full Email"
                        class="form-control mb-3 border-dark @error('email')is -invalid @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="ivalid-feedback text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    <input type="text" name="address" id="" placeholder="Enter Full Address"
                        class="form-control mb-3 border-dark @error('address')is -invalid @enderror"
                        value="{{ old('address') }}">
                    @error('address')
                        <p class="ivalid-feedback text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-6">
                    <input type="text" name="designation" id="" placeholder="Enter designation"
                        class="form-control mb-3 border-dark @error('designation')is -invalid @enderror"
                        value="{{ old('designation') }}">
                    @error('designation')
                        <p class="ivalid-feedback text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    <input type="text" name="department_id" id="" placeholder="Enter department_id"
                        class="form-control mb-3 border-dark @error('department_id')is -invalid @enderror"
                        value="{{ old('department_id') }}">
                    @error('department_id')
                        <p class="ivalid-feedback text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-6">
                    <input type="file" name="image" id="image"
                        class="mb-3 @error('image')is -invalid @enderror">
                    @error('image')
                        <p class="ivalid-feedback text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="text-center"><input type="submit" name="submit" id="" value="Submit"
                class="btn btn-dark"></div>

        </form>
    </div>


</body>

</html>
