<head>
<style type="text/css">
	.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before { 
		margin-top: -0.5em;
		margin-left: -1.2em;
	}
	.ban-top {
		background: url(images/inner1.jpg) no-repeat center;
	}
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
	#kys {
		cursor: pointer;
	}
	#knowYourSeller:before {
	    content: '';
	    height: 0;
	    position: absolute;
	    width: 0;
	    bottom: 100%;
	    right: 47%;
	    border: 10px solid transparent;
	    border-right-color: #2fdab8;
	    transform: rotate(90deg);
    z   -webkit-transform: rotate(90deg);
	}
	#knowYourSeller {
		display: none;
		z-index: 100;
		top: 6.5%;
		left: 16%;
		background-color: #fff;
		box-shadow: 7px 7px 25px #888888;
		position: absolute;
		padding: 5px;
		padding-top: 15px;
		padding-bottom: 15px;
		border: 2px solid #2fdab8;
		border-radius: 7px;
	}
</style>
</head>
<body>
<!-- header -->
<div class="header" id="home">

		<ul>
		    <?php
		    	
		    	$id = $sid;
		    	$sql_u = "SELECT * FROM users WHERE user_id='$id'";
		    	$user = mysqli_query($conn, $sql_u);
		    	$userRow=mysqli_fetch_assoc($user);
		    	$sid=$sid;
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
        		echo " <li><i class='fa fa-user-circle-o' aria-hidden='true'></i><a> Welcome to  ".$row1['first_name']."'s Shoppy</a></li>";
	            echo '
	            <li><i class="fa fa-info-circle" aria-hidden="true"></i> <p style="display:inline; font-size: 13px;" name="kys" id="kys" onmouseover="showSellerInfo()" onmouseout="hideSellerInfo()">Know your seller</p></li>
	            <li><i class="fa fa-phone" aria-hidden="true"></i> Call : '.$row1["mobile"].'</li>
	            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:'.$row1["email"].'">'.$row1["email"].'</a></li>
	            <li><i class="fa fa-shopping-bag" aria-hidden="true"></i> <a href="index.php">Elite Shoppy</a></li>
	            ';

					$mySQLdate=$row1['register_date'];
					$mydate=strtotime($mySQLdate);
					$phpdate=date("d-M-Y", $mydate);

					echo '<div name="knowYourSeller" id="knowYourSeller">
						<span style="text-align: center; display: block;"><b>Know Your Seller</b></span><hr style="margin: 3px; border-color: #999; border-width: 2px;"><b>Average Seller Rating :&nbsp;&nbsp;&nbsp;</b><span class="stars">'.$str.'</span><br>
						<b>Seller Email Id:&nbsp;&nbsp;&nbsp;</b>'.$row1["email"].'<br>
						<b>Seller Contact:&nbsp;&nbsp;&nbsp;</b>'.$row1["mobile"].'<br>
						<b>Seller Since:&nbsp;&nbsp;&nbsp;</b>'.$phpdate.'<br>
						<b>Elite Shoppy Seller Id:&nbsp;&nbsp;&nbsp;</b>'.$sid.'</div>
					</div>';
					?>
		</ul>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<!-- <form action="#" method="post">
					<input type="search" name="search" placeholder="Search here..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form> -->
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
			<?php
			$string1=$row1['first_name'];
			$arr1=str_split($string1);
			$string2=substr($string1, 1);
				echo"<h1 style='margin: 0em;'><a href='#' style='font-size: 1.1em;'><span>".$arr1[0]."</span>".$string2."'s Shoppy <i style='top: 49px; right: 8px;' class='fa fa-shopping-bag top_logo_agile_bag' aria-hidden='true'></i></a></h1>";
			?>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
			<ul class="social-nav model-3d-0 footer-social w3_agile_social">
			<li class="share">Share On : </li>
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
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav menu__list">
					<li class=" menu__item"><h3 style="color: #fff;font-size: 30px;text-transform: uppercase;">All products by <span style="color: #2fdab8;"><b><?php echo $row1["first_name"].' '.$row1["last_name"];?></b></span></h3></li>
					</ul>

				</div>
			  </div>
			</nav>	
		</div>
		<?php
		if(isset($_SESSION['user_id']))
		{
			$uid = $_SESSION['user_id'];
			$sql = "SELECT * FROM cart WHERE cart.user_id='$uid';";
			$result=mysqli_query($conn, $sql);
			$item_count = mysqli_num_rows($result);
			echo '<div class="top_nav_right">
				<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
							<form action="#" thod="post" class="last"> 
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							
								<button class="w3view-cart" type="button" id="cart"><a href="shopping-cart.php" style="color:black"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></button> 
								<span><span id="cart_count" class="badge badge-notify">'.$item_count.'</span></span>
							</form>  
	  
							</div>
			</div>';
		}
		else
		{
			echo '<div class="top_nav_right">
				<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
							<form action="#" thod="post" class="last"> 
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							
								<button class="w3view-cart" type="button" id="cart"><a href="shopping-cart.php" style="color:black"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></button> 
								<span id="cart_count"></span>
							</form>  
	  
							</div>
			</div>';
		}
		?>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
						<form action="functions.php" method="post" id="sign_in_form">
							<div class="styled-input" agile-styled-input-top">
								<input type="email" name="Email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="Password" required="">
								<label>Password</label>
								<span></span>
							</div>
							<div>
								<br>
								<input id="rememberme" type="checkbox" name="rememberme" class="checkbox-custom">
								<label for="rememberme" class="checkbox-custom-label" style="text-transform: none;">  Remember Me</label>
								<br><br>
								<span></span>
							</div>
							<input type="submit" name="login_submit" id="login_submit" value="Sign In">
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
						<form action="functions.php" method="POST" id="sign_up_form">
							<?php $date = date('Y-m-d');?>
      						<input type="hidden" name="currDate" value="<?php echo $date;?>">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="FName" required="">
								<label>First Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="LName" required="">
								<label>Last Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" id="password" name="password" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" id="password2" name="password2" onchange="validatePassword()" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input type="submit" name="signup_submit" id="signup_submit" value="Sign Up">
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
														<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->
<!-- Footwear Size Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
			</div>
			<div class="modal-body modal-body-sub_agile">
				<div style="padding-left: 1em;" class="col-md-8 modal_body_left modal_body_left1">
				<?php
				$user_id = $_SESSION['user_id'];
				if (isset($_GET['q7wgrzp84d'])) {
					$pid = $_GET['q7wgrzp84d'];
					$pNameSQL = "SELECT * FROM product WHERE product.product_id='$pid'";
					$pNameResult = mysqli_query($conn, $pNameSQL);
					$pNameRow = mysqli_fetch_assoc($pNameResult);
				}
				echo'<h3 style="margin-bottom: 1.3em;" class="agileinfo_sign">Please <span>Select A Size</span></h3><hr style="margin:0px;">
				<h4 style="text-transform: capitalize; font-size: 18px; color: #2fdab8; letter-spacing: 1px; font-weight: 600;">'.$pNameRow['name'].'</h4>
				<p style="color: #000; font-size: 16px; margin: .5em 0;"><span class="item_price"><span style="font-family:Arial;">&#8377;</span>'.$pNameRow['price'].'</span></p><hr style="-webkit-margin-before: 0.5em; -webkit-margin-after: 0.5em;">';
				?>
					<div class="sizeSelect">
					<h4 style="color: #000; font-size: 16px; font-weight: 600;"><span class="item_price"><span style="font-family:Arial;">Size</h4>
					<?php
					if (isset($_GET['q7wgrzp84d'])) {
						$getSizeSQL = "SELECT * FROM footwear_size WHERE footwear_size.footwear_id IN (SELECT footwear_id FROM footwear WHERE footwear.product_id='$pid')";
						$getSizeResult = mysqli_query($conn, $getSizeSQL);
						while ($getSizeRow = mysqli_fetch_assoc($getSizeResult)) {
							echo '<form action="#" method="GET" style="margin-bottom: 10px; display: inline-block; margin-right: 10px;">
									<fieldset>
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="business" value=" " />
										<input type="hidden" name="item_name" value="'.$pNameRow['brand'].' '.$pNameRow['name'].'" />
										<input type="hidden" name="product_id" value="'.$pNameRow['product_id'].'" />
										<input type="hidden" name="amount" value="'.$pNameRow['price'].'" />
										<input type="hidden" name="discount_amount" value="0.00" />
										<input type="hidden" name="currency_code" value="INR" />
										<input type="hidden" name="return" value=" " />
										<input type="hidden" name="cancel_return" value=" " />';
										if ($getSizeRow['stock']==0) {
											echo '<input type="button" style="min-width: 50px;" name="footwearSize" value="'.$getSizeRow["footwear_size"].'" class="button" data-dismiss="modal" onclick="add_to_cart(\''.$pid.'\',\''.$user_id.'\');" disabled />';
										} elseif ($getSizeRow['stock']>0) {
											echo '<input type="button" style="min-width: 50px;" name="footwearSize" value="'.$getSizeRow["footwear_size"].'" class="button" data-dismiss="modal" onclick="add_to_cart(\''.$pid.'\',\''.$user_id.'\'); remove_queryString();" />';
										}
									echo '</fieldset>
								</form>';
							//echo '<span> Size : '.$getSizeRow["footwear_size"].'</span><br>';
						}
					}
					?>
					</div>
				</div>
				<div class="col-md-4 modal_body_right modal_body_right1" style="border-right: 1px solid #d1cfcf; border-top: 1px solid #d1cfcf;">
							
						<?php
							if (isset($_GET['q7wgrzp84d'])) {
								$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
								$imageresult = mysqli_query($conn, $imagesql);
								$imagerow = mysqli_fetch_assoc($imageresult);

								echo '<img style="margin-top:0px; " src="'.$imagerow['image_location'].'">';
							}

						?>

				</div>
				<div style="border: 1px solid #d1cfcf;" class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>


<!-- Seller registration successful/failed modal -->

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
			</div>
				<div class="modal-body modal-body-sub_agile" style="border: 1px solid #ccc; margin: 10px; border-radius: 5px; padding-bottom: 0px;">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<?php
						if (isset($_GET['seller_reg_success'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Seller Registration<span> Successful</span></h3><hr style="border-color: #ccc;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal" onclick="resetvalues1();"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a><span> to continue</span></h3>';
						} elseif (isset($_GET['seller_reg_fail'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Seller Registration<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;">Please<span> Try Again</span></h3>';
						} elseif (isset($_GET['alreadyregistered'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Seller Registration<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;">Email id<span> is already registered with us.</span></h3>';
						} elseif (isset($_GET['error'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Seller Registration<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;">Please <span>try after some time.</span></h3>';
						}
					?>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>

<!-- Customer registration successful/failed modal -->

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
			</div>
				<div class="modal-body modal-body-sub_agile" style="border: 1px solid #ccc; margin: 10px; border-radius: 5px; padding-bottom: 0px;">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<?php
						if (isset($_GET['customer_reg_success'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Customer Registration<span> Successful</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal" onclick="resetvalues1();"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a><span> to continue</span></h3>';
						} elseif (isset($_GET['customer_reg_fail'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Customer Registration<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-toggle="modal" data-target="#myModal2" data-dismiss="modal" onclick="resetvalues1();"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Click Here </a><span> To Try Again</span></h3>';
						} elseif (isset($_GET['userexists'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Customer Registration<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;">Email id<span> is already registered with us.</span></h3>';
						} elseif (isset($_GET['customer_reg_error'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Customer Registration<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;">Please <span>try after some time.</span></h3>';
						}
					?>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>

<!-- User login modal -->
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
			</div>
				<div class="modal-body modal-body-sub_agile" style="border: 1px solid #ccc; margin: 10px; border-radius: 5px; padding-bottom: 0px;">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<?php
						if (isset($_GET['user_not_found'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Email id<span> not recognized</span></h3><hr style="border-color: #2fdab8;">
								`';
						} elseif (isset($_GET['login_error'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Incorrect<span> Email or Password</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal" onclick="resetvalues1();"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Click here </a><span> to try again</span></h3>';
						}
					?>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>

<!--Seller footwear stock change modal -->
<div class="modal fade" id="myModal7" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
			</div>
				<div class="modal-body modal-body-sub_agile" style="border: 1px solid #ccc; margin: 10px; border-radius: 5px; padding-bottom: 0px;">
				<div class="col-md-8 modal_body_left modal_body_left1">
					<?php
						$sid = $_SESSION['seller_id'];
						$updatefid = $_GET['footwear_id_stock_update'];
						
						$getNameSQL = "SELECT * FROM product WHERE product.product_id='$updatefid'";
						$getNameResult = mysqli_query($conn, $getNameSQL);
						$getNameRow = mysqli_fetch_assoc($getNameResult);


						$checksql = "SELECT seller_id FROM product WHERE product.product_id='$updatefid'";
						$checkresult = mysqli_query($conn, $checksql);
						$checkrow = mysqli_fetch_assoc($checkresult);

						if ($checkrow["seller_id"]==$sid) {
							$sql2 = "SELECT * from footwear_size WHERE footwear_size.footwear_id IN (SELECT footwear_id FROM footwear WHERE footwear.product_id='$updatefid')";
							$result2 = mysqli_query($conn, $sql2);
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Update<span> Stock</span></h3><hr style="border-color: #d1cfcf;">
								<h4 style="text-transform: capitalize; font-size: 18px; color: #2fdab8; text-align: center; letter-spacing: 1px; font-weight: 600;">'.$getNameRow['name'].'</h4>';
							echo '<form action="functions.php" method="POST"><fieldset id="sizedisplay" disabled="disabled">';
							while ($row2 = mysqli_fetch_assoc($result2)) {
								echo '<b>Size : '.$row2["footwear_size"].'</b>&nbsp;&nbsp;&nbsp;<input type="number" name="'.$row2["footwear_size"].'" value="'.$row2["stock"].'" style="width: 50px; margin-bottom: 8px;"><br>';
							}
							echo '<input type="hidden" name="product_id" value="'.$updatefid.'">
								<input type="hidden" value="Update Stock" name="footwear_stock_update" style="margin: 8px;" id="sub_but">';
							echo '</fieldset></form>';
							echo '<input type="submit" value="Update Stock" style="margin: 8px;" onclick="modifyfootwearstock()" id="mod_but">';
						} else {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">You cannot update<span> this product</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: none; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;">This product <span> is not owned by you</span></h3>';
						}

					?>
					<div class="clearfix"></div>
				</div>
				<?php
				echo '<div class="col-md-4 modal_body_right modal_body_right1" style="position: absolute; bottom: 0%; right: 0;">';
							
								$imagesql = "SELECT * FROM images WHERE images.product_id='$updatefid' AND images.image_location LIKE '%primary%'";
								$imageresult = mysqli_query($conn, $imagesql);
								$imagerow = mysqli_fetch_assoc($imageresult);

								echo '<img style="margin-top:0px; " src="'.$imagerow['image_location'].'">';

						

							echo '</div>';
							?>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>


<!-- Product stock modify modal -->
<div class="modal fade" id="myModal8" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
			</div>
				<div class="modal-body modal-body-sub_agile" style="border: 1px solid #ccc; margin: 10px; border-radius: 5px; padding-bottom: 0px;">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<?php
						if (isset($_GET['stock_update_success'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Stock Update<span> Success</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-dismiss="modal" onclick="remove_queryString()"> Click here </a><span> to continue</span></h3>';
						} elseif (isset($_GET['stock_update_fail'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Stock Update<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-dismiss="modal" onclick="remove_queryString()"> Click here </a><span> to try again</span></h3>';
						} elseif (isset($_GET['invalid_seller'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">Stock Update<span> Failed</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: none; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;">This product <span> is not owned by you</span></h3>';
						}
					?>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>

<!-- Get seller product page modal -->
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="remove_queryString()">&times;</button>
			</div>
				<div class="modal-body modal-body-sub_agile" style="border: 1px solid #ccc; margin: 10px; border-radius: 5px; padding-bottom: 0px;">
				<div class="col-md-12 modal_body_left modal_body_left1">
					<?php
						if (!isset($_SESSION['user_id'])) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">You are not<span> logged in.</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal" onclick="resetvalues1();"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Click here </a><span> to log in</span></h3><span style="display: block; text-align: center; "><b>OR</b></span>
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="sellwithus.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a><span> as a seller</span></h3>';
						} elseif ($_SESSION['user_type']==0) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">You do not have<span> a seller account</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="#" data-dismiss="modal" onclick="remove_queryString()"> Click here </a><span> to continue</span></h3>';
						} elseif ($_SESSION['user_type']==1) {
							echo '<h3 class="agileinfo_sign" style="margin-bottom: 5px; text-align: center;">View Your<span> Seller Page</span></h3><hr style="border-color: #2fdab8;">
								<h3 class="agileinfo_sign" style="text-transform: capitalize; font-size: 18px; letter-spacing: 1px; font-weight: 600; margin-top: 36px; text-align: center;"><a href="sellerpage.php?seller_id='.$_SESSION['seller_id'].'"><i class="fa fa-external-link" aria-hidden="true"></i> Click here </a><span> to visit </span></h3>';
						}
					?>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //Modal content-->
	</div>
</div>
