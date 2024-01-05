<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Your Hotel</title>
      <link rel="stylesheet" href="css/login.css">
   </head>
   <body>
   @if($message = Session::get('succes'))
      <div class="alert alert-success alert-block col-lg-8" role="alert">
         <button type="button" class="close" data-dismiss="alert">x</button>
         {{ $message }}
      </div>
   @endif
        <div class="wrapper">
            <div class="title">
               Login Form
            </div>
            
            <form action="/Logins" method="post">
               @csrf
                <div class="field">
                <input type="text" required name="email" id="email" value="{{old('email')}}">
                <label>Email Address</label>
                </div>
                <div class="field">
                <input type="password" id="password" name="password">
                <label>Password</label>
                </div>
                <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link">
                    <a href="#">Forgot password?</a>
                </div>
                </div>
                <div class="field">
                <input type="submit" value="Login">
                </div>
                <div class="signup-link">
                Not a member? <a href="/Registers">Signup now</a>
                </div>
            </form>
         </div>
   </body>
</html>