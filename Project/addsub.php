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

      <!--form begins -->
      <div class="info-form">
      <form action="addnotes.php" method="post">
        <?php
          if(isset($_POST['button1']))
          {
            add_sub();
          }
          function add_sub()
          {
            //if(buttonclicked)
            //{
              // inserting details to student table
                $con=mysqli_connect('localhost','root');
                if($con){
                  //echo"connection successful";
                }
                else{
                 echo"not connected";
                }
                $db=mysqli_select_db($con,'project');
                if($db){
                 //echo" database connection successful";
                 $n=$_SESSION['user'];
                 $id=$_SESSION['uid'];
                 $course=$_POST['course'];
                 $from=$_POST['from'];
                 $to=$_POST['to'];
                 $sem=$_POST['sem'];
                 $s=$_POST['no'];
                }
                else{
                echo" database not connected";
                }

                /* Another way to get id
                $sql="select id from registration where name='$n'";
                $result=$con->query($sql);
                $row=$result->fetch_assoc();
                if(mysqli_query($con,$sql))
                {
                  echo $row['id'];
                }
                else {
                  echo"not selected";
                }
              */
                $sql1="insert into student(id,course,sem,fr,t,sub)values
                ('$id','$course','$sem','$from','$to','$s')";
                if(mysqli_query($con,$sql1))
                  {
                    //header('location:addnotes.php');
                  }
                  else {
                    echo "not";
                  }


            $r=$_POST['no'];
            $i=1;  //style='border-collapse: collapse'
            echo "<table border =\"1\" style='width:75%;
                  margin-left:10%;
                  margin-top:20%'>";
            echo "<col style='width:10%'>
                  <col style='width:60%'>
                  <col style='width:30%'>";
            echo "<thead>
                  <tr>
                  <th><lebel>SL.NO.</lebel></th>
                  <th><lebel>SUBJECT</lebel></th>
                  <th><lebel>CREDITS</lebel></th>
                  </tr>
                  </thead>";
              for ($row=1; $row <=$r; $row++) {
                echo "<tr> \n";
                   echo "
                   <td><input type='text' style='width:100%; border-left: 0;
                   border-top:0;
                   border-right:0;
                   border-bottom: 1px solid #999;'  value='$i'></td>
                     <td><input type='text' style='width:100%;border-left: 0;
                     border-top:0;
                     border-right:0;
                     border-bottom: 1px solid #999;' name='s$i'></td>
                     <td><input type='text' style='width:100%;border-left: 0;
                     border-top:0;
                     border-right:0;
                     border-bottom: 1px solid #999;' name='c$i'></td>
                    \n";  // use proper quotes very very imp
                      echo "</tr>";
                      ++$i;
                }
                echo "</table>";
            }
        ?>

          <br><br><br>
          <input style="margin-left:40px" type="submit" value="Add Notes" name="addnote">
      </form>
    </div>
