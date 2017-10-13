<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>

<style type="text/css">
.hero-image {
	background-image: url("images/hero-image.jpeg");
	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
	padding-top: 0em;
  	z-index: 0;
}
.hero-image-bg {
  	position: relative;
  	padding-top: 20em;
	background: rgba(0,0,0,0.5);
	z-index: 1;
}
.hero-image .hero-text h2 {
	font-size: 33px;
	text-align: center;
 	position: absolute;
  	top: 50%;
  	left: 50%;
  	transform: translate(-50%, -50%);
  	color: #fff;
}
.footer {
	position: absolute;
	top: 200%;
}

	</style>
</head>
<?php
include('header.php');
?>
<!--hero-image-->
	<div class="hero-image">
		<div class="hero-image-bg">
  			<div class="hero-text">
    			<h2>Looking For a Great Business Opportunity?</h2>
  			</div>
  		</div>
	</div>

<!--//hero-image-->
<!-- login -->
<div class="signup__container">
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__content text-center">
      <h1 class="heading--primary">Welcome to <span>E</span>lite Shoppy.</h1><br>
      <h2 class="heading--secondary">Are you ready to join the elite?</h2>
    </div>
    <div class="signup__overlay"></div>
  </div>
  <div class="container__child signup__form">
    <form action="functions.php" method="POST">
      <div class="form-group">
        <label for="name">First Name</label>
        <input class="form-control" type="text" name="fname" id="fname" placeholder="John" required />
      </div>
      <div class="form-group">
        <label for="name">Last Name</label>
        <input class="form-control" type="text" name="lname" id="lname" placeholder="Doe" required />
      </div>
      <div class="form-group">
        <label for="email">Email (This will be your username) </label>
        <input class="form-control" type="email" name="email" id="email" placeholder="john.doe@example.com" required />
      </div>
      <div class="form-group">
        <label for="email">Bank Account Number</label>
        <input class="form-control" type="text" name="account_num" id="account_num" placeholder="Enter your Bank Account Number over here" required />
      </div>
      <div class="form-group">
        <label for="email">Bank Name</label>
        <input class="form-control" type="text" name="bank" id="bank" placeholder="Enter your Bank Name over here" required />
      </div>
      <div class="form-group">
        <label for="email">Bank IFSC</label>
        <input class="form-control" type="text" name="ifsc" id="ifsc" placeholder="Enter your Bank IFSC over here" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="********" required />
      </div>
      <div class="form-group">
        <label for="passwordRepeat">Repeat Password</label>
        <input class="form-control" type="password" name="passwordRepeat" id="passwordRepeat" placeholder="********" required />
      </div>

      <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input name="seller_reg"class="btn btn--form" type="submit" value="Register" />
          </li>
        </ul>
      </div>
    </form>  
  </div>
</div>
<!-- //login -->

<?php
include('footer.php');
?>

<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->	

<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
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