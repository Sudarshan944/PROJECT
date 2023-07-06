<?php
	$uid = $_POST['userid'];
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['passid'];

	// Database connection
	$conn = new mysqli('localhost','root','','my_db');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into information(userid,userpassword,username,usermail) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $uid, $password, $uname, $email);
		$execval = $stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>