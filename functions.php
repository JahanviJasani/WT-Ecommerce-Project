<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "pass1234";
$dbName = "eliteshoppy";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn)
{
  die('Could not connect: ' . mysql_error());
}



if (isset($_POST['signup_submit'])) {
	usersignup($conn);
}

function usersignup($conn) {
	if (isset($_POST['signup_submit'])) {
		
		$fname=mysqli_real_escape_string($conn, $_POST['FName']);
		$lname=mysqli_real_escape_string($conn, $_POST['LName']);
		$email=mysqli_real_escape_string($conn, $_POST['Email']);
		$password=mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT));
		$sql="SELECT * FROM users WHERE users.email='$email'";
		$result=mysqli_query($conn, $sql);
		if($result) {
			$num_row= mysqli_num_rows($result);
			if ($num_row==0) {
				$sql="INSERT INTO users (first_name, last_name,email,password,user_type) VALUES ('$fname','$lname','$email','$password',0)";
				$result2 = mysqli_query($conn, $sql);
				if ($result2) {
					echo "<script>location.href='index.php';</script>";
				}
				
			} else {
				//show error for user exists
			}
		} else {
		}
	}
}