<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <title>Register</title>
</head>
<body>



    <div class="container">

        <center> <h3 class="text-center text-white bg-dark w-50 pb-10" style="margin-top: 15%">Register Form</h3>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert" style="width: 50%">
                    {{ Session::get('success') }}
                </div>
                
            @endif
       <form action="{{route('employees.register')}}" class="form-control" method="POST" >
            @csrf
        
            <div class="w-50 h-auto">       
                <input type="text" class="form-control mb-2 border-dark" placeholder="Enter User Name" name="user_name" id="user_name" required>
                <input type="password" class="form-control mb-2 border-dark" placeholder="Enter Password " name="password" id="password" required>
                <input type="text" class="form-control mb-2 border-dark" placeholder="Enter Email " name="email" id="email" required>
            </div>

          <div class="text-center">
            <input type="submit" name="submit" id="" value="Submit" class="btn btn-dark mb-2 border-dark ">
          </div>
          
  
        </form></center>

        <hr>

        <div class="text-center"><a href="{{route('employees.login')}}" style="text-decoration: none" > Click Here For Login</a></div>
        
        
  
        
      </div>
    
</body>
</html>