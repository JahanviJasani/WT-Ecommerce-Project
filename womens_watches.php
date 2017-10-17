<?php
include('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template |Women's</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/backend.js"></script>
</head>
<?php
include('header.php');
?>
		<div class="banner-bootom-w3-agileits">
	<div class="container-fluid">
         <!-- mens -->
		<div class="col-md-3 products-left">
			<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
					<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Categories</label>
						<ul>
								<ul class="sublist">
									<li><a id="117" href="#" onclick="addURL('Watch','Men',id)">Men's</a></li>
									<li><a id="118" href="#" onclick="addURL('Watch','Women',id)">Women's</a></li>
								</ul>
						</ul>
					</li><br>
					<li><input type="checkbox" id="item-1" checked="checked" /><label for="item-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> New Arrivals</label>
						<ul>
							<ul class="sublist">
								<li><a id="119" href="#" onclick="addURL('Watch','Men',id)">Men's</a></li>
								<li><a id="120" href="#" onclick="addURL('Watch','Women',id)">Women's</a></li>
							</ul>
						</ul>
					</li>
				</ul>
			</div>
			<div class="community-poll">
				<h4>Refine By </h4>
				<div class="swit form">
				<ul class="tree-list-pad">	
					<li><input type="checkbox" id="item-2" style="position: absolute; opacity: 0;" checked="checked" /><label for="item-3"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Display Type</label>
						<ul>
							<ul class="sublist">
								<li><a id="dt1" href="#" onclick="getdisplaytype(id)"> Analog</a></li>
								<li><a id="dt2" href="#" onclick="getdisplaytype(id)"> Digital</a></li>
								<li><a id="dt3" href="#" onclick="getdisplaytype(id)"> Analog-Digital</a></li>
								<li><a id="dt4" href="#" onclick="getdisplaytype(id)"> Touchscreen</a></li><br>
								
							</ul>
						</ul>
					</li>
					<li><input type="checkbox" id="item-2" style="position: absolute; opacity: 0;" checked="checked" /><label for="item-3"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Prices</label>
						<ul>
							<ul class="sublist">
								<li><a id="pr1" href="#" onclick="getpricerange(id)"> Under &#8377 1,000</a></li>
								<li><a id="pr2" href="#" onclick="getpricerange(id)"> &#8377 1,000 - &#8377 2,000</a></li>
								<li><a id="pr3" href="#" onclick="getpricerange(id)"> &#8377 2,000 - &#8377 3,500</a></li>
								<li><a id="pr4" href="#" onclick="getpricerange(id)"> &#8377 3,500 - &#8377 5,000</a></li>
								<li><a id="pr5" href="#" onclick="getpricerange(id)"> &#8377 5,000 - &#8377 10,000</a></li><br>

								<form method="get" action="#" id="min-max">
								<span class="a-color-base s-ref-small-padding-left s-ref-price-currency s-small-margin-left">₹</span>
								<input type="text" maxlength="9" id="low-price" placeholder="Min" name="low-price" class="a-input-text a-spacing-top-mini s-ref-price-range s-ref-price-padding" aria-label="Min">
								<span class="a-color-base s-ref-small-padding-left s-ref-price-currency s-small-margin-left">₹</span>
								<input type="text" maxlength="9" id="high-price" placeholder="Max" name="high-price" class="a-input-text a-spacing-top-mini s-ref-price-range s-ref-price-padding s-small-margin-left" aria-label="Max"><span style="margin-left: 4px;" class="a-button a-spacing-top-mini s-small-margin-left" id="a-autoid-20"><span class="a-button-inner">
								<span class="a-button-text" aria-hidden="true" id="a-autoid-20-announce">Go</span></span></span>
								</form>
								
							</ul>
						</ul>
					</li>
				</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-9 products-right">
			<h5>Women's <span>Watches</span></h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="order" onchange="change_sort_order(id)" class="frm-field required sect">
						<?php

						echo '<option value="default"'; if (!isset($_GET['sortorder'])) {echo 'selected';} echo '>Default</option>
						<option value="name_asc"'; if (isset($_GET['sortorder']) && $_GET['sortorder']=="name_asc") { echo 'selected';} echo '>Name(A - Z)</option> 
						<option value="name_desc"';  if (isset($_GET['sortorder']) && $_GET['sortorder']=="name_desc") { echo 'selected';} echo '>Name(Z - A)</option>
						<option value="price_desc"';  if (isset($_GET['sortorder']) && $_GET['sortorder']=="price_desc") { echo 'selected';} echo '>Price(High - Low)</option>
						<option value="price_asc"';  if (isset($_GET['sortorder']) && $_GET['sortorder']=="price_asc") { echo 'selected';} echo '>Price(Low - High)</option>';

						?>
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-top">
				<div class="clearfix"></div>
			</div>


					<?php
					$category=$_GET['category'];
					//$type = $_GET['type'];

					$sortby = "ORDER BY product.product_id DESC";

					if (isset($_GET['sortorder'])) {
						$order = $_GET['sortorder'];
						if ($order=="default") {
							$sortby = "ORDER BY product.product_id DESC";
						} elseif ($order=="name_asc") {
							$sortby = "ORDER BY product.name ASC";
						} elseif ($order=="name_desc") {
							$sortby = "ORDER BY product.name DESC";
						} elseif ($order=="price_asc") {
							$sortby = "ORDER BY product.price ASC";
						} elseif ($order=="price_desc") {
							$sortby = "ORDER BY product.price DESC";
						}
					}

					if (isset($_GET['displaytype'])) {
						$display_type = $_GET['displaytype'];
						$sql1 = "SELECT * FROM product,watches WHERE product.product_id=watches.product_id AND product.category='$category' AND watches.display_type='$display_type' AND product.gender='women'"." ".$sortby;
					} else {
						$sql1 = "SELECT * FROM product,watches WHERE product.product_id=watches.product_id AND product.category='$category' AND product.gender='women'"." ".$sortby;
					}


					$res1 = mysqli_query($conn, $sql1);
					$count=0;

					$minprice=0;
					$maxprice=9999999;
					if (isset($_GET['range'])) {
						switch ($_GET['range']) {
						    case 1:
						        $minprice=0;
						        $maxprice=1000;
						        break;
						    case 2:
						        $minprice=1000;
						        $maxprice=2000;
						        break;
						    case 3:
						        $minprice=2000;
						        $maxprice=3500;
						        break;
						    case 4:
						        $minprice=3500;
						        $maxprice=5000;
						        break;
						    case 5:
						        $minprice=5000;
						        $maxprice=10000;
						        break;
						    default:
						        $minprice=0;
						        $maxprice=10000;
						        break;
						}
					}

					if(mysqli_num_rows($res1) == 0) {
						echo "No Products to display";
					}
					else {
						while(($row1=mysqli_fetch_assoc($res1))) {
							$pid = $row1['product_id'];
							$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
							$imageresult = mysqli_query($conn, $imagesql);
							$imagerow = mysqli_fetch_assoc($imageresult);
							if ($row1['price']>=$minprice && $row1['price']<=$maxprice) {
								echo '	<!-- Item start -->
												<div class="col-md-4 product-men">
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
															<h4><a href="single.php?pid='.$pid.'">'.$row1['name'].'</a></h4>
															<div class="info-product-price">
																<span class="item_price">&#8377;'.$row1['price'].'</span>
																
															</div>
															<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
																				<form action="#" method="GET">
																					<fieldset>
																						<input type="hidden" name="cmd" value="_cart" />
																						<input type="hidden" name="add" value="1" />
																						<input type="hidden" name="business" value=" " />
																						<input type="hidden" name="item_name" value="'.$row1['brand'].' '.$row1['name'].'" />
																						<input type="hidden" name="product_id" value="'.$row1['product_id'].'" />
																						<input type="hidden" name="amount" value="'.$row1['price'].'" />
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
									if ($count==0) {
											echo "No Products to display";
									}
								}
					?>
					
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
	<div class="clearfix"></div>
		</div>
	</div>
</div>	
<!-- //mens -->
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
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->
<?php
include('footer.php');
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
<script src="js/responsiveslides.min.js"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!---->
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
						<script type="text/javascript" src="js/jquery-ui.js"></script>
					 <!---->
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
