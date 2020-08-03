<?php
	session_start();
	if(!isset($_SESSION['user']))
	{
		header('location: front.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>view page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style3.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

</head>
<body>

<header>

<!--<nav>
	<div class="logo"> <h1 style="font-size: 20px;"> Notes Adda</h1> </div>
	<div class="menu">
		<a href="#" style="font-size: ">Home</a>
		<a href="#">gallery</a>
		<a href="#">about</a>
		<a href="#">contact</a>
	</div>
</nav>
-->
		<div class="head">
        <div class="logo"><h2 id="line">COLLAGE NOTES COLLECTOR</h2><br>
                  <h3 id="tag">From Someone as You</h3>
        </div>
        <div class="head1"><h3>Welcome <?php echo $_SESSION['user'];?></h3>
          <a id="logout" href="logout.php" >LOGOUT</a>
        </div>
    </div>

		<?php
			$con=mysqli_connect('localhost','root','','project');
			if($con){
				//echo"connected";
			}
			else
			{
				echo"Error : ".mysqli_error($con);
			}
			$id=$_SESSION['uid'];
			$sql="select *from student
							inner join subject on student.id=subject.id
							where student.id=$id";
			$result=$con->query($sql);
			$row=$result->fetch_assoc();
			echo "<div class='subject'>";
				for($r=1;$r<=$row['sub'];$r++)
				{
					$s=$row["s".$r];
						echo"<div class='dropup' id='drop'>
		  				<button class='dropbtn'>".substr($s,0,-1)."</button> <br>
		  					<div class='dropup-content'>
		    					<a href='#'><a href='#'>Add Unit</a></a>
		  					</div>
						</div>";
			}
			echo "</div>";
			?>



















			<!--<div class="dropup" id="drop">
			  <button class="dropbtn">Dropup</button> <br>
			  <div class="dropup-content">
			    <a href="#">Link 1</a>
			    <a href="#">Link 2</a>
			    <a href="#">Link 3</a>
			  </div>
			</div>

			<div class="dropup" id="drop">
			  <button class="dropbtn">Dropup</button> <br>
			  <div class="dropup-content">
			    <a href="#">Link 1</a>
			    <a href="#">Link 2</a>
			    <a href="#">Link 3</a>
			  </div>
			</div>

			<div class="dropup" id="drop">
		  <button class="dropbtn">Dropup</button> <br>
		  <div class="dropup-content">
		    <a href="#">Link 1</a>
		    <a href="#">Link 2</a>
		    <a href="#">Link 3</a>
		  </div> -->
		</div>
</div>
	</header>
</body>
</html>
