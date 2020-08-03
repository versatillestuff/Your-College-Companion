<?php
  session_start();
?>
<html>
  <head>
      <title>   Login n Registration </title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="back">
      <div class="navbar-brand"><h2 id="line">COLLAGE NOTES COLLECTOR</h2><br>
                  <h3 id="tag">From Someone as You</h3>
      </div>
      <div class="form-box">
        <div class="button-box">
          <div id="btn"></div>
          <button type="button" class="toggle-btn" onclick="login()">Log In</button>
          <button type="button" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <div class="social">
          <img src="google.png">
          <img src="fb.png">
          <img src="linkedin.png">
        </div>

         <form id="login" class="input-group" action="loginpage.php" method="post">
           <input type="text" class="input-field" placeholder="email" name="userid" required>
           <input type="text" class="input-field" placeholder="password" name="password" required>
           <input type="checkbox" class="check-box"> <span>Remember Password</span>
           <button type="submit" class="submit-btn">Log In</button>

           <p id="error1" style='font-size:20px; font-family: times New Roman; color:#FF0000;'></p>
           <p id="error2" style='font-size:20px; font-family: times New Roman; color:#FF0000;'></p>

         </form>
         <div >
         <?php
            if(isset($_SESSION["error"]))
            {
                $error = $_SESSION["error"];
                echo "<script>document.getElementById('error1').innerHTML='*invalid credentials'</script>";
              }
        ?>
        </div>
         <form  id="register" class="input-group" action="registrationpage.php" method="post">
           <input type="text" class="input-field" placeholder="Name" name="name" required>
           <input type="text" class="input-field" placeholder="collage" name="collage" required>
           <input type="email" class="input-field" placeholder="Email" name="email" required>
           <input type="password" class="input-field" placeholder="password" name="pass" required>
           <input type="checkbox" class="check-box" required> <span>I agree to terms and conditions</span>
           <button type="submit" class="submit-btn">Register </button>
           <br>
         </form>
          <div></div>
         <?php
            if(isset($_SESSION['exits']))
            {
                $error = $_SESSION['exits'];
                echo "<script>document.getElementById('error2').innerHTML='*email alredy exits'</script>";
            }
            ?>
        </div>

    </div>

    <script>
      var x=document.getElementById("login");
      var y=document.getElementById("register");
      var z=document.getElementById("btn");
      //var a=document.getElementById("register");
      function register()
      {
        x.style.left="-400px";
        y.style.left="50px";
        z.style.left="110px";
      }

      function login ()
      {
        x.style.left="50px";
        y.style.left="450px";
        z.style.left="0px";
      }
    </script>
  </body>
</html>
<?php
    unset($_SESSION["error"]);
    unset($_SESSION["exits"]);
?>
