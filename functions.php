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
} elseif (isset($_POST['login_submit'])) {
	userlogin($conn);
} elseif (isset($_GET['logout'])) {
	userlogout($conn);
} elseif (isset($_POST['addfoot'])) {
	addfootwear($conn);
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

function userlogin($conn){
	if (isset($_POST['login_submit'])) {
		$email=mysqli_real_escape_string($conn, $_POST['Email']);
		$password=mysqli_real_escape_string($conn, $_POST['Password']);
		$rememberme = 0;
		if (isset($_POST['rememberme'])) {
			$rememberme = 1;
		} else {
			$rememberme = 0;
		}


		$sql = "SELECT * FROM users WHERE users.email='$email'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			//USER NOT FOUND ERROR
		} else if ($resultCheck==1) {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
							//INCORRECT PASSWORD ERROR
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['user_name'] = $row['first_name'].' '.$row['last_name'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['zip'] = $row['zip'];
					$_SESSION['city'] = $row['city'];
					$_SESSION['state'] = $row['state'];
					$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['mobile'] = $row['mobile'];
					date_default_timezone_set("Asia/Kolkata");
					if (isset($_SESSION['user_id']) && ($rememberme==1)) {
						$cookievalue = $_COOKIE['PHPSESSID'];
						setcookie("PHPSESSID",$cookievalue,time()+(3600*24*2),"/");
					}
					header('Location: customer_orders.php');
				}
			}
		}
	}
}

function userlogout($conn) {
	if (isset($_GET['logout'])) {
		date_default_timezone_set("Asia/Kolkata");
		$cookievalue = $_COOKIE['PHPSESSID'];
		session_start();
		session_unset();
		session_destroy();
		setcookie("PHPSESSID",$cookievalue,time()-(3600),"/");
		header("Location: index.php");
		exit();
	}
}


function addfootwear($conn) {
	
	if(isset($_POST['addfoot'])) {
		$category=mysqli_real_escape_string($conn, $_POST['category']);
		$gender=mysqli_real_escape_string($conn, $_POST['gender']);
		$name=mysqli_real_escape_string($conn, $_POST['name']);
		$desc=mysqli_real_escape_string($conn, $_POST['description']);
		$brand=mysqli_real_escape_string($conn, $_POST['brand']);
		$price=mysqli_real_escape_string($conn, $_POST['price']);
		$colour=mysqli_real_escape_string($conn, $_POST['colour']);
		echo $category.$gender.$name.$brand.$price.$colour.$desc;
		if(strcmp($gender, 'Men')) {
			echo "Ok Happening";
			$sub_category=$_POST['footwear-men'];
			$sql="INSERT INTO product (name, product_description, brand, category, price, colour, gender, seller_id) VALUES ('$name','$desc','$brand','$category',$price,'$colour', '$gender', 1000)";
			$result=mysqli_query($conn, $sql);
		} 
		else if (strcmp($gender, 'Women')) {
			echo "Happening";
			$sub_category=$_POST['footwear-women'];
			$sql="INSERT INTO product (name, product_description, brand, category, price, colour, gender, seller_id) VALUES ('$name','$desc','$brand','$category','$price', '$colour', '$gender', )";
			$result=mysqli_query($conn, $sql);
		}
		if($result) {
			echo "Done";
		}			
		else {
			echo "Error";
		}
	}
}