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

echo remove_from_cart($conn);

function remove_from_cart($conn){	
	$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);	
	$uid = mysqli_real_escape_string($conn,$_POST['user_id']);
	$sql = "DELETE FROM cart WHERE cart.user_id='$uid' AND cart.product_id='$product_id';";
	$result=mysqli_query($conn, $sql);
	$sql = "SELECT * FROM cart WHERE cart.user_id='$uid';";
	$result=mysqli_query($conn, $sql);
	$item_count = mysqli_num_rows($result);
	return $item_count;
} 

?>