
<!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>Reset Password Form</title> 

  <link rel="stylesheet" href="{{ asset('assets/css/login-form.css') }}"> 

 </head> 
 <body> <!-- partial:index.partial.html --> 

  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 

   <div class="signin"> 

    <div class="content"> 

     <h3 style="color:#2196F3;">Reset Password</h3> 

    <form action="{{ route('makeNewPass') }}" method="get"><!-- gui du lieu ban than no -->
    @csrf
     <div class="form"> 
      
     <div class="inputBox"> 

    <input name="email" type="hidden" value="{{ $email }}" required> <i></i> 

    </div> 
      <div class="inputBox"> 

       <input name="password" type="password" required> <i>New Password</i> 

      </div> 
      <div>
              <input type="checkbox" id="showPassword" onclick="togglePassword()"> 
              <label for="showPassword">Show Password</label>
            </div>

      <div class="inputBox"> 

        <input name="confirm" type="text" required> <i>Confirm Password</i> 

        </div> 
        <div>
              <input type="checkbox" id="showPassword" onclick="togglePassword()"> 
              <label for="showPassword">Show Password</label>
            </div>

      <div class="links"> <p style="color:white;">Have Account ?</p> <a href="{{ route('signin.form') }}">Sign In</a> 

      </div> 

      <div class="inputBox"> 

       <input type="submit" value="Submit"> 

      </div> 

     </div> 

    </div> 
    </form>

   </div> 

  </section> <!-- partial --> 
  <script>
    function togglePassword() {
      var passwordField = document.getElementById("password");
      var showPasswordCheckbox = document.getElementById("showPassword");
      if (showPasswordCheckbox.checked) {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    }
  </script>

 </body>

</html>