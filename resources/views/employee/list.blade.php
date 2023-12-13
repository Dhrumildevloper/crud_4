<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

        {{-- Navbar Start--}}

        @include('employee.navbar');

        {{-- Navbar End --}}

      <div class="container">
        <h1 class="bg-dark text-light text-center py-1">Employee's List</h1>

        @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>

        @endif

        <table class="table table-warning table-striped text-center">

              <tr class="table-secondary">
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
                <th>Created At</th>
              </tr>

              @if ($employees->isNotEmpty())

              @foreach ($employees as $employee)
              <tr valign="middle">
                <th scope="row">{{ $employee->id }}</th>
                <td>
                  @if ($employee->image != '' && file_exists('uploads/employee/'. $employee->image))

                  <img src="{{ url('uploads/employee/'. $employee->image) }}" alt="" width="50" height="50" class="rounded-circle">
                  @else
                    <h6>Image not Upload</h6>
                  @endif
                </td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->address }}</td>
                <td>
                    <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="#" onclick="deleteEmployee({{ $employee->id }})" class="btn btn-danger btn-sm">Delete</a>

                    <form id="employee-edit-action-{{ $employee->id}}" action="{{route('employees.destroy',$employee->id)}}" method="POST">
                      @csrf
                      @method('delete')

                    </form>
                </td>
                <td>
                  {{ $employee->created_at}}
                </td>
              </tr>
              @endforeach

              @else

              <tr>
                <td colspan="8">Record Not Found</td>
              </tr>

              @endif

          </table>

          <div class="mt-2">
            {{ $employees->links() }}
          </div>

      </div>

</body>
</html>

<script>
  function deleteEmployee(id){
    if(confirm("Are You Sure Delete This Data?")){
      document.getElementById('employee-edit-action-'+id).submit();
    }
  }
</script>
