<head>
<style type="text/css">
.resp{
    display: block;
    width: 53.23px;
    height: 53.23px;
}
</style>
</head>
<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left"><?php

			$sql1="SELECT * FROM users WHERE users.user_id IN (SELECT user_id FROM seller WHERE seller.seller_id='$sid')";
				$result1 = mysqli_query($conn, $sql1);
				$row2 = mysqli_fetch_assoc($result1);


		 	$string1 = $row1['first_name'];
			 $arr1 = str_split($string1);
			 $string2 = substr($string1, 1);
			 echo' <h2 style="margin-top: 0.1em"><a href="#"><span> '.$arr1[0].'</span>'.$string2.'';?>'s shoppy</a></h2>
			<p><?php
			$sql2 = "SELECT seller_desc FROM sellerpage WHERE sellerpage.seller_id='$sid'";
			$result2 = mysqli_query($conn, $sql2);
			$row2 = mysqli_fetch_assoc($result2);
			$desc = $row2['seller_desc'];
			echo $desc;
			echo'</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-3 sign-gd">
					<h4>Quick <span>Links</span> </h4>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="mens.php">Watches</a></li>
						<li><a href="womens.php">Footwear</a></li>
						<li><a href="typography.php">Bags</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-5 sign-gd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>+91'.$row1['mobile'].'</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:'.$row1["email"].'">'.$row1["email"].'</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>JVPD Scheme, Juhu, Vile Parle (West), Mumbai 400056
								
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>';
				?>
				<div class="col-md-4 sign-gd flickr-post">
					<h4><?php echo $string1;?>'s <span>Products</span></h4>
					<?php
						$seller_id_no = $sid;
						$imSQL = "SELECT image_location FROM images WHERE images.image_location LIKE '%primary%' AND images.product_id IN (SELECT product_id FROM product WHERE product.seller_id='$seller_id_no')";
						$imResult = mysqli_query($conn, $imSQL);
						$imCtr = 0;
						echo '<ul>';
						while (($imRow = mysqli_fetch_assoc($imResult)) && ($imCtr<20)) {
							echo '<li><a href="single.php"><img class="resp" src="'.$imRow["image_location"].'" alt=" " class="img-responsive" /></a></li>';
							$imCtr++;
						}
					?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<p class="copy-right">&copy 2017 Elite shoppy. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div>
<!-- //footer -->


<?php
	if (isset($_GET['getsellerpage'])) {
	echo '<script>
	$(window).load(function(){
        $("#myModal9").modal("show");
    });
	</script>';
}
?> 