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

echo checkout($conn);

function checkout($conn)
{
	$razorpay = mysqli_real_escape_string($conn, $_POST['razorpay_payment_id']);	
	$method = mysqli_real_escape_string($conn,$_POST['pmt_method']);
	$total = mysqli_real_escape_string($conn,$_POST['total_amt']);
	$user = $_SESSION['user_id'];
	$date = date("d/m/Y");
	$name = $_SESSION['name'];
	$mobile = $_SESSION['mobile'];
	$address = $_SESSION['address'];
	$zip = $_SESSION['zip'];
	$city = $_SESSION['city'];
	$state = $_SESSION['state'];
	$sql_insert = "INSERT INTO orders (user_id, date, total, payment_method, name, mobile, address, zip, city, state) VALUES ('$user','$date','$total','$method','$name','$mobile','$address','$zip','$city','$state')";
	$insert_result = mysqli_query($conn,$sql_insert);
	$sql_insert = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
	$insert_result = mysqli_query($conn,$sql_insert);
	$row_insert = mysqli_fetch_assoc($insert_result);
	$order_id = (int)$row_insert['order_id'];
	if($method=='')
	{
		header("Location: checkout3.php"); /* Redirect browser */
		exit();
	}
	else
	{
		if ($method!='cod')
		{
			$sql_transaction = "INSERT INTO transaction (order_id, transaction_id, payment_status, amount) VALUES ('$order_id','$razorpay', 'Complete' , '$total')";
			$sql_transaction_result = mysqli_query($conn,$sql_transaction);
			echo mysqli_error($conn);
		}
		$sql = "SELECT * FROM cart WHERE cart.user_id='$user'";
	    $result=mysqli_query($conn, $sql);
	    $suborder = 1;
		while (($row = mysqli_fetch_assoc($result)))
		{
			$pid = $row['product_id'];
			$qty = $row['qty'];
			$sql_product = "SELECT * FROM product WHERE product_id='$pid'";
			$productresult = mysqli_query($conn, $sql_product);
			$productrow = mysqli_fetch_assoc($productresult);
			$category = $productrow['category'];
			if($category=='bag')
			{
				$sql_bag = "SELECT * FROM bags WHERE product_id='$pid'";
				$result_bag = mysqli_query($conn,$sql_bag);
				$row_bag = mysqli_fetch_assoc($result_bag);
				$stock = $row_bag['stock'] - $qty;
				$sql_update = "UPDATE bags SET stock='$stock' WHERE product_id='$pid'";
				$result_update = mysqli_query($conn,$sql_update);
				$sub_total = (int)$qty*(int)$productrow['price']-(int)$qty*(int)$productrow['price']*$productrow['discount'];
				$sql_suborder = "INSERT INTO sub_order (order_id, product_id, sub_order_id, status, quantity, subtotal) VALUES ('$order_id', '$pid', '$suborder','Processing','$qty','$sub_total')";
				$suborder_result = mysqli_query($conn, $sql_suborder);
				$sql_delete = "DELETE FROM cart WHERE user_id='$user' and product_id='$pid'";
				$delete_result = mysqli_query($conn,$sql_delete);
				$suborder = $suborder + 1;
			}
			else if($category=='watch')
			{
				$sql_watch = "SELECT * FROM watches WHERE product_id='$pid'";
				$result_watch = mysqli_query($conn,$sql_watch);
				$row_watch = mysqli_fetch_assoc($result_watch);
				$stock = $row_watch['stock'] - $qty;
				$sql_update = "UPDATE watches SET stock='$stock' WHERE product_id='$pid'";
				$result_update = mysqli_query($conn,$sql_update);
				$sub_total = (int)$qty*(int)$productrow['price']-(int)$qty*(int)$productrow['price']*$productrow['discount'];
				$sql_suborder = "INSERT INTO sub_order (order_id, product_id, sub_order_id, status, quantity, subtotal) VALUES ('$order_id', '$pid', '$suborder','Processing','$qty','$sub_total')";
				$suborder_result = mysqli_query($conn, $sql_suborder);
				$sql_delete = "DELETE FROM cart WHERE user_id='$user' and product_id='$pid'";
				$delete_result = mysqli_query($conn,$sql_delete);
				$suborder = $suborder + 1;
			}
			else if($category=='footwear')
			{
				$sql_footwear = "SELECT * FROM footwear WHERE product_id='$pid'";
				$result_footwear = mysqli_query($conn,$sql_footwear);
				$row_footwear = mysqli_fetch_assoc($result_footwear);
				$footwear_id = $row_footwear['footwear_id'];
				$size = $row['size'];
				$footwear_size_sql = "SELECT * FROM footwear_size WHERE footwear_id='$footwear_id' AND footwear_size='$size'";
				$footwear_size_sql_result = mysqli_query($conn,$footwear_size_sql);
				echo mysqli_error($conn);
				$footwear_size_sql_row = mysqli_fetch_assoc($footwear_size_sql_result);
				$stock = $footwear_size_sql_row['stock'] - $qty;
				$sql_update = "UPDATE footwear_size SET stock='$stock' WHERE footwear_id='$footwear_id ' AND footwear_size='$size'";
				$result_update = mysqli_query($conn,$sql_update);
				$sub_total = (int)$qty*(int)$productrow['price']-(int)$qty*(int)$productrow['price']*$productrow['discount'];
				$sql_suborder = "INSERT INTO sub_order (order_id, product_id, sub_order_id, status, quantity, subtotal, size) VALUES ('$order_id', '$pid', '$suborder','Processing','$qty', '$sub_total', '$size')";
				$suborder_result = mysqli_query($conn, $sql_suborder);
				$sql_delete = "DELETE FROM cart WHERE user_id='$user' AND product_id='$pid' AND size='$size'";
				$delete_result = mysqli_query($conn,$sql_delete);
				$suborder = $suborder + 1;
			}
		}
		$message = urlencode("Your order for ".$productrow['name']." has been received and is under Processing. You shall recieve an alert once it is shipped. Team EliteShoppy.");
		$url = "https://control.msg91.com/api/sendhttp.php?authkey=132727AshR9z6QU9Dg58416307&mobiles=".$mobile."&message=".$message."&sender=ELTSPY&route=4";
		file_get_contents($url);
		header("Location: customer_orders.php"); /* Redirect browser */
		exit();
	}
}
?>
