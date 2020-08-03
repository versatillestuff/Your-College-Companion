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
    $row=$result->fetch_assoc();   //for fetching indiviual data and this row variable can be given in a loop to fetch other data
    $_SESSION['user']=$row["name"];
    $_SESSION['uid']=$row["id"];
    header('location: home.php');
  }
  else
  {
    /*echo "<script>
    document.getElementById("p1").innerHTML="Email or password does not match";
    </script>";*/
    $err="invalid credentials";
    $_SESSION['error']=$err;
    header('location:front.php');
  }
?>
