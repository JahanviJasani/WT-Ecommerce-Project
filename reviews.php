<?php
include('functions.php');
date_default_timezone_set("Asia/Kolkata");
?>
<!DOCTYPE html>
<html>
<head>
<title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
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
<style>
	.rating {
	  display: inline-block;
	  position: relative
	}

	.rating label {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 100%;
	  cursor: pointer;
	}

	.rating label:last-child {
	  position: static;
	}

	.rating label:nth-child(1) {
	  z-index: 5;
	}

	.rating label:nth-child(2) {
	  z-index: 4;
	}

	.rating label:nth-child(3) {
	  z-index: 3;
	}

	.rating label:nth-child(4) {
	  z-index: 2;
	}

	.rating label:nth-child(5) {
	  z-index: 1;
	}

	.rating label input {
	  position: absolute;
	  top: 20%;
	  left: 0;
	  opacity: 0;
	}

	.rating label .icon {
	  float: left;
	  color: transparent;
	  font-size: 2em;
	}

	.rating label:last-child .icon {
	  color: #000;
	}

	.rating:not(:hover) label input:checked ~ .icon,
	.rating:hover label:hover input ~ .icon {
	  color: #2fdab8;
	}

	.rating label input:focus:not(:checked) ~ .icon:last-child {
	  color: #000;
	  text-shadow: 0 0 5px #FD4;
	}
	span.stars, span.stars span {
	    display: inline-block;
	    background: url(star.png) 0 -16px repeat-x;
	    width: 80px;
	    height: 16px;
	}
	span.stars span {
	    background-position: 0 0;
	}
	.resp-tab-active:before {
		left: 50%;
	}
	#addReview {
		display: none;
	}
</style>
</head>
<?php
include('header.php');
?>
<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Product <span>Reviews </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Product Reviews</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<?php
		$pid=$_GET['pid'];
		$sql1="SELECT * FROM product WHERE product_id=$pid";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$ratingSQL = "SELECT AVG(rating) AS star_rating FROM review WHERE review.product_id='$pid'";
		$ratingResult = mysqli_query($conn, $ratingSQL);
		$ratingRow = mysqli_fetch_assoc($ratingResult);
		$str = $ratingRow["star_rating"];
		if ($str==NULL) {
			$str=0;
		}
		?>
		<!-- banner-bootom-w3-agileits -->
		<div class="banner-bootom-w3-agileits">
			<div class="container-fluid">
				<div class="col-md-12 single-right-left simpleCart_shelfItem">
					<?php

					$psql = "SELECT * FROM product WHERE product.product_id='$pid'";
					$presult = mysqli_query($conn, $psql);
					$prow = mysqli_fetch_assoc($presult);
					echo '<h3 style="width: 70%;">'.$prow["name"].'</h3>
					<p><span class="item_price"><span style="font-family:Arial;">&#8377;</span>'.$prow["price"].'</span></p>
					<div class="rating1">
						<b>Average Customer Rating :&nbsp;&nbsp;&nbsp;</b><span class="stars">'.$str.'</span>
					</div>
					<p style="margin-bottom: 0px; margin-top: 20px;"><a href="single.php?pid='.$pid.'">Go back to product page <i class="fa fa-reply" aria-hidden="true"></i></a></p>
				<div class="responsive_tabs_agileits" style="margin-top: 40px;"> 
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li style="width: 100%;">All Reviews</li>
					</ul>
					<div class="resp-tabs-container">
						<div class="tab1">
							
							<div class="single_page_agile_its_w3ls" style="padding-top: 0px !important;">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
									<h3 style="color: #000; margin-bottom: 20px;"><b>Most recent reviews</b></h3>';
									$ctr=0;
									$reviewSQL = "SELECT * FROM review WHERE review.product_id='$pid' ORDER BY review.review_id DESC";
									$reviewResult = mysqli_query($conn, $reviewSQL);

									while ($reviewRow = mysqli_fetch_assoc($reviewResult)) {
									$uid = $reviewRow["user_id"];
									$nameSQL = "SELECT * FROM users WHERE users.user_id='$uid'";
											$nameResult = mysqli_query($conn, $nameSQL);
											$nameRow = mysqli_fetch_assoc($nameResult);
											$mySQLdate=$reviewRow['rev_date'];
											$mydate=strtotime($mySQLdate);
											$phpdate=date("d-m-y", $mydate);
											echo '<div class="bootstrap-tab-text-grid-right" style="float: left; width: 100%;">
													<ul style="margin-bottom: 5px;">
														<li';
														if ($reviewRow["rating"]>3) {
															echo ' style="color: #008A00"';
														} elseif ($reviewRow["rating"]==3) {
															echo ' style="color: #FFBB00"';
														} elseif ($reviewRow["rating"]) {
															echo ' style="color: #B12704"';
														}
														echo '><b>Rated : </b><span class="stars" style="display:inline-block;">'.$reviewRow["rating"].'</span><span style="color: #000; font-weight:400; font-size: 0.95em;"> ('.$reviewRow["rating"].' out of 5 stars)</span></li><br>
														<li>By <span style="color:#337ab7"> '.$nameRow["first_name"].' '.$nameRow["last_name"].'</span> on '.$phpdate.' </li>
														<li>
														</li><br>
														<li style="color: #fc636b;text-transform: uppercase; margin-top: 0.5em;"><b>"'.$reviewRow["review_title"].'"</b></li>
													</ul>
													<p style="margin-top: 0px; margin-bottom: 10px; color:#000;">'.$reviewRow["review"].'</p>';
										if ($reviewRow!=0) {
											echo '<hr>';
										}

										echo '</div>
										<div class="clearfix"> </div>';
										$ctr++;
									}
									if ($ctr==0) {
										echo '<h4 style="color:#999">No reviews yet. Be the first one to review!</h4>';
									}
						            echo '</div>';
						             if (isset($_SESSION['user_id'])) {
										 echo '<h4 style="margin-bottom: 0px; cursor:pointer; color: #2fdab8" id="addR" onclick="review_add()">Click here to add a review</h4>
											<div class="add-review" id="addReview">
											<h4 style="margin-top:1.2em;">Give Your Rating : </h4>
											<form class="rating" style="display: inline-block;margin-top: -0.4em;">
											  <label>
											    <input type="radio" name="stars" value="1" />
											    <span class="icon">★</span>
											  </label>
											  <label>
											    <input type="radio" name="stars" value="2" />
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											  </label>
											  <label>
											    <input type="radio" name="stars" value="3" />
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											    <span class="icon">★</span>   
											  </label>
											  <label>
											    <input type="radio" name="stars" value="4" />
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											  </label>
											  <label>
											    <input type="radio" name="stars" value="5" />
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											    <span class="icon">★</span>
											  </label>
											</form>
											<form action="functions.php" method="post" style="width: 100%;">
													<input type="hidden" name="product_id" value="'.$pid.'">
													<input type="text" name="title" required placeholder="Add a title" style="width: 100%;">
													<input type="hidden" name="rating" required min="1" max="5" step=1> 
													<textarea name="review" required placeholder="Add your review here"></textarea>
													<input type="submit" name="review_submit" value="SEND">
											</form>
										</div>';
									}
									echo '
								 </div>
								 
							 </div>
						 </div>
					</div>
				</div>	
			</div>
				</div>
				
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
			
		<!-- //new_arrivals --> ';
		?>
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

<!-- ORIGINAL WALA STAR

	<span class="starRating">
		<input id="rating5" type="radio" name="rating" value="5">
		<label for="rating5">5</label>
		<input id="rating4" type="radio" name="rating" value="4">
		<label for="rating4">4</label>
		<input id="rating3" type="radio" name="rating" value="3" checked="">
		<label for="rating3">3</label>
		<input id="rating2" type="radio" name="rating" value="2">
		<label for="rating2">2</label>
		<input id="rating1" type="radio" name="rating" value="1">
		<label for="rating1">1</label>
	</span>
 -->
 <?php
if (isset($_GET['getsellerpage'])) {
    echo '<script>
    $(window).load(function(){
        $("#myModal9").modal("show");
    });
    </script>';
}
?>