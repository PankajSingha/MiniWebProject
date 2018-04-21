<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	 <link href="https://fonts.googleapis.com/css?family=Krona+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="mycss/index.css">
	
</head>
<body>
	<nav>
		<div class="navbar">
			<div class="navbar-left">
				<a href="" style="font-family: 'Permanent Marker', cursive; "> ENGRAM </a>
			  	<a href=""><i class="fa fa-home" aria-hidden="true"></i>Home</a>
			  	<form>
			  		<input type="text" name="search" placeholder="Search"/><button><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
			  	</form>
			  	<a href="">Shop</a>
			  	<a href="">Forum</a>
		  	</div>
		  	<div class="navbar-right">
			</div>
	 	</div>


	 	<div class="navbarlower">
	 		
	 			<!--<button id="browse"><i class="fa fa-bars" aria-hidden="true"></i></button> <span>BROWSE</span>-->
	 		<ul>	
	 			<li class="dropdown">
	 			<button id="browse"><i class="fa fa-bars" aria-hidden="true"></i></button><span>BROWSE</span>
			    <a href="javascript:void(0)" class="dropbtn">Trending	</a>
			    <div class="dropdown-content">
			      <a href="">Traditional</a>
			      <a href="">Digital</a>
			      <a href="">Photography</a>
			      <a href="">Literature</a>
			      <a href="">Design and Interfaces</a>
			    </div>
				</li>
			</ul>
	 	</div>
		
	</nav>	

	<section>
		<div class="content">
			<div class="sidebar ">
				<h4 >All Categories</h4>
				<h3></h3>
				<ul >
					<li><a href="">Traditional</a></li>
					<li><a href="">Digital</a></li>
					<li><a href="">Photography</a></li>
				</ul>
				<div class="notification">
					<hr>
					<p style="color:red;">--- Notifications ---</p>
					<div class="info">
					<ul>
						<marquee direction="up" scrollamount="4" height="310px">
						<li style="color:red;" >Next exhibition date 27th April'18<br><br><br></li>
						<li style="color:red;" >Next exhibition date 27th April'18<br><br><br></li>
						<li style="color:red;" >Next exhibition date 27th April'18<br><br><br></li>
						<li style="color:red;" >Next exhibition date 27th April'18<br><br><br></li>
						<li style="color:red;" >Next exhibition date 27th April'18<br><br><br></li>
						<li style="color:red;" >Next exhibition date 27th April'18<br><br><br></li>
						</marquee>
					</ul>
					</div>
				</div>
			</div>
			<div class="gallery laa">
<?php
$servername = "localhost";
$username = "root";
$password = "cs-40/15";
$dbname = "db_test";

$conn = new mysqli($servername, $username, $password, $dbname );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select art_path from artwork;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
	$path = $row["art_path"];	
 
?>

				<a href="myhtml/cart.html" ><img class="size"  src="<?php echo $path; ?>"></a>
<?php
 }
}
$conn->close();
?>

			</div>
		</div>
	</section>

	<footer>
		<div class="footer-container">
			@Copyright 2018
		</div>
	</footer>

	<script type="text/javascript" src="myjs/index.js"></script>

<?php
session_start();
$var = $_SESSION["logged"];
if($var == true){
?>
	<script>
	var logout = document.querySelector(".navbar-right");	
	logout.innerHTML="<a href='myhtml/logout.php' >Logout</a>";

	var tag = document.querySelector("form + a");
	tag.setAttribute("href","myhtml/upload.html");

	</script>

<?php
}
else{
?>
<script>
        var tag = document.querySelector(".navbar-right");        
	tag.innerHTML="<a  href='myhtml/join.html'>SignUp</a><a href='myhtml/login.html'>Login</a> ";
</script>
<?php
}
?>
</body>
</html>
