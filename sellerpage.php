<?php
include('functions.php');
error_reporting(0);
$url=$_GET['seller'];
$sidSQL = "SELECT seller_id FROM sellerpage WHERE sellerpage.seller_url='$url'";
$sidResult = mysqli_query($conn, $sidSQL);
$sidRow = mysqli_fetch_assoc($sidResult);
$sid = $sidRow['seller_id'];
$id = $sid;
$sql_u = "SELECT * FROM users WHERE user_id='$id'";
$user = mysqli_query($conn, $sql_u);
$userRow=mysqli_fetch_assoc($user);
$sid=$sid;
$sql1="SELECT * FROM users WHERE users.user_id IN (SELECT user_id FROM seller WHERE seller.seller_id='$sid')";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $row1['first_name']."'s Shoppy"?></title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/backend.js"></script>
<!-- //tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style-default.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/backend.js"></script>
<script>
	function showSellerInfo() {
		var knowYourSeller = document.getElementById("knowYourSeller");
		knowYourSeller.style.display = "block";
	}
	function hideSellerInfo() {
		var knowYourSeller = document.getElementById("knowYourSeller");
		knowYourSeller.style.display = "none";
	}
</script>
</head>
<?php
if (!isset($_GET['seller'])) {
	header('Location: index.php');
}
$url=$_GET['seller'];
$sidSQL = "SELECT seller_id FROM sellerpage WHERE sellerpage.seller_url='$url'";
$sidResult = mysqli_query($conn, $sidSQL);
$sidRow = mysqli_fetch_assoc($sidResult);

$sid = $sidRow['seller_id'];

include('seller_custom_header.php');

$sid = $sidRow['seller_id'];

$sql1="SELECT * FROM users WHERE users.user_id IN (SELECT user_id FROM seller WHERE seller.seller_id='$sid')";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$rateSQL = "SELECT AVG(rating) AS rate_num FROM review WHERE review.product_id IN (SELECT product_id FROM product WHERE product.seller_id='$sid')";
$rateResult = mysqli_query($conn, $rateSQL);
$rateRow = mysqli_fetch_assoc($rateResult);
$str = $rateRow["rate_num"];
if ($str==NULL) {
	$str=0;
}
?>
<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
		<!-- banner-bootom-w3-agileits -->
		<div class="banner-bootom-w3-agileits" style="padding-top: 2em; padding-bottom: 0em;">
			<div class="container-fluid">
				<div class="col-md-12 single-right-left simpleCart_shelfItem">
					
				</div>

				<div class="new_arrivals_agile_w3ls_info" style="padding-top:0; padding-bottom: 0em;"> 
					<div class="container" style="margin-left: 0px; margin-right: 0px; width: 100%;">
							<div id="horizontalTab">
									<ul class="resp-tabs-list">
										<li> Watches</li>
										<li> Footwear</li>
										<li> Bags</li>
										<li>All</li>
									</ul>
								<div class="resp-tabs-container">
								<!--/tab_one-->
									<div class="tab1">
										

										<?php
										if(isset($_SESSION['user_id'])) {
											$sql = "SELECT * FROM product WHERE product.category='watch' AND product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.php?pid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																		<form action="#" method="GET">
																			<fieldset>
																				<input type="hidden" name="cmd" value="_cart" />
																				<input type="hidden" name="add" value="1" />
																				<input type="hidden" name="business" value=" " />
																				<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																				<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																				<input type="hidden" name="amount" value="'.$row['price'].'" />
																				<input type="hidden" name="discount_amount" value="0.00" />
																				<input type="hidden" name="currency_code" value="INR" />
																				<input type="hidden" name="return" value=" " />
																				<input type="hidden" name="cancel_return" value=" " />
																				<input type="button" name="submit" value="Add to cart" class="button" onclick="add_to_cart(\''.$pid.'\',\''.$_SESSION['user_id'].'\');" />
																			</fieldset>
																		</form>
																	</div>							
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}
										}
										else {
											$sql = "SELECT * FROM product WHERE product.category='watch' AND product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.php?pid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																			<form action="#" method="GET">
																				<fieldset>
																					<input type="hidden" name="cmd" value="_cart" />
																					<input type="hidden" name="add" value="1" />
																					<input type="hidden" name="business" value=" " />
																					<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																					<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																					<input type="hidden" name="amount" value="'.$row['price'].'" />
																					<input type="hidden" name="discount_amount" value="0.00" />
																					<input type="hidden" name="currency_code" value="INR" />
																					<input type="hidden" name="return" value=" " />
																					<input type="hidden" name="cancel_return" value=" " />
																					<input type="button" name="submit" value="Add to cart" class="button" data-toggle="modal" data-target="#myModal2"/>
																				</fieldset>
																			</form>
																		</div>							
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}
										}
										?>
										<!-- Item end -->
										<div class="clearfix"></div>
									</div>
									<!--//tab_one-->
									<!--/tab_two-->
									<div class="tab2">
									<!-- idhar footwear ayega -->

									<?php
									if(isset($_SESSION['user_id'])) {
											$sql = "SELECT * FROM product WHERE product.category='footwear' AND product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.php?pid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																						<form action="functions.php" method="GET">
																							
																								<input type="hidden" name="cmd" value="_cart" />
																								<input type="hidden" name="add" value="1" />
																								<input type="hidden" name="business" value=" " />
																								<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																								<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																								<input type="hidden" name="amount" value="'.$row['price'].'" />
																								<input type="hidden" name="discount_amount" value="0.00" />
																								<input type="hidden" name="currency_code" value="INR" />
																								<input type="hidden" name="return" value=" " />
																								<input type="hidden" name="cancel_return" value=" " />
																								<input type="hidden" name="pid" value="'.$pid.'" />
																								<input type="submit" name="add_to_cart_footwear" value="Add to cart" class="button" />
																							
																						</form>
																					</div>
																										
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}
										}
										else {
											$sql = "SELECT * FROM product WHERE product.category='footwear' AND product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.php?pid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																						<form action="#" method="GET">
																							<fieldset>
																								<input type="hidden" name="cmd" value="_cart" />
																								<input type="hidden" name="add" value="1" />
																								<input type="hidden" name="business" value=" " />
																								<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																								<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																								<input type="hidden" name="amount" value="'.$row['price'].'" />
																								<input type="hidden" name="discount_amount" value="0.00" />
																								<input type="hidden" name="currency_code" value="INR" />
																								<input type="hidden" name="return" value=" " />
																								<input type="hidden" name="cancel_return" value=" " />
																								<input type="button" name="submit" value="Add to cart" class="button" data-toggle="modal" data-target="#myModal2"/>
																							</fieldset>
																						</form>
																					</div>
																										
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}
										}
										?>


									<div class="clearfix"></div>
								</div>
							 <!--//tab_two-->
								<div class="tab3">
											
								
									<?php
									if(isset($_SESSION['user_id'])) {
											$sql = "SELECT * FROM product WHERE product.category='bag' AND product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.phppid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																						<form action="#" method="GET">
																							<fieldset>
																								<input type="hidden" name="cmd" value="_cart" />
																								<input type="hidden" name="add" value="1" />
																								<input type="hidden" name="business" value=" " />
																								<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																								<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																								<input type="hidden" name="amount" value="'.$row['price'].'" />
																								<input type="hidden" name="discount_amount" value="0.00" />
																								<input type="hidden" name="currency_code" value="INR" />
																								<input type="hidden" name="return" value=" " />
																								<input type="hidden" name="cancel_return" value=" " />
																								<input type="button" name="submit" value="Add to cart" class="button" onclick="add_to_cart(\''.$pid.'\',\''.$_SESSION['user_id'].'\');" />
																							</fieldset>
																						</form>
																					</div>
																										
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}
										}
										else {
											$sql = "SELECT * FROM product WHERE product.category='bag' AND product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.phppid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																						<form action="#" method="GET">
																							<fieldset>
																								<input type="hidden" name="cmd" value="_cart" />
																								<input type="hidden" name="add" value="1" />
																								<input type="hidden" name="business" value=" " />
																								<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																								<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																								<input type="hidden" name="amount" value="'.$row['price'].'" />
																								<input type="hidden" name="discount_amount" value="0.00" />
																								<input type="hidden" name="currency_code" value="INR" />
																								<input type="hidden" name="return" value=" " />
																								<input type="hidden" name="cancel_return" value=" " />
																								<input type="button" name="submit" value="Add to cart" class="button" data-toggle="modal" data-target="#myModal2"/>
																							</fieldset>
																						</form>
																					</div>
																										
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}
										}
										?>


										<div class="clearfix"></div>
									</div>


								<div class="tab4">
									<?php
									if(isset($_SESSION['user_id'])) {
											$sql = "SELECT * FROM product WHERE product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.php?pid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																						<form action="#" method="GET">
																							<fieldset>
																								<input type="hidden" name="cmd" value="_cart" />
																								<input type="hidden" name="add" value="1" />
																								<input type="hidden" name="business" value=" " />
																								<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																								<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																								<input type="hidden" name="amount" value="'.$row['price'].'" />
																								<input type="hidden" name="discount_amount" value="0.00" />
																								<input type="hidden" name="currency_code" value="INR" />
																								<input type="hidden" name="return" value=" " />
																								<input type="hidden" name="cancel_return" value=" " />
																								<input type="button" name="submit" value="Add to cart" class="button" onclick="add_to_cart(\''.$pid.'\',\''.$_SESSION['user_id'].'\');" />
																							</fieldset>
																						</form>
																					</div>
																										
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}
										}
										else {
											$sql = "SELECT * FROM product WHERE product.seller_id='$sid' ORDER BY product_id DESC";
											$result = mysqli_query($conn, $sql);
											$count = 0;

											$item_count = mysqli_num_rows($result);

											if ($item_count==0) {
												echo "<p style='text-align: center;'><b>No products to display</b></p>";
											} else {
												while (($row = mysqli_fetch_assoc($result))) {
													$pid = $row['product_id'];
													$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
													$imageresult = mysqli_query($conn, $imagesql);
													$imagerow = mysqli_fetch_assoc($imageresult);
													echo '<!-- Item start -->
														<div class="col-md-3 product-men">
															<div class="men-pro-item simpleCart_shelfItem">
																<div class="men-thumb-item">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front">
																	<img src="'.$imagerow['image_location'].'" alt="" class="pro-image-back">
																		<div class="men-cart-pro">
																			<div class="inner-men-cart-pro">
																				<a href="single.php?pid='.$pid.'" class="link-product-add-cart">Quick View</a>
																			</div>
																		</div>
																		<span class="product-new-top">New</span>
																		
																</div>
																<div class="item-info-product ">
																	<h4><a href="single.php?pid='.$pid.'">'.$row['name'].'</a></h4>
																	<div class="info-product-price">
																		<span class="item_price">&#8377;'.$row['price'].'</span>
																		
																	</div>
																	<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																						<form action="#" method="GET">
																							<fieldset>
																								<input type="hidden" name="cmd" value="_cart" />
																								<input type="hidden" name="add" value="1" />
																								<input type="hidden" name="business" value=" " />
																								<input type="hidden" name="item_name" value="'.$row['brand'].' '.$row['name'].'" />
																								<input type="hidden" name="product_id" value="'.$row['product_id'].'" />
																								<input type="hidden" name="amount" value="'.$row['price'].'" />
																								<input type="hidden" name="discount_amount" value="0.00" />
																								<input type="hidden" name="currency_code" value="INR" />
																								<input type="hidden" name="return" value=" " />
																								<input type="hidden" name="cancel_return" value=" " />
																								<input type="button" name="submit" value="Add to cart" class="button" data-toggle="modal" data-target="#myModal2"/>
																							</fieldset>
																						</form>
																					</div>
																										
																</div>
															</div>
														</div>
														<!-- Item end -->';

													$count++;
												}
											}	
										}
										?>


									<div class="clearfix"></div>
								</div>
								</div>
							</div>	
						</div>
					</div>
				<!-- //new_arrivals --> 

							
				 			<div class="clearfix"> </div>
							<!-- /new_arrivals --> 
			
		<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
			
	       </div>
 </div>
<!--//single_page-->
<!--/grids-->
<div class="coupons">
	<div class="coupons-grids text-center">
		<div class="w3layouts_mail_grid">
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-truck" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>FREE SHIPPING</h3>
					<p>Fast and quick delivery at your doorstep.</p>
				</div>
			</div>
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-headphones" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>24/7 SUPPORT</h3>
					<p>Always there to lend a hand.</p>
				</div>
			</div>
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>MONEY BACK GUARANTEE</h3>
					<p>Complete peace of mind. And wallet.</p>
				</div>
			</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-gift" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>FREE GIFT COUPONS</h3>
					<p>Shop more to save more. Doesn't get better.</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--grids-->
<?php
include('seller_custom_footer.php');
?>

<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js --> 
	<!-- single -->
<script src="js/imagezoom.js"></script>
<!-- single -->
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<script type="text/javascript">
	$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
  $('input[name="rating"]').val(this.value);
});
	function review_add() {
		var rev = document.getElementById("addR");
		var addrev = document.getElementById("addReview");
		addrev.style.display="block";
	}
</script>
<!-- <p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 1 left in Stock</p> -->

<script>
	$.fn.stars = function() {
	    return $(this).each(function() {
	        // Get the value
	        var val = parseFloat($(this).html());
	        // Make sure that the value is in 0 - 5 range, multiply to get width
	        var size = Math.max(0, (Math.min(5, val))) * 16;
	        // Create stars holder
	        var $span = $('<span />').width(size);
	        // Replace the numerical value with stars
	        $(this).html($span);
	    });
	}
	$(function() {
	    $('span.stars').stars();
	});
</script>
<?php
if (isset($_GET['getsellerpage'])) {
	echo '<script>
	$(window).load(function(){
        $("#myModal9").modal("show");
    });
	</script>';
}
?>

<script>
	function showSellerInfo() {
		var knowYourSeller = document.getElementById("knowYourSeller");
		knowYourSeller.style.display = "block";
	}
	function hideSellerInfo() {
		var knowYourSeller = document.getElementById("knowYourSeller");
		knowYourSeller.style.display = "none";
	}
</script>