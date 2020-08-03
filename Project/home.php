<?php
  session_start();   // we need to start session so that we can use the name and other info of the person entered
  if(!isset($_SESSION['user'])){       //once we pressed back or logged out then we shout not get this name again
    header('location: front.php');
  }
?>
<!DOCTYPE html>
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

      <!-- form-begins -->

      <div class="info-form">
        <form action="" method="post">
            <?php
              $con=mysqli_connect('localhost','root','','project');
              if($con)
              {//echo"connected";
              }
              else{
                echo"Error : ".mysqli_error($con);
              }
              $id=$_SESSION['uid'];
              $sql="select *from student
                    inner join subject on student.id=subject.id
                    where student.id=$id";
              $result=$con->query($sql);
              $row=$result->fetch_assoc();
            echo"<h3>Notes for".$row['course'] ."-". $row['sem']."</h3>";
              echo"<table border='1' style='align:center;width:80%';
                    margin-left:10%; margin-top:20%>";
              echo"<col style='width:5%'>
                   <col style='width:50%'>
                   <col style='width:20%'>
                   <col style='width:12.5%'>
                   <col style='width:12.5%'>";
              echo"<thead>
                    <tr>
                      <th><lebel>No.</lebel></th>
                      <th><lebel>SUBJECT</lebel></th>
                      <th><lebel>Cr</lebel></th>
                      <th><lebel>ADD</lebel></th>
                      <th><lebel>VIEW</lebel></th>
                    </tr>
                  </thead>";
                for($r=1;$r<=$row['sub'];$r++)
                {
                  $s=$row["s".$r];

                  echo "<tr> \n";
                    echo"
                      <form action=s$r.php method='post'>
                      <td><lebel>$r</lebel></td>
                      <td><lebel>".substr($s,0,-1)."</lebel></td>
                      <td><lebel>".substr($s,-1)."</lebel></td>
                      <td><input type=submit value='Add Notes'></td>
                      <td><input type=submit value='View Notes'></td>
                      </form>
                      \n";
                  echo "</tr>";
                }
                  echo"</table>";
                  echo "<br><br><br>
                  <input type='submit' onclick='addtt()' value='ADD TIME TABLE' />
                  <input type='submit' onclick='marks()' value='GET MARKS' />";

            ?>
        </form>
      </div>
    </body>
</html>
