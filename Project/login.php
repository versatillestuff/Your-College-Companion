<?php
  session_start();
  // error_reporting (E_ALL ^ E_NOTICE); // this can be used for eleminating notices
  $con=mysqli_connect('localhost','root');
  if($con){
    echo"connection successful";
  }
 else{
   echo"not connected";
 }
 $db=mysqli_select_db($con,'project');
 if($db){
   echo" database connection successful";
 }
else{
  echo" database not connected";
}
 $email=$_POST['userid'];
 $pass= $_POST['password'];

 $q= "select * from registration where email = '$email' && password='$pass' ";
  $result=mysqli_query($con,$q);
  $num=mysqli_num_rows($result);
  if($num==1)
  {
    $name="select name from registration where email='$email' and password='$pass'";
    $_SESSION['user']=$name;
    header('location':home.php);
  }
  else
  {
    getElementsByClassName("form-box").innerHTML="Email or password don't match";
    header('location:login.php');
  }
  }
?>
