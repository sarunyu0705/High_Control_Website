<?php
session_start();
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'airpumps', 'High2016', 'airpumps_db');
if (!$db) {
	echo "Connection Failed :(";
}
else {
	// echo "Connection Success :)";
}

// Process Login User
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "โปรดใส่ 'ชื่อผู้ใช้งาน' ด้วยครับ");
  }
  if (empty($password)) {
  	array_push($errors, "โปรดใส่ 'รหัสผ่าน' ด้วยครับ");
  }

  if (count($errors) == 0) {
  	$password =($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "ล็อคอินเข้าสู่ระบบเรียบร้อยแล้ว";
      echo "Succes Login";
  	  header('location: php/Login_system/homepage.php');
  	}else {
  		array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด");
  	}
  }
}

?>
