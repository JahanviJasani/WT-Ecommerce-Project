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
