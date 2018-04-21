<?php
$title = $POST["art_title"];
$type = $POST["art_type"];
$date = $POST["art_date"];
$price = $POST["art_price"];
$path = $POST["art_path"];

if($type == "Traditional")
	$target_dir = "../resources/Traditional/";
if($type == "Digital")
	$target_dir = "../resources/Digital/";
if($type == "Photography")
	$target_dir = "../resources/Photography/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//------------------------------------------------database--------------------------------
$servername = "localhost";
$username = "root";
$password = "cs-40/15";
$dbname = "db_test";
$conn = new mysqli($servername, $username, $password, $dbname );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "insert into artwork values ( '".$title."','".$type."','".$date."','".$price."','".$path."' );";

if ($conn->query($sql) === TRUE) {
    echo "<script>";
        echo "alert('Image Uploaded.');";
        echo "</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();




?>

