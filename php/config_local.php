<!-- อันนี้เป็นของ XAMPP -->
<?php

$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'high_control';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "high_control";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$mysqli) {
	echo "Connection Failed :(";
}
else {
	// echo "Connection Success :)";
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=high_control", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully (เชื่อมฐานข้อมูลสำเร็จ)";
} catch (PDOException $e) {
  echo "Connection failed (เชื่อมฐานข้อล้มเหลว): " . $e->getMessage();
}

?>
