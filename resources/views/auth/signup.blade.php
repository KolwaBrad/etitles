<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="{{ asset('css/signup.css') }}">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    </head>

    <body>
        
        <div class="container">
            <div class="mytitle">
                <h1 class="maintitle">e-Titles</h1>
            </div>    
            <br><br>
            <h1>Sign Up</h1>

            <form action="{{route('actionsignup')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()" />
                        <label for="showPassword">Show Password</label>

<script>
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var showPasswordCheckbox = document.getElementById("showPassword");
 
  if (showPasswordCheckbox.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
</script>
                </div>

                <div class="form-group">
                    <label for="nationalID">National ID</label>
                    <input type="text" class="form-control" id="nationalID" name="nationalID" required>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="rememberMe"> Remember Me
                </div>

                <button type="submit" class="btn btn-primary">Sign Up</button>

            </form>
            <p>Already have an account? <a href="login">Log In</a></p>
        </div>
    </body>
</html>