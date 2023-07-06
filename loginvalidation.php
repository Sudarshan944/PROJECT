<?php
    $userid=$_POST['userid'];
    $passid=$_POST['passid'];
    $conn = new mysqli('localhost','root','','my_db');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("select * from information where userid = ?");
		$stmt->bind_param("s", $userid);
		$stmt->execute();
		$result=$stmt->get_result();
        if($result->num_rows > 0)
        {
            $data=$result->fetch_assoc();
            if($data['userpassword'] == $passid)
            {
                echo "<h2>Login successful</h2>";
            }
            else{
                 echo "<h2>Invalid Email or Password</h2>";
            }

        }
        else{
            echo "<h2>Invalid Email or Password</h2>";
        }
	}
?>