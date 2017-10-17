<?php 
echo pincode_api();

function pincode_api(){	
 		$pincode = $_POST['pincode'];
 		$url = 'http://postalpincode.in/api/pincode/';
 		$url = $url.$pincode;
 		$json = file_get_contents($url);
 		return $json;
 	}
?>