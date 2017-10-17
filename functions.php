<?php
session_start();
//phpinfo();
$dbServername = "sehatjaanch.com:3306";
$dbUsername = "EliteShoppy";
$dbPassword = "pass@123";
$dbName = "EliteShoppy";

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
} elseif (isset($_POST['seller_reg'])) {
	register_seller($conn);
} elseif (isset($_POST['profile_update'])) {
	profileupdate($conn);
} elseif (isset($_POST['changepassword'])) {
	changepassword($conn);
} elseif (isset($_GET['add_to_cart_footwear'])) {
	getFootwearSizes($conn);
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
					echo "<script>location.href='index.php?signup=true';</script>";
				} elseif (!$result2) {
					echo "<script>location.href='index.php?signuperror=true';</script>";
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
					if ($_SESSION['user_type']==1) {
						$uid = $_SESSION['user_id'];
						$sql2 = "SELECT * FROM seller WHERE seller.user_id='$uid'";
						$result2 = mysqli_query($conn, $sql2);
						$row2 = mysqli_fetch_assoc($result2);
						$_SESSION['seller_id']=$row2['seller_id'];
					}
					$_SESSION['mobile'] = $row['mobile'];
					date_default_timezone_set("Asia/Kolkata");
					if (isset($_SESSION['user_id']) && ($rememberme==1)) {
						$cookievalue = $_COOKIE['PHPSESSID'];
						setcookie("PHPSESSID",$cookievalue,time()+(3600*24*2),"/");
					}
					echo $_SESSION['user_id'].$_SESSION['user_name'].$_SESSION['email'];
					header('Location: index.php');
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
				$sql="INSERT INTO seller (user_id, account_num, bank_name, ifsc) VALUES ('$uid','$accno','$bankname','$ifsc')";
				$result4 = mysqli_query($conn, $sql);
				if ($result2 && $result4) {
					header('Location: sellwithus.php?seller_reg_success=true');
				} else {
					header('Location: sellwithus.php?seller_reg_fail=true');
				}
			} else {
				//show error for user exists
				header('Location: sellwithus.php?alreadyregistered=true');
			}
		} else {
			//Registration failed
			header('Location: sellwithus.php?error=true');
		}
	}
}

function profileupdate($conn) {
	if (isset($_POST['profile_update']))
	{
		$fname=mysqli_real_escape_string($conn, $_POST['firstname']);
		$lname=mysqli_real_escape_string($conn, $_POST['lastname']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);
		$mobile=mysqli_real_escape_string($conn, $_POST['mobile']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		$zip = mysqli_real_escape_string($conn,$_POST['zip']);
		$city = mysqli_real_escape_string($conn,$_POST['city']);
		$state = mysqli_real_escape_string($conn,$_POST['state']);
		$user = $_SESSION['user_id'];
        $sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email', mobile='$mobile', address='$address', zip='$zip', city='$city', state='$state' WHERE users.user_id='$user'";
        $result1 = mysqli_query($conn, $sql);
        $sql = "SELECT * FROM users WHERE users.user_id='$user'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['user_type']==1){
        	$accno=mysqli_real_escape_string($conn, $_POST['accountnumber']);
			$bankname=mysqli_real_escape_string($conn, $_POST['bankname']);
			$ifsc=mysqli_real_escape_string($conn, $_POST['ifsc']);
			$sql = "UPDATE seller SET account_num='$accno', bank_name='$bankname', ifsc='$ifsc' WHERE seller.user_id='$user'" ;
        	$result2 = mysqli_query($conn, $sql);
        	if($result1 && $result2){
        		header("Location: seller_account.php"); /* Redirect browser */
				exit(); }
        }                
        if($result1){
        	header("Location: customer_account.php"); /* Redirect browser */
			exit();
        }
        else{
        	echo "Failed";
        }
	}
}

function changepassword($conn) {
	if (isset($_POST['changepassword']))
	{
		$user = $_SESSION['user_id'];
		$password_old=mysqli_real_escape_string($conn, $_POST['password_old']);
		$password1=mysqli_real_escape_string($conn, $_POST['password_1']);
		$sql = "SELECT * FROM users WHERE users.user_id='$user'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$hashedPwdCheck = password_verify($password_old, $row['password']);
		if($hashedPwdCheck==true)
		{
			$password=mysqli_real_escape_string($conn, password_hash($password1, PASSWORD_DEFAULT));
			$sql = "UPDATE users SET password='$password' WHERE users.user_id='$user'";
			$result = mysqli_query($conn, $sql);	
			if($result){
				if($row['user_type']==1)
				{
					header("Location: seller_account.php"); /* Redirect browser */
					exit();
				}
				else
				{
					header("Location: customer_account.php"); /* Redirect browser */
					exit();
				}

			}
		}
		else if($hashedPwdCheck==false)
		{
			if($row['user_type']==1)
				{
					header("Location: seller_account.php?change=true"); /* Redirect browser */
					exit();
				}
			else
			{
					header("Location: customer_account.php?change=true"); /* Redirect browser */
					exit();
			}
		}
	}
}

function addproduct($conn) {
	// echo "string";
	$category=mysqli_real_escape_string($conn, $_POST['category']);
	$gender=mysqli_real_escape_string($conn, $_POST['gender']);
	$name=mysqli_real_escape_string($conn, $_POST['name']);
	$desc=mysqli_real_escape_string($conn, $_POST['description']);
	$brand=mysqli_real_escape_string($conn, $_POST['brand']);
	$price=mysqli_real_escape_string($conn, $_POST['price']);
	$colour=mysqli_real_escape_string($conn, $_POST['colour']);
	$sid = $_SESSION['seller_id'];
	if($gender=='men') {
		// echo "Men";
		$sql="INSERT INTO product (name, product_description, brand, category, price, colour, gender, seller_id) VALUES ('$name','$desc','$brand','$category',$price,'$colour', '$gender', '$sid')";
		$result=mysqli_query($conn, $sql);
		$sql="SELECT product_id FROM product WHERE name='$name'";
	} 
	elseif ($gender=='women') {
		// echo "Women";
		$sql="INSERT INTO product (name, product_description, brand, category, price, colour, gender, seller_id) VALUES ('$name','$desc','$brand','$category','$price','$colour','$gender', '$sid')";
		$result=mysqli_query($conn, $sql);
	}
	$sql = "SELECT product_id FROM product WHERE name='$name' AND brand='$brand' AND category='$category' AND price='$price'";
	$result1=mysqli_query($conn, $sql);
	if (isset($_POST['addfoot'])) {
		// echo "Calling footwear";
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
	// echo "footwear called";
	$material=mysqli_real_escape_string($conn, $_POST['material']);
	$sub_category=$_POST['footwear-men'];
	$row = mysqli_fetch_assoc($result1);
	$pid = $row['product_id'];
	$i=0;
	
	// echo "product id ".$pid." material ".$material." subcat ".$sub_category;
	$result2 = "";
	if($gender=='men') {
		// echo "inside men wala footwear";
		$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sub_category')";
		$result2=mysqli_query($conn, $sql);
		// echo "Its".$result2;
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
		if (isset($_POST['addfoot'])) {
			$uploadOk = addimages($conn,$pid); 
		}
	}
	elseif($gender=='women') {
		// echo "inside women wala footwear";
		$sub_category=$_POST['footwear-women'];
		if($sub_category=="Canvas Shoes") {
			$sc="Canvas";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Boots") {
			$sc="Boots";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Kitten Heels") {
			$sc="Kitten";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Gladiators") {
			$sc="Gladiators";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Flip Flops") {
			$sc="FlipFlops";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Wedges") {
			$sc="Wedges";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Stiletto") {
			$sc="Stiletto";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Pumps") {
			$sc="Pumps";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Loafers") {
			$sc="Loafers";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		} elseif($sub_category=="Others") {
			$sc="Others";
			$sql="INSERT INTO footwear (product_id, material, subcategory) VALUES ('$pid', '$material', '$sc')";
			$result2=mysqli_query($conn, $sql);
		}
		$sql="SELECT * FROM footwear WHERE product_id=$pid";
		$row=mysqli_fetch_assoc(mysqli_query($conn, $sql));
		$fid=$row['footwear_id'];
		$result2="";
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
		if (isset($_POST['addfoot'])) {
			$uploadOk = addimages($conn,$pid); 
		}
	}
	
	if($result2 && $uploadOk) {
		// echo "Done";
	} 
	else {
		// echo "Error".mysqli_error($conn);
		$sql="DELETE FROM product WHERE product_id=$pid";
		$result2=mysqli_query($conn, $sql);
		$select = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM images WHERE product_id='$pid'")); //Fetch the file which is associated with this account
    	unlink($select['image_location']); 
	}
}

function addbag($conn, $gender, $result1) {
	$uploadOk=0;
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
		if (isset($_POST['addbag'])) {
			$uploadOk = addimages($conn,$pid); 
		}
	} elseif ($gender=='women') {
		$subcategory = mysqli_real_escape_string($conn, $_POST['bag-women']);
		$sql = "INSERT INTO bags (product_id, stock, bag_capacity, length, height, width, material, weight,subcategory) VALUES ('$pid', '$stock', '$capacity', '$length', '$height', '$width', '$material', '$weight', '$subcategory')";
		$result2=mysqli_query($conn, $sql);
		if (isset($_POST['addbag'])) {
			$uploadOk = addimages($conn,$pid); 
		}
	}
	if($result2 && $uploadOk) {
		// echo "Done";
	} 
	else {
		// echo "Error".mysqli_error($conn);
		$sql="DELETE FROM product WHERE product_id=$pid";
		$result2=mysqli_query($conn, $sql);
		$select = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM images WHERE product_id='$pid'")); //Fetch the file which is associated with this account
    	unlink($select['image_location']); 
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
		if (isset($_POST['addwatch'])) {
			$uploadOk = addimages($conn,$pid); 
		}
	} elseif ($gender=='women') {
		$sql = "INSERT INTO watches (product_id, stock, clasp_type, case_shape, display_type, dial_colour, case_material, band_material) VALUES ('$pid', '$stock', '$clasp_type', '$case_shape', '$display_type', '$dial_colour', '$case_material', '$band_material')";
		$result2=mysqli_query($conn, $sql);
		if (isset($_POST['addwatch'])) {
			$uploadOk = addimages($conn,$pid); 
		}
	}
	if($result2 && $uploadOk) {
		// echo "Done";
	} 
	else {
		// echo "Error".mysqli_error($conn);
		$sql="DELETE FROM product WHERE product_id=$pid";
		$result2=mysqli_query($conn, $sql);
		$select = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM images WHERE product_id='$pid'")); //Fetch the file which is associated with this account
    	unlink($select['image_location']); 
	}
}

function getFootwearSizes($conn) {
	$pid = $_GET['pid'];
	$url = 'Location: index.php?q7wgrzp84d='.$pid;
	echo $url;
	header($url);
}




function addimages($conn,$pid) 
{
	$uploadOk = 1;
	$resultimage = "";
	$j = 0;   
	$i = 0;  // Variable for indexing uploaded image.
	$target_path = "uploads/";     // Declaring Path for uploaded images.
	for ($i = 0; $i < count($_FILES['img']['name']); $i++) 
	{
	// Loop to get individual element from the array
			$validextensions = array("jpeg", "jpg", "png","JPEG","PNG","JPG");      // Extensions which are allowed.
			$ext = explode('.', basename($_FILES['img']['name'][$i]));   // Explode file name from dot(.)
			$file_extension = end($ext); // Store extensions in the variable.
			$target_path = $target_path . $pid . '_' .$i. '.' . $ext[count($ext) - 1];     // Set the target path with a new name of image.
			$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
			if (($_FILES["img"]["size"][$i] < 100000000)  && in_array($file_extension, $validextensions)) // Approx. 100kb files can be uploaded.
			{
				if (move_uploaded_file($_FILES['img']['tmp_name'][$i], $target_path))
				{
					// If file moved to uploads folder.
					// echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
					$sql="INSERT INTO images (product_id,image_location) VALUES ('$pid', '$target_path')";
					$resultimage=mysqli_query($conn, $sql);
					$target_path='uploads/';
				} 
				else 
				{    //  If File Was Not Moved.
					// echo $j. ').<span id="error">Please try again!.</span><br/><br/>';
					$uploadOk = 0;
					
				}
			} 
			else 
			{   //   If File Size And File Type Was Incorrect.
				// echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
				$uploadOk=0;
				
			}

	}

	$ext = explode('.', basename($_FILES['pri_img']['name']));
	$file_extension = end($ext);
	$target_path = 'primary/pri_'.$pid.'.'.$ext[count($ext) - 1];
	if ( ($_FILES["pri_img"]["size"] < 100000000)   && in_array($file_extension, $validextensions)) {
		if (move_uploaded_file($_FILES['pri_img']['tmp_name'], $target_path))
		{
			// If file moved to uploads folder.
			// echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
			$sql="INSERT INTO images (product_id,image_location) VALUES ('$pid', '$target_path')";
			$resultimage=mysqli_query($conn, $sql);
		} 
		else 
		{    //  If File Was Not Moved.
			// echo $j. ').<span id="error">Please try again!.</span><br/><br/>';
			$uploadOk = 0;
		}
	}


	return $uploadOk;

	// Check if image file is a actual image or fake image
	/*if(isset($_POST["addfoot"]) && isset($_FILES['img']['name'])) {

		for ($i = 0; $i < count($_FILES['img']['name']); $i++) {
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["img"]["name"][$i]);
			$uploadOk = 0;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$temp = explode(".", $_FILES["img"]["name"][$i]);
			$newfilename = $pid . '.' . end($temp);
			
		    $check = ($_FILES["img"]["tmp_name"][$i]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
			
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["img"]["size"][$i] > 100000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"  && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
			&& $imageFileType != "GIF") {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["img"]["name"][$i], "uploads/" . $newfilename)) {
			        echo "The file ". basename($_FILES["img"]["name"][$i]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
		}
	}*/
}