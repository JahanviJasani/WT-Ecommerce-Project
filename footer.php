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
		<div class="col-md-3 footer-left">
			<h2 style="margin-top: 0.1em"><a href="index.php"><span>E</span>lite Shoppy </a></h2>
			<p>The perfect platform for all your C2C business needs. For businesses and customers alike.</p>
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
								<p>+91 97699 83936</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:jahanvijasani.46@gmail.com"> jahanvijasani.46@gmail.com</a></p>
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
				</div>
				<div class="col-md-4 sign-gd flickr-post">
					<h4>Our <span>Products</span></h4>
					<ul>
					<?php
						$sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT 20";
						$result = mysqli_query($conn, $sql);
						$item_count = mysqli_num_rows($result);
						if ($item_count==0) {
							echo "<p style='text-align: center;'><b>No products to display</b></p>";
						} else {
							while (($row = mysqli_fetch_assoc($result))) {
							$pid = $row['product_id'];
							$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
							$imageresult = mysqli_query($conn, $imagesql);
							$imagerow = mysqli_fetch_assoc($imageresult);
							echo'<li><a href="single.php?pid='.$pid.'"><img class="resp" src="'.$imagerow['image_location'].'" alt=" " class="img-responsive" /></a></li>';
							}
						}
					?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="agile_newsletter_footer" style="margin-top: 1em;">
					<div class="col-sm-6 newsleft" style="width: 100%;">
				<h3 style="text-align: center;"><a id="seller_page_anchor" onclick="showSellerPageModal()" style="cursor: pointer; color: #000; border: 1px solid #2fdab8; padding: 5px; background-color: #2fdab8; border-radius: 10px;">CLICK HERE</a> TO GET YOUR OWN SELLER PAGE!</h3>
			</div>
		<div class="clearfix"></div>
	</div>
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