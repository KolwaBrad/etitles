<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>

    <body>
        
        <div class="container">
            <div class="mytitle">
                <h1 class="maintitle">e-Titles</h1>
            </div>    
            <br><br> <br><br><br>
            <h1>Log in</h1>

            <form action="{{route('actionlogin')}}" method="post">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf

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
                    <input type="checkbox" name="remember_me" id="remember_me">
                    <label for="remember_me">Remember me</label>
                </div>
                </script>
                <button type="submit" class="btn btn-primary">Log in</button>
                

            </form>
            


            <p>Don't have an account? <a href="signup">Sign Up</a></p>
            <p>Forgot your password? <a href="forgotpassword">Tap Here</a></p>
        </div>
    </body>
</html>