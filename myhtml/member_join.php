<html>
<body >

<?php 
$uname = $_POST['username'];
$pwd = $_POST['password'];
$cpwd = $_POST['cpassword'];
//echo $username;
if($pwd != $cpwd){
	echo "<script>";
        echo "alert('Password doesnot match. Try Again.');";
        echo "window.location.href='./join.html'; ";
        echo "</script>";
}
else{
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
	echo "<script>";
        echo "alert('Username already exists.');";
        echo "window.location.href='./join.html'; ";
        echo "</script>";
}
$sql = "insert into member values ( '".$uname."','".$pwd."' )";

if ($conn->query($sql) === TRUE) {
    echo "<script>";
        echo "alert('Account created successfully. Please login to continue.');";
        echo "window.location.href='./login.html'; ";
        echo "</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//$newURL = "./login.html";	
//header('Location: '.$newURL);


$conn->close();
}
?>
</body>
</html> 
