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

echo change_order_status($conn);

function change_order_status($conn)
{
	$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);	
	$sub_order_id = mysqli_real_escape_string($conn,$_POST['sub_order_id']);
	$order_status = mysqli_real_escape_string($conn,$_POST['order_status']);
	$sql = "UPDATE sub_order SET status='$order_status' WHERE order_id='$order_id' AND sub_order_id='$sub_order_id'";
	$result = mysqli_query($conn,$sql);
}