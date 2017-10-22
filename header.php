<head>
<style type="text/css">
	.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before { 
		margin-top: -0.5em;
		margin-left: -1.2em;
	}
</style>
</head>
<body>
<!-- header -->
<div class="header" id="home">

		<ul>
		    <?php
		    if (!isset($_SESSION['user_id'])) {
		    	echo '<li> <a href="#" data-toggle="modal" data-target="#myModal" onclick="resetvalues1()"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
				<li> <a href="#" data-toggle="modal" data-target="#myModal2" onclick="resetvalues2()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
				<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
				<li><i class="fa fa-money"></i><a href="sellwithus.php">  Sell With Us</a></li>';
		    } else {
		    	echo '<li><i class="fa fa-user-circle-o" aria-hidden="true"></i> Welcome, '.$_SESSION['user_name'].'</li>';
		    	$id = $_SESSION['user_id'];
		    	$sql_u = "SELECT * FROM users WHERE user_id='$id'";
		    	$user = mysqli_query($conn, $sql_u);
		    	$userRow=mysqli_fetch_assoc($user);
	            if ($_SESSION['user_type']==0) {
	            	echo " <li><i class='fa fa-shopping-cart' aria-hidden='true'></i><a href='customer_orders.php'> ".$userRow['first_name']."'s Shoppy</a></li>";
	            } elseif ($_SESSION['user_type']==1) {
	            	echo " <li><i class='fa fa-user' aria-hidden='true'></i><a href='seller_orders.php'>  ".$userRow['first_name']."'s Shoppy</a></li>";
	            }
	            echo '<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
	            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
            	<li><i class="fa fa-sign-out" aria-hidden="true"></i> <a href="functions.php?logout=true" name="user_logout.php">Logout</a></li>';
		    }
			?>
		</ul>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form action="#" method="post">
					<input type="search" name="search" placeholder="Search here..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1 style="margin: 0em;"><a href="index.php"><span>E</span>lite Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
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
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Footwear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="#"><img src="uploads/125_3.jpg" alt=" "/></a>
										<a href="#"><img src="uploads/141_4.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><strong>MEN'S</strong></li>
											<li><a id="1" href="#" onclick="addURL('Footwear','Casual',id)">Casual Shoes</a></li>
											<li><a id="2" href="#" onclick="addURL('Footwear','Canvas',id)">Canvas Shoes</a></li>
											<li><a id="3" href="#" onclick="addURL('Footwear','Loafers',id)">Loafers</a></li>
											<li><a id="4" href="#" onclick="addURL('Footwear','Sandals',id)">Sandals</a></li>
											<li><a id="5" href="#" onclick="addURL('Footwear','Boots',id)">Boots</a></li>
											<li><a id="6" href="#" onclick="addURL('Footwear','Sneakers',id)">Sneakers</a></li>
											<li><a id="7" href="#" onclick="addURL('Footwear','S&F',id)">Slippers & Flip Flops</a></li>
											<li><a id="8" href="#" onclick="addURL('Footwear','Athletic',id)">Athletic Shoes</a></li>
											<li><a id="9" href="#" onclick="addURL('Footwear','Running',id)">Running Shoes</a></li>
											<li><a id="10" href="#" onclick="addURL('Footwear','Others',id)">Others</a></li>
											<li><a id="all_mf" href="#" onclick="addURL('Footwear','All',id)">All</a></li>
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><strong>WOMEN'S</strong></li>
											<li><a id="11" href="#" onclick="addURL('Footwear','Canvas',id)">Canvas Shoes</a></li>
											<li><a id="12" href="#" onclick="addURL('Footwear','Boots',id)">Boots</a></li>
											<li><a id="13" href="#" onclick="addURL('Footwear','Kitten',id)">Kitten Heels</a></li>
											<li><a id="14" href="#" onclick="addURL('Footwear','Gladiators',id)">Gladiators</a></li>
											<li><a id="15" href="#" onclick="addURL('Footwear','FlipFlops',id)">Flip Flops</a></li>
											<li><a id="16" href="#" onclick="addURL('Footwear','Wedges',id)">Wedges</a></li>
											<li><a id="17" href="#" onclick="addURL('Footwear','Stiletto',id)">Stiletto</a></li>
											<li><a id="18" href="#" onclick="addURL('Footwear','Pumps',id)">Pumps</a></li>
											<li><a id="19" href="#" onclick="addURL('Footwear','Loafers',id)">Loafers</a></li>
											<li><a id="20" href="#" onclick="addURL('Footwear','Others',id)">Others</a></li>
											<li><a id="all_wf" href="#" onclick="addURL('Footwear','All',id)">All</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bags <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><strong>MEN'S</strong></li>
											<li><a id="21" href="#" onclick="addURL('Bag','Briefcase',id)">Briefcase</a></li>
											<li><a id="22" href="#" onclick="addURL('Bag','Messenger',id)">Messenger Bag</a></li>
											<li><a id="23" href="#" onclick="addURL('Bag','Duffel',id)">Duffel</a></li>
											<li><a id="24" href="#" onclick="addURL('Bag','Backpacks',id)">Backpacks</a></li>
											<li><a id="25" href="#" onclick="addURL('Bag','Casual',id)">Casual Bags</a></li>
											<li><a id="26" href="#" onclick="addURL('Bag','Others',id)">Others</a></li>
											<li><a id="all_mb" href="#" onclick="addURL('Bag','All',id)">All</a></li>
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><strong>WOMEN'S</strong></li>
											<li><a id="27" href="#" onclick="addURL('Bag','Crossbody',id)">Crossbody</a></li>
											<li><a id="28" href="#" onclick="addURL('Bag','Tote',id)">Tote Bags</a></li>
											<li><a id="29" href="#" onclick="addURL('Bag','Clutch',id)">Clutch</a></li>
											<li><a id="30" href="#" onclick="addURL('Bag','Satchel',id)">Satchel</a></li>
											<li><a id="31" href="#" onclick="addURL('Bag','Casual',id)">Casual Bags</a></li>
											<li><a id="124" href="#" onclick="addURL('Bag','Backpacks',id)">Backpacks</a></li>
											<li><a id="32" href="#" onclick="addURL('Bag','Others',id)">Others</a></li>
											<li><a id="all_wb" href="#" onclick="addURL('Bag','All',id)">All</a></li>
										</ul>
									</div>
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="womens.php"><img src="uploads/47_5.jpg" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="menu__item dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Watches <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a id="33" href="#" onclick="addURL('Watch','Men',id)">Men's</a></li>
									<li><a id="34" href="#" onclick="addURL('Watch','Women',id)">Women's</a></li>
								</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>
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
