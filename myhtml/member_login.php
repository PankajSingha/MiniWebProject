<html>
<body >
<?php
$uname = $_POST['username'];
$pwd = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "cs-40/15";
$dbname = "db_test";

$conn = new mysqli($servername, $username, $password, $dbname );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql = "select * from member where username='".$uname."' and password='".$pwd."' ";
$result = mysqli_query($conn, $sql);	

if (mysqli_num_rows($result) > 0) {

	session_start();
	$_SESSION["username"] = $uname;
	$_SESSION["password"] = $pwd;
	$_SESSION["logged"] = true;
	echo "<script>";
	echo "alert('Logged in successfully');";
	echo "window.location.href='../index.php'; ";
	echo "</script>";

}
else{
	//	echo "failed";
	 echo "<script>";
        echo "alert('Log in failed. Try Again.');";
        echo "window.location.href='./login.html'; ";
        echo "</script>";

}
$conn->close();

?>
</body>
</html>
