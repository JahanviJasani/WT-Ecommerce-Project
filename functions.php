<?php
session_start();
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
} elseif (isset($_POST['addfoot']) || isset($_POST['addbag']) || isset($_POST['addwatch'])) {
	addproduct($conn);
}
elseif (isset($_POST['seller_reg'])) {
	register_seller($conn);
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
				header('Location: index.php?signupuserexists=true');
			}
		} else {
			//Registration failed
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
			header('Location: index.php?loginusernotexists=true');
		} else if ($resultCheck==1) {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
							//INCORRECT PASSWORD ERROR
					header('Location: index.php?loginerror=true');
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
					echo $_SESSION['user_id'].$_SESSION['user_name'].$_SESSION['email'];
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

function register_seller($conn) {
	if (isset($_POST['seller_reg'])) {
		$fname=mysqli_real_escape_string($conn, $_POST['fname']);
		$lname=mysqli_real_escape_string($conn, $_POST['lname']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);
		$accno=mysqli_real_escape_string($conn, $_POST['account_num']);
		$bankname=mysqli_real_escape_string($conn, $_POST['bank']);
		$ifsc=mysqli_real_escape_string($conn, $_POST['ifsc']);
		$password=mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT));
		$sql="SELECT * FROM users WHERE users.email='$email'";
		$result=mysqli_query($conn, $sql);
		if($result) {
			$num_row= mysqli_num_rows($result);
			if ($num_row==0) {
				$sql="INSERT INTO users (first_name, last_name,email,password,user_type) VALUES ('$fname','$lname','$email','$password',1)";
				$result2 = mysqli_query($conn, $sql);
				$sql="SELECT * FROM users WHERE users.email='$email' AND users.user_type=1";
				$result3 = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result3);
				$uid=$row['user_id'];
				$sql="INSERT INTO seller (user_id, account_num, bank_name, ifsc) VALUES ('$uid','$accno','&bankname','$ifsc')";
				$result4 = mysqli_query($conn, $sql);
				if ($result2 && $result4) {
					echo 'Ho gaya';
				} else {
					echo 'Ohh shit';
				}
			} else {
				//show error for user exists
				header('Location: selwithus.php?alreadyregistered=true');
			}
		} else {
			//Registration failed
			header('Location: selwithus.php?error=true');
		}
	}
}

function addproduct($conn) {
	echo "string";
	$category=mysqli_real_escape_string($conn, $_POST['category']);
	$gender=mysqli_real_escape_string($conn, $_POST['gender']);
	$name=mysqli_real_escape_string($conn, $_POST['name']);
	$desc=mysqli_real_escape_string($conn, $_POST['description']);
	$brand=mysqli_real_escape_string($conn, $_POST['brand']);
	$price=mysqli_real_escape_string($conn, $_POST['price']);
	$colour=mysqli_real_escape_string($conn, $_POST['colour']);
	if($gender=='men') {
		echo "Men";
		$sql="INSERT INTO product (name, product_description, brand, category, price, colour, gender, seller_id) VALUES ('$name','$desc','$brand','$category',$price,'$colour', '$gender', 1000)";
		$result=mysqli_query($conn, $sql);
		$sql="SELECT product_id FROM product WHERE name='$name'";
	} 
	elseif ($gender=='women') {
		echo "Women";
		$sql="INSERT INTO product (name, product_description, brand, category, price, colour, gender, seller_id) VALUES ('$name','$desc','$brand','$category','$price', '$colour', '$gender', 1000 )";
		$result=mysqli_query($conn, $sql);
	}
	$sql = "SELECT product_id FROM product WHERE name='$name' AND brand='$brand' AND category='$category' AND price='$price'";
	$result1=mysqli_query($conn, $sql);
	if (isset($_POST['addfoot'])) {
		echo "Calling footwear";
		addfootwear($conn, $gender, $result1);
	}
	elseif (isset($_POST['addbag'])) {
		addbag($conn, $gender, $result1);
	}
	elseif (isset($_POST['addwatch'])) {
		addwatch($conn, $gender, $result1);
	}
}

function addfootwear($conn, $gender, $result1) {
	echo "footwear called";
	$material=mysqli_real_escape_string($conn, $_POST['material']);
	$sub_category=$_POST['footwear-men'];
	$row = mysqli_fetch_assoc($result1);
	$pid = $row['product_id'];
	echo "product id ".$pid." mateial ".$material." subcat ".$sub_category;
	$result2 = "";
	if($gender=='men') {
		echo "inside men wala footwear";
		$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sub_category')";
		$result2=mysqli_query($conn, $sql);
		echo "Its".$result2;
		$sql="SELECT * FROM footwear WHERE product_id=$pid";
		$row=mysqli_fetch_assoc(mysqli_query($conn, $sql));
		$fid=$row['footwear_id'];
		$result2="";
		if(isset($_POST['size6m']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size6m']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 6, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size7m']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size7m']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 7, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size8m']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size8m']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 8, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size9m']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size9m']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 9, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size10m']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size10m']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 10, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size11m']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size11m']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 11, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size12m']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size12m']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 12, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
	}
	elseif($gender=='women') {
		echo "inside women wala footwear";
		$sub_category=$_POST['footwear-women'];
		$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sub_category')";
		$result2=mysqli_query($conn, $sql);
		$sql="SELECT * FROM footwear WHERE product_id=$pid";
		$row=mysqli_fetch_assoc(mysqli_query($conn, $sql));
		$fid=$row['footwear_id'];
		$resilt2="";
		if(isset($_POST['size3w']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size3w']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 3, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size4w']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size4w']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 4, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size5w']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size5w']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 5, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size6w']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size6w']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 6, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size7w']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size7w']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 7, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
		if(isset($_POST['size8w']))
		{
			$stock=mysqli_real_escape_string($conn, $_POST['stock_size8w']);
			$sql="INSERT INTO footwear_size VALUES ('$fid', 8, '$stock')";
			$result2=mysqli_query($conn, $sql);
		}
	}
	if($result2) {
		echo "Done";
	} else {
		echo "Error";
	}
}

function addbag($conn, $gender, $result1) {
	$capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
	$length = mysqli_real_escape_string($conn, $_POST['length']);
	$height = mysqli_real_escape_string($conn, $_POST['height']);
	$width = mysqli_real_escape_string($conn, $_POST['width']);
	$material = mysqli_real_escape_string($conn, $_POST['material']);
	$weight = mysqli_real_escape_string($conn, $_POST['weight']);
	$stock = mysqli_real_escape_string($conn, $_POST['stock']);
	$row = mysqli_fetch_assoc($result1);
	$pid = $row['product_id'];

	if ($gender=='men') {
		$subcategory = mysqli_real_escape_string($conn, $_POST['bag-men']);
		$sql = "INSERT INTO bags (product_id, stock, bag_capacity, length, height, width, material, weight,subcategory) VALUES ('$pid', '$stock', '$capacity', '$length', '$height', '$width', '$material', '$weight', '$subcategory')";
		$result2=mysqli_query($conn, $sql);
	} elseif ($gender=='women') {
		$subcategory = mysqli_real_escape_string($conn, $_POST['bag-women']);
		$sql = "INSERT INTO bags (product_id, stock, bag_capacity, length, height, width, material, weight,subcategory) VALUES ('$pid', '$stock', '$capacity', '$length', '$height', '$width', '$material', '$weight', '$subcategory')";
		$result2=mysqli_query($conn, $sql);
	}
	if($result2) {
		echo "Done";
	} else {
		echo "Error";
	}
}


function addwatch($conn, $gender, $result1) {
	$clasp_type = mysqli_real_escape_string($conn, $_POST['clasp_type']);
	$case_shape = mysqli_real_escape_string($conn, $_POST['case_shape']);
	$display_type = mysqli_real_escape_string($conn, $_POST['display_type']);
	$dial_colour = mysqli_real_escape_string($conn, $_POST['dial_colour']);
	$case_material = mysqli_real_escape_string($conn, $_POST['case_material']);
	$band_material = mysqli_real_escape_string($conn, $_POST['band_material']);
	$stock = mysqli_real_escape_string($conn, $_POST['stock']);
	$row = mysqli_fetch_assoc($result1);
	$pid = $row['product_id'];

	if ($gender=='men') {
		$sql = "INSERT INTO watches (product_id, stock, clasp_type, case_shape, display_type, dial_colour, case_material, band_material) VALUES ('$pid', '$stock', '$clasp_type', '$case_shape', '$display_type', '$dial_colour', '$case_material', '$band_material')";
		$result2=mysqli_query($conn, $sql);
	} elseif ($gender=='women') {
		$sql = "INSERT INTO watches (product_id, stock, clasp_type, case_shape, display_type, dial_colour, case_material, band_material) VALUES ('$pid', '$stock', '$clasp_type', '$case_shape', '$display_type', '$dial_colour', '$case_material', '$band_material')";
		$result2=mysqli_query($conn, $sql);
	}
	if($result2) {
		echo "Done";
	} else {
		echo "Error";
	}
}