 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <title>Login</title>
 </head>
 <body>

  
  <div class="container">

    <center><h3 class="text-center text-white bg-dark w-50" style="margin-top: 15%">Login</h3>
            @if (Session::has('error'))
           <div class="alert alert-danger w-50" role="alert">
                {{ Session::get('error') }}
            </div>
        </div></center>
            
        @endif
        <center><form action="{{route('employees.login')}}" class="form-control" method="POST">
        @csrf
    
        <div class="w-50">       
            <input type="email" class="form-control mb-2 border-dark" placeholder="EnterEmail" name="email" id="email" required>
            <input type="password" class="form-control mb-2 border-dark" placeholder="Enter Password " name="password" id="password" required>
           
        </div>

        <div>

          <a href="{{route('employees.register')}}" style="text-decoration: none; margin-left:35%" >Don't Have an Account?</a>

        </div>

        </div>

      <div class="text-center">
        <input type="submit" name="submit" id="" value="Submit" class="btn btn-dark mb-2 border-dark ">
      </div>
      

    </form>
  </center>

    
  </div>

      
    </div>
 </body>
 </html>