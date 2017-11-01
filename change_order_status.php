<?php
session_start();
error_reporting(0);
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

echo change_order_status($conn);

function change_order_status($conn)
{
	$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);	
	$sub_order_id = mysqli_real_escape_string($conn,$_POST['sub_order_id']);
	$order_status = mysqli_real_escape_string($conn,$_POST['order_status']);
	$sql_1 = "SELECT * FROM sub_order WHERE order_id='$order_id' AND sub_order_id='$sub_order_id'";
	$result_1 = mysqli_query($conn,$sql_1);
	$row_1 = mysqli_fetch_assoc($result_1);
	$pid = $row_1['product_id'];
	$sql_product = "SELECT * FROM product WHERE product_id='$pid'";
	$productresult = mysqli_query($conn, $sql_product);
	$productrow = mysqli_fetch_assoc($productresult);
	$category = $productrow['category'];
	if($order_status=='Cancelled')
	{
		$qty = $row_1['quantity'];
		if($category=='bag')
		{
			$sql_bag = "SELECT * FROM bags WHERE product_id='$pid'";
			$result_bag = mysqli_query($conn,$sql_bag);
			$row_bag = mysqli_fetch_assoc($result_bag);
			$stock = $row_bag['stock'] + $qty;
			$sql_update = "UPDATE bags SET stock='$stock' WHERE product_id='$pid'";
			$result_update = mysqli_query($conn,$sql_update);
		}
		else if($category=='watch')
		{
			$sql_watch = "SELECT * FROM watches WHERE product_id='$pid'";
			$result_watch = mysqli_query($conn,$sql_watch);
			$row_watch = mysqli_fetch_assoc($result_watch);
			$stock = $row_watch['stock'] + $qty;
			$sql_update = "UPDATE watches SET stock='$stock' WHERE product_id='$pid'";
			$result_update = mysqli_query($conn,$sql_update);
		}
		else if($category=='footwear')
		{
			$sql_footwear = "SELECT * FROM footwear WHERE product_id='$pid'";
			$result_footwear = mysqli_query($conn,$sql_footwear);
			$row_footwear = mysqli_fetch_assoc($result_footwear);
			$footwear_id = $row_footwear['footwear_id'];
			$size = $row_1['size'];
			$footwear_size_sql = "SELECT * FROM footwear_size WHERE footwear_id='$footwear_id' AND footwear_size='$size'";
			$footwear_size_sql_result = mysqli_query($conn,$footwear_size_sql);
			echo mysqli_error($conn);
			$footwear_size_sql_row = mysqli_fetch_assoc($footwear_size_sql_result);
			$stock = $footwear_size_sql_row['stock'] + $qty;
			$sql_update = "UPDATE footwear_size SET stock='$stock' WHERE footwear_id='$footwear_id ' AND footwear_size='$size'";
			$result_update = mysqli_query($conn,$sql_update);
		}
	}
	$user = "SELECT * FROM orders WHERE order_id='$order_id'";
	$user_result= mysqli_query($conn,$user);
	$user_row = mysqli_fetch_assoc($user_result);
	$mobile=$user_row['mobile'];
	$message = urlencode("Your order for ".$productrow['name']." has been ".$order_status.". Keep shopping\nTeam EliteShoppy.");
	$url = "https://control.msg91.com/api/sendhttp.php?authkey=132727AshR9z6QU9Dg58416307&mobiles=".$mobile."&message=".$message."&sender=ELTSPY&route=4";
	file_get_contents($url);
	$sql = "UPDATE sub_order SET status='$order_status' WHERE order_id='$order_id' AND sub_order_id='$sub_order_id'";
	$result = mysqli_query($conn,$sql);
	return $url;
}