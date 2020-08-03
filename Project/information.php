<?php
  session_start();   // we need to start session so that we can use the name  of the person entered
  if(!isset($_SESSION['user'])){       //once we pressed back or logged out then we should not get this name again
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


      <div class="info-form">
        <form id="input-group" action="addsub.php" method="post">
          <table>
          <tr>
          <td><lebel>Course : </lebel></td>
          <td colspan="4"><input type="text" class="input-field"  name="course" required></td>
          </tr>
          <tr>
            <td> <level>Batch :</level><br> </td>
            <td><level>From</level></td>
            <td><select class="input-field" name="from" required>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
              <option value="2016">2016</option>
              <option value="2015">2015</option>
              <option value="2014">2014</option>
              <option value="2013">2013</option>
              <option value="2012">2012</option>
              <option value="2011">2011</option>
            </select></td>
            <td><level>To</level></td>
            <td><select class="input-field" name="to" required>
              <option value="2024">2024</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
              <option value="2016">2016</option>
              <option value="2015">2015</option>
              <option value="2014">2014</option>
              <option value="2013">2013</option>
              <option value="2012">2012</option>
              <option value="2011">2011</option>
            </select>
            </td>
          </tr>
          <tr>
            <td ><lebel>Sem: </lebel></td>
            <td colspan="4"><input type="number" class="input-field" min="1" max="10" name="sem" required></td>
          </tr>
          <tr>
            <td ><lebel>No of Subj :</lebel></td>
            <td colspan="4"><input type="number" class="input-field" id="no" name="no" required autofill="off"></td>
          </tr>
          <tr>

          <td><input type="submit" name="button1" value="Add Subject"></td></tr>
          <tr>
            <td></td>
          </tr>
        </table>
        <br>
      <!--  --></form>
      </div>
    </div>
  </body>
</html>
