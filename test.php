<?php
$email='arnavjalui@gmail.com';
include('functions.php');
$sql="SELECT * FROM users WHERE users.email='arnav@jalui.com'";
$result = mysqli_query($conn, $sql);
if ($result) {
	echo 'successful';
} else {
	echo 'unsuccessful';
}