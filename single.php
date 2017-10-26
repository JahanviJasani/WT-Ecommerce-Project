<?php
include('functions.php');
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
	    display: block;
	    background: url(star.png) 0 -16px repeat-x;
	    width: 80px;
	    height: 16px;
	}

	span.stars span {
	    background-position: 0 0;
	}
	#addReview {
		display: none;
	}
	#meters li {
		list-style: none;
	}
	.progress_p {
		font-size: 1em;
		margin: 0.1em 0 0.5em;
		color: #23527c;
	}
	.styled progress {
	  -webkit-appearance: none;
	  -moz-appearance: none;
	  appearance: none;
	  width: 20%;
	  height: 20px;
	  border: none;
	  background: #f3f3f3;
	  border-radius: 3px;
	  box-shadow: 0 2px 3px rgba(0,0,0,0.2) inset;
}

	.styled progress::-webkit-progress-bar {
	  background: #f3f3f3;
	  box-shadow: 0 2px 3px rgba(0,0,0,0.2) inset;
	  border-radius: 1px;
	}

	.styled progress::-webkit-progress-value {
	  background-color: #2fdab8;
	  border-radius: 3px;
	}

	.styled progress::-moz-progress-bar {
	  background-color: #2fdab8;
	  border-radius: 3px;
	}
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
			<h3>Product <span>Page </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Product Page</li>
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
		$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
		$imageresult = mysqli_query($conn, $imagesql);
		$imagerow = mysqli_fetch_assoc($imageresult);
		$num="SELECT COUNT(*) AS number FROM review WHERE review.product_id='$pid'";
		$numResult = mysqli_query($conn, $num);
		$numprintRow=mysqli_fetch_assoc($numResult);
		$ratingSQL = "SELECT ROUND((AVG(rating)),1) AS star_rating FROM review WHERE review.product_id='$pid'";
		$ratingResult = mysqli_query($conn, $ratingSQL);
		$ratingRow = mysqli_fetch_assoc($ratingResult);
		$str = $ratingRow["star_rating"];
		if ($str==NULL) {
			$str=0;
		}
		echo '<!-- banner-bootom-w3-agileits -->
		<div class="banner-bootom-w3-agileits">
			<div class="container-fluid">
			     <div class="col-md-4 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							
							<ul class="slides">

								<li data-thumb="'.$imagerow['image_location'].'">
									<div class="thumb-image"> <img src="'.$imagerow['image_location'].'" data-imagezoom="true" class="img-responsive"> </div>
								</li>';
								$imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location NOT LIKE '%primary%' LIMIT 5";
								$imageresult = mysqli_query($conn, $imagesql);
								$count = 0;
								while($imagerow = mysqli_fetch_assoc($imageresult)) {
									echo '<li data-thumb="'.$imagerow['image_location'].'">
									<div class="thumb-image"> <img src="'.$imagerow['image_location'].'" data-imagezoom="true" class="img-responsive"> </div>
									</li>';	
									if($count == 3) {
										echo "<div class='clearfix'></div>";
									}
									$count++;
								}
							echo '</ul>
							<div class="clearfix"></div>
						</div>	
					</div>
				</div>
				<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h4>'.$row1['brand'].'</h4>
					<h3 style="width: 70%;">'.$row1['name'].'</h3>
					<p><span class="item_price"><span style="font-family:Arial;">&#8377;</span>'.$row1['price'].'</span></p>
					<div class="rating1">
						<b>Average Customer Rating :&nbsp;&nbsp;&nbsp;</b><span class="stars" style="display:inline-block;">'.$str.'</span>
						<span style="color: #000; font-weight:600;">('.$str.' out of 5 stars)</span>
						<br>';
						if($numprintRow['number'] == 0) {
										echo'<a href="#addR" onclick="review_add()">Be the first to write a review</a><hr style="margin-top: 0.5em">';
									} else {
										echo'<a href="reviews.php?pid='.$pid.'">'.$numprintRow['number'].' customer reviews</i></a><hr style="margin-top: 0.5em">';
									}
						echo'</div>';
					$sql2 = "SELECT * FROM footwear WHERE product_id='$pid'";
					$result2 = mysqli_query($conn, $sql2);
					$row2 = mysqli_fetch_assoc($result2);
					$id=$row2['footwear_id'];
					$sql="SELECT * FROM footwear_size WHERE footwear_size.footwear_id='$id'";
					$result=mysqli_query($conn, $sql);
					if ($row1['category']=='footwear') {	
						echo '<div class="occasional">
							<h4><b>Size :</b></h4>
							<select id="country1" onchange="sizecheck()" class="frm-field sect">';
							echo '<option value="-1" name="-1">Select</option>';
							while ($row=mysqli_fetch_assoc($result)) {
								echo'<option value="'.$row["stock"].'" name="'.$row["footwear_size"].'"';
								if ($row['stock']==0) {
									echo ' disabled';
								}
								echo '>IND/UK - '.$row["footwear_size"].'</option>';
							}
						echo'</select>

						<p><span id="stockshow"></span></p>
						</div>';
					} elseif ($row1['category']=='bag') {
						$bagsql = "SELECT * FROM bags WHERE bags.product_id='$pid'";
						$bagresult = mysqli_query($conn, $bagsql);
						$bagrow = mysqli_fetch_assoc($bagresult);
						
						if ($bagrow['stock']==0) {
							echo '<p style="margin: 0.5em 0 0;color: #B12704;font-size: 1em;line-height: 1.5em; font-weight: 700;">Out of Stock</p>';
						} elseif ($bagrow['stock']==1) {
							echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 1 left in Stock</p>';
						} elseif ($bagrow['stock']==2) {
							echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 2 left in Stock</p>';
						} elseif ($bagrow['stock']>2) {
							echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">In Stock</p>';
						}

						if ($row1['colour']!=NULL) {
							echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Colour : &nbsp;&nbsp;</b>'.$row1['colour'].'</p>';
						}
						if ($bagrow['material']!=NULL) {
							echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Material : &nbsp;&nbsp;</b>'.$bagrow['material'].'</p>';
						}

					} elseif ($row1['category']=='watch') {
						$watchsql = "SELECT * FROM watches WHERE watches.product_id='$pid'";
						$watchresult = mysqli_query($conn, $watchsql);
						$watchrow = mysqli_fetch_assoc($watchresult);
						
						if ($watchrow['stock']==0) {
							echo '<p style="margin: 0.5em 0 0;color: #B12704;font-size: 1em;line-height: 1.5em; font-weight: 700;">Out of Stock</p>';
						} elseif ($watchrow['stock']==1) {
							echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 1 left in Stock</p>';
						} elseif ($watchrow['stock']==2) {
							echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 2 left in Stock</p>';
						} elseif ($watchrow['stock']>2) {
							echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">In Stock</p>';
						}

						if ($row1['colour']!=NULL) {
							echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Colour : &nbsp;&nbsp;</b>'.$row1['colour'].'</p>';
						}
						if ($watchrow['case_material']!=NULL) {
							echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Case Material : &nbsp;&nbsp;</b>'.$watchrow['case_material'].'</p>';
						}
						if ($watchrow['band_material']!=NULL) {
							echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Band Material : &nbsp;&nbsp;</b>'.$watchrow['band_material'].'</p>';
						}

					}
					echo '<div class="single-right-left" id="right-box">
				<div style="border-radius: 4px; border: 1px #ddd solid; background-color: #fff;">
                <div style="border-radius: 4px; position: relative; padding: 14px 18px;">
                	<h5 style="line-height: 16px;  text-align:center;">'.$row1["name"].'</h5>
                	<p style="font-size:13px; text-align:center;"><span class="item_price"><span style="font-family:Arial;">&#8377;</span>'.$row1['price'].'</span></p>
                	<h5 style=" text-align:center;">To buy, select a <strong>Size</strong></h5>
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="margin:0.5em 2em 1em;">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="Wing Sneakers">
									<input type="hidden" name="amount" value="650.00">
									<input type="hidden" name="discount_amount" value="1.00">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">
									<input type="button" name="submit" value="Add to cart" class="button" onclick="add_to_cart(\''.$pid.'\',\''.$user_id.'\',\''.$row["footwear_size"].'\');" />
								</fieldset>
							</form>											
					</div>
					<div class="snipcart-details top_brand_home_details hvr-outline-out" style="margin: -0.2em 2em 1em;">
							<form action="checkout1.php" method="post">
									<input type="submit" value="Buy Now" id="bn" class="button" disabled>
							</form>											
					</div>
                </div>
            	</div>
				</div>
				<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Specifications</li>
							<li>Description</li>
							<li>Reviews</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">';
							if ($row1['category']=='bag') {

								if ($bagrow['length']!=0.00) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Length : &nbsp;&nbsp;</b>'.$bagrow['length'].' cm</p>';
								}
								if ($bagrow['width']!=0.00) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Width : &nbsp;&nbsp;</b>'.$bagrow['width'].' cm</p>';
								}
								if ($bagrow['height']!=0.00) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Height : &nbsp;&nbsp;</b>'.$bagrow['height'].' cm</p>';
								}
								if ($bagrow['weight']!=0.00) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Weight : &nbsp;&nbsp;</b>'.$bagrow['weight'].' cm</p>';
								}
								if ($bagrow['bag_capacity']!=0.00) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Capacity : &nbsp;&nbsp;</b>'.$bagrow['bag_capacity'].' cm</p>';
								}

							} elseif ($row1['category']=='footwear') {
								if ($row2['material']!=NULL) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Material : &nbsp;&nbsp;</b>'.$row2['material'].'</p>';
								}
								if ($row1['colour']!=NULL) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Colour : &nbsp;&nbsp;</b>'.$row1['colour'].'</p>';
								}
							} elseif ($row1['category']=='watch') {
								if ($watchrow['case_shape']!=NULL) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Case Shape : &nbsp;&nbsp;</b>'.$watchrow['case_shape'].'</p>';
								}
								if ($watchrow['clasp_type']!=NULL) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Clasp Type : &nbsp;&nbsp;</b>'.$watchrow['clasp_type'].'</p>';
								}
								if ($watchrow['dial_colour']!=NULL) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Dial Colour : &nbsp;&nbsp;</b>'.$watchrow['dial_colour'].'</p>';
								}
								if ($watchrow['display_type']!=NULL) {
									echo '<p style="margin: 0.5em 0 0;color: #545454;font-size: 0.9em;line-height: 1.5em;"><b>Display Type : &nbsp;&nbsp;</b>'.$watchrow['display_type'].'</p>';
								}

							}
							echo '</div>
						</div>
						<!--//tab_one-->
						<!--//tab-two-->
						   <div class="tab2">

							<div class="single_page_agile_its_w3ls">
							  <h6 style="font-size: 1em;color: #2fdab8;font-weight: 600;">'.$row1['name'].'</h6>
							   <p style="margin: 2em 0 0;color: #545454;font-size: 0.9em;line-height: 2em;">'.$row1['product_description'].'</p>
							</div>
						</div>
						<!--//tab-three-->
						<div class="tab3">
							
							<div class="single_page_agile_its_w3ls" style="padding-top: 0px !important;">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
									<h4 style="color: #000; margin-bottom: 20px;"><b>Customer reviews</b></h4>
									<span class="stars" style="display:inline-block;">'.$str.'</span>
									<span style="color: #000; font-weight:600;">('.$str.' out of 5 stars)</span>
									<br>';
									if($numprintRow['number'] == 0) {
										echo'<a href="#addR" onclick="review_add()">Be the first to write a review</a>';
									} else {
										echo'<a href="reviews.php?pid='.$pid.'">See all '.$numprintRow['number'].' customer reviews <i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
									}
									echo'
									<div id="meters"><br>';
										$count="SELECT COUNT(*) AS c FROM review WHERE review.rating='5' AND review.product_id='$pid'";
										$countResult=mysqli_query($conn, $count);
										$countrow=mysqli_fetch_assoc($countResult);
										echo'
										<ul>
											<li><span class="styled"><span class="progress_p">5 star</span> <progress value="'.$countrow['c'].'" max="10"></progress> '.$countrow['c'].'</span></li>';
										$count="SELECT COUNT(*) AS c FROM review WHERE review.rating='4' AND review.product_id='$pid'";
										$countResult=mysqli_query($conn, $count);
										$countrow=mysqli_fetch_assoc($countResult);
										echo'
											<li><span class="styled"><span class="progress_p">4 star</span> <progress value="'.$countrow['c'].'" max="10"></progress> '.$countrow['c'].'</span></li>';	
										$count="SELECT COUNT(*) AS c FROM review WHERE review.rating='3' AND review.product_id='$pid'";
										$countResult=mysqli_query($conn, $count);
										$countrow=mysqli_fetch_assoc($countResult);
										echo'
											<li><span class="styled"><span class="progress_p">3 star</span> <progress value="'.$countrow['c'].'" max="10"></progress> '.$countrow['c'].'</span></li>';
										$count="SELECT COUNT(*) AS c FROM review WHERE review.rating='2' AND review.product_id='$pid'";
										$countResult=mysqli_query($conn, $count);
										$countrow=mysqli_fetch_assoc($countResult);
										echo'
											<li><span class="styled"><span class="progress_p">2 star</span> <progress value="'.$countrow['c'].'" max="10"></progress> '.$countrow['c'].'</span></li>';
										$count="SELECT COUNT(*) AS c FROM review WHERE review.rating='1' AND review.product_id='$pid'";
										$countResult=mysqli_query($conn, $count);
										$countrow=mysqli_fetch_assoc($countResult);
										echo'
											<li><span class="styled"><span class="progress_p">1 star</span> <progress value="'.$countrow['c'].'" max="10"></progress> '.$countrow['c'].'</span></li>
										</ul>
									</div><hr>';
									if($numprintRow['number'] != 0) {
										echo'
											<h4 style="color: #000; margin-bottom: 20px;"><b>Top Customer Reviews</b></h4>';
											$ctr=0;
											$reviewSQL = "SELECT * FROM review WHERE review.product_id='$pid' ORDER BY review.review_id DESC";
											$reviewResult = mysqli_query($conn, $reviewSQL);

											while (($reviewRow = mysqli_fetch_assoc($reviewResult)) && ($ctr<2)) {
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
			<div class="w3_agile_latest_arrivals">
			<h3 class="wthree_text_info">Featured <span>Arrivals</span></h3>
			<div class="container">
				   <?php
				    $pid=$_GET['pid'];
					$sql="SELECT * FROM product WHERE product_id=$pid";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
				  	if($row['category'] == 'bag') {
						$sql = "SELECT * FROM product WHERE product.category='bag' ORDER BY product_id DESC";
						$result = mysqli_query($conn, $sql);
						$count = 0;

						$item_count = mysqli_num_rows($result);

						if ($item_count==0) {
							echo "<p style='text-align: center;'><b>No products to display</b></p>";
						} else {
							while (($row = mysqli_fetch_assoc($result)) && ($count<4) ) {
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
												<h4><a href="single.phppid='.$pid.'">'.$row['name'].'</a></h4>';
														if($row['discount'] != NULL) {
															$new_price=$row['price'] - ($row['discount']*$row['price']);
															echo'<div class="info-product-price">
																<span class="item_price">&#8377;'.$new_price.'</span>
																<del>'.$row['price'].'</del>
																</div>';
														}
														else {
															echo'<div class="info-product-price">
																<span class="item_price">&#8377;'.$row1['price'].'</span>
																</div>';
														}
														echo'
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
					} elseif($row['category'] == 'footwear') {
						$sql = "SELECT * FROM product WHERE product.category='footwear' ORDER BY product_id DESC";
						$result = mysqli_query($conn, $sql);
						$count = 0;

						$item_count = mysqli_num_rows($result);

						if ($item_count==0) {
							echo "<p style='text-align: center;'><b>No products to display</b></p>";
						} else {
							while (($row = mysqli_fetch_assoc($result)) && ($count<4) ) {
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
												<h4><a href="single.phppid='.$pid.'">'.$row['name'].'</a></h4>';
														if($row['discount'] != NULL) {
															$new_price=$row['price'] - ($row['discount']*$row['price']);
															echo'<div class="info-product-price">
																<span class="item_price">&#8377;'.$new_price.'</span>
																<del>'.$row['price'].'</del>
																</div>';
														}
														else {
															echo'<div class="info-product-price">
																<span class="item_price">&#8377;'.$row1['price'].'</span>
																</div>';
														}
														echo'
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

					}elseif($row['category'] == 'watch') {
						$sql = "SELECT * FROM product WHERE product.category='watch' ORDER BY product_id DESC LIMIT 4";
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
												<h4><a href="single.phppid='.$pid.'">'.$row['name'].'</a></h4>';
														if($row['discount'] != NULL) {
															$new_price=$row['price'] - ($row['discount']*$row['price']);
															echo'<div class="info-product-price">
																<span class="item_price">&#8377;'.$new_price.'</span>
																<del>'.$row['price'].'</del>
																</div>';
														}
														else {
															echo'<div class="info-product-price">
																<span class="item_price">&#8377;'.$row1['price'].'</span>
																</div>';
														}
														echo'
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
				?>
							<div class="clearfix"> </div>
					<!--//slider_owl-->
		         </div>
	        </div>
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
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
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
	function sizecheck() {
		var atc = document.getElementById("atc");
		var bn = document.getElementById("bn");
		var size = document.getElementById("country1").value;
		var sizedisplay = document.getElementById("stockshow");
		sizedisplay.style.fontSize = "1em";
		sizedisplay.style.lineHeight= "1.5em";
		sizedisplay.style.fontWeight= "700";
		if (size==0) {
			sizedisplay.innerHTML = "Out of Stock";
			sizedisplay.style.color = "#B12704";
		} else if (size==1) {
			sizedisplay.innerHTML = "Only 1 left in Stock";
			sizedisplay.style.color = "#008A00";
		} else if (size==2) {
			sizedisplay.innerHTML = "Only 2 left in Stock";
			sizedisplay.style.color = "#008A00";
		} else if (size>2) {
			sizedisplay.innerHTML = "In Stock";
			sizedisplay.style.color = "#008A00";
		}
		if (size==-1) {
			console.log("xyz");
		}
	}
	function review_add() {
		var rev = document.getElementById("addR");
		var addrev = document.getElementById("addReview");
		addrev.style.display="block";
	}
</script>
<script type="text/javascript">
	$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
  $('input[name="rating"]').val(this.value);
});

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
if (isset($_GET['add_review'])) {
	echo '<script>
	$(window).load(function(){
        $("#myModal13").modal("show");
    });
	</script>';
}

?>