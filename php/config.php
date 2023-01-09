<?php

$databaseHost = 'localhost';
$databaseUsername = 'airpumps';
$databasePassword = 'High2016';
$databaseName = 'airpumps_db';


$servername = "localhost";
$username = "airpumps";
$password = "High2016";
$dbname = "airpumps_db";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$mysqli) {
	echo "Connection Failed :(";
}
else {
	// echo "Connection Success :)";
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=airpumps_db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully (เชื่อมฐานข้อมูลสำเร็จ)";
} catch (PDOException $e) {
  echo "Connection failed (เชื่อมฐานข้อล้มเหลว): " . $e->getMessage();
}

?>
