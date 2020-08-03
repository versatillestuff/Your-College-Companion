<?php
  session_start();   // we need to start session so that we can use the name and of the person entered
  if(!isset($_SESSION['user'])){       //once we pressed back or logged out then we shout not get this name again
    header('location: void.php');  // The isset() function return false if testing variable contains a NULL value.
  }
?>
<html>
  <head>
      <title>  </title>
      <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <div class="back">
      <div class="head">
        <div class="logo"><h2 id="line">COLLAGE NOTES COLLECTOR</h2><br>
                  <h3 id="tag">From Someone as You</h3>
        </div>
        <div class="head1"><h3>Welcome <?php echo $_SESSION['user'];?></h3>
          <a id="logout" href="logout.php" >LOGOUT</a>
        </div>
      </div>

      <!-- Form begins -->
      <div class="info-form">
        <form id="input-group" id="info-form"  method="post">
          <!--<lebel>Add Notes For  </lebel>-->

          <?php
           $con=mysqli_connect('localhost','root','','project');
            if($con){
            //  echo"connection successful";
            }
            else{
             //echo"not connected";
            }

            $id=$_SESSION['uid'];
            $sql="select registration.id,student.course,student.sub
                  from registration
                  inner join student on registration.id=student.id
                  where registration.id=$id";
            if(mysqli_query($con,$sql))
            {
                //echo"std inserted";
            }
            else {
                  //  echo"std not";
                  }
            $result=$con->query($sql);
            $row=$result->fetch_assoc();
            //echo"$row[id] .<br>. $row[course] .<br>. $row[sub]";
            $n=$row['sub'];
            $sql1="insert into subject(id,course)values('$row[id]','$row[course]')";
            if(mysqli_query($con,$sql1))
            {
            //  echo"id inserted";
            }
            else {
              echo"id not";
            }
            for($i=1;$i<=$n;$i++)
            {
              $s="s".$i;
              $c="c".$i;
              $subj=$_POST['s'.$i].$_POST['c'.$i];
            //  echo"$s , $c , $subj <br>";
              $sql2="update subject set $s='$subj'
                    where id=$row[id]";            // putting name of subjects in subject table  brackets in set $s='$subj' are very imp and took so much tym to complete
              if(mysqli_query($con,$sql2))
              {
                //echo"working <br>";
              }
              else {
                echo "Error :".mysqli_error($con);
              }
            }
            header('location:home.php');
          ?>
        </form>

      </div>
    </div>
  </body>
