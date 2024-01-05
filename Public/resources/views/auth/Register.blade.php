
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="css/login.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Register Form
         </div>
            <form  action="/Registers" method="post">
              @csrf
                <div class="field">
                    <input type="text"  name="name" id="name">
                    <label >Full Name</label>
                </div>
                <div class="field">
                    <input type="text"  name="email">
                    <label>Email Address</label>
                </div>
                <div class="field">
                    <input type="text"  name="password">
                    <label>Password</label>
                </div>
                <!-- <div class="field">
                    <input type="number"  name="Phone_Number">
                    <label>Phone Number</label>
                </div> -->
                <div class="field">
                <input type="submit" value="Register">
                </div>
                <div class="signup-link">
                Already have account? <a href="/Logins">Log in now</a>
                </div>
            </form>
        </div>
   </body>

