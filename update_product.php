<?php
include('functions.php');
error_reporting(0);
if (!(isset($_SESSION['user_id']) && $_SESSION['user_type']==1)) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | About :: w3layouts</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style-default.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/Product.js"></script>
<script src="js/backend.js"></script>
<style type="text/css">
	select {
		display: inline-block;
	}
	form p {
		padding: 10px;
	}
	h3 {
		color: #000;
		padding-left: 10px;
	}
	.form-name {
		display: inline-block;
		width: 150px;
		font-size: 1.1em;
	}
	textarea {
		display: inline-block;
	}
	.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
	    content: '';
	    background: #fff;
	    border: 2px solid #ddd;
	    display: inline-block;
	    vertical-align: middle;
	    width: 20px;
	    height: 20px;
	    margin-left: -1.2em;
	    margin-top: -0.2em;
	    text-align: center;
	}
	/*.men_size {
		display: none;
	}
	.women_size {
		display: none;
	}*/
	#footwear-div1, #bag-div1, #watch-div1, #footwear-men1, #footwear-women1, #size_for_men1, #size_for_women1, #bag-men1, #bag-women1 {
		display: none;
	}
	input {
		width: 400px;
	}
</style>
</head>
<body>

<?php


if (!isset($_GET['prod_id'])) {
    header('Location: update_products.php');
}

$prod_id = $_GET['prod_id'];

$sql = "SELECT * FROM product WHERE product.product_id='$prod_id'";
$result = mysqli_query($conn, $sql);
$numrow = mysqli_num_rows($result);
if ($numrow==0) {
	header('Location: update_products.php');
} else {
	$row = mysqli_fetch_assoc($result);
	$sid = $row['seller_id'];
	if (!($_SESSION['seller_id']==$sid)) {
		header('Location: update_products.php');
	}
	$item_category = $row['category'];
	$item_gender = $row['gender'];
}

if ($item_category=="watch") {
	$watchsql = "SELECT * FROM watches WHERE watches.product_id='$prod_id'";
	$watchresult = mysqli_query($conn, $watchsql);
	$watchrow = mysqli_fetch_assoc($watchresult);
} elseif ($item_category=="bag") {
	$bagsql = "SELECT * FROM bags WHERE bags.product_id='$prod_id'";
	$bagresult = mysqli_query($conn, $bagsql);
	$bagrow = mysqli_fetch_assoc($bagresult);
} elseif ($item_category=="footwear") {
	$footwearsql = "SELECT * FROM footwear WHERE footwear.product_id='$prod_id'";
	$footwearresult = mysqli_query($conn, $footwearsql);
	$footwearrow = mysqli_fetch_assoc($footwearresult);
}



include('header.php');


?>

	<div id="customer">
		<div class="container">
			<div class="box">
				<div style="display: block; padding: 5px 15px 20px 15px;"> 
				<h3><?php echo $row["name"];?></h3> <button id="editb" style="float: right;padding-left: 15px;padding-right: 15px; margin-top: -2.8em;" class="btn btn-primary" onclick="edititems()">Edit</button><hr>
				<div id="footwear-div1">
					<form action="functions.php" method="POST" enctype="multipart/form-data">
					<fieldset id="footwear-form" disabled="">
						<?php 
						echo '<p><span class="form-name">Subcatergory: </span>'.$footwearrow["subcategory"].'</p>';
						echo '<input type="hidden" name="category" value="footwear">
						<input type="hidden" name="product_id" value="'.$prod_id.'">
						<p><span class="form-name">Brand:<span class="required">*</span></span> <input type="text" name="brand" required value="'.$row["brand"].'"></p>
						<p><span class="form-name">Name:<span class="required">*</span></span> <input type="text" name="name" maxlength="56" required value="'.$row["name"].'"></p>
						<p><span class="form-name">Price(in &#8377;):<span class="required">*</span></span> <input type="number" step="0.01" min="0" name="price" required value="'.$row["price"].'"></p>
						<p><span class="form-name">Colour:</span> <input type="text" name="colour" value="'.$row["colour"].'"></p>
						<p><span class="form-name">Material:</span> <input type="text" name="material"></p>
						<p><b>Note:</b> Fields marked with <span class="required">*</span> are mandatory</p>
						<button name="updatefoot" class="btn btn-success add" type="submit">Update Footwear</button>';
						?>
					</fieldset>
					</form>
				</div>
				<div id="bag-div1">
					<form action="functions.php" method="POST" enctype="multipart/form-data">
					<fieldset id="bag-form" disabled="">
						<?php

						echo '<input type="hidden" name="category" value="bag">
						<input type="hidden" name="product_id" value="'.$prod_id.'">
						<p><span class="form-name">Brand:<span class="required">*</span></span> <input type="text" name="brand" required value="'.$row["brand"].'"></p>
						<p><span class="form-name">Name:<span class="required">*</span></span> <input type="text" name="name" maxlength="56" required value="'.$row["name"].'"></p>
						<p><span class="form-name">Price(in &#8377;):<span class="required">*</span></span> <input type="number" step="0.01" min="0" name="price" required value="'.$row["price"].'"></p>
						<p><span class="form-name">Colour:</span> <input type="text" name="colour" value="'.$row["colour"].'"></p>
						<p><span class="form-name">Material:</span> <input type="text" name="material" value="'.$bagrow["material"].'"></p>
						<p><span class="form-name">Length(in cm):</span> <input type="number" step="0.01" min="0" name="length" value="'.$bagrow["length"].'"></p>
						<p><span class="form-name">Height(in cm):</span> <input type="number" step="0.01" min="0" name="height" value="'.$bagrow["height"].'"></p>
						<p><span class="form-name">Width(in cm):</span> <input type="number"  step="0.01" min="0" name="width" value="'.$bagrow["width"].'"></p>
						<p><span class="form-name">Weight(in kg):</span> <input type="number" step="0.01" min="0" name="weight" value="'.$bagrow["weight"].'"></p>
						<p><span class="form-name">Capacity(Lts):</span> <input type="number" step="0.01" min="0" name="capacity" value="'.$bagrow["bag_capacity"].'"></p>
						<p><span class="form-name">Available Stock:<span class="required">*</span></span> <input type="number" min="0" name="stock" required value="'.$bagrow["stock"].'"></p>
						<p><b>Note:</b> Fields marked with <span class="required">*</span> are mandatory</p>
						<button name="updatebag" class="btn btn-success add" type="submit">Update Bag</button>';
						?>
					</fieldset>
					</form>
				</div>
				<div id="watch-div1">
					<form action="functions.php" method="POST" enctype="multipart/form-data">
						<fieldset id="watch-form" disabled="">
						<?php echo '<input type="hidden" name="category" value="watch">
						<input type="hidden" name="product_id" value="'.$prod_id.'">
						<p><span class="form-name">Brand:<span class="required">*</span></span> <input type="text" name="brand" required value="'.$row["brand"].'"></p>
						<p><span class="form-name">Name:<span class="required">*</span></span> <input type="text" name="name" maxlength="56" required value="'.$row["name"].'" style="width: 400px;"></p>
						<p><span class="form-name">Price(in &#8377;):<span class="required">*</span></span> <input type="number" min="0" step="0.01" name="price" required value="'.$row["price"].'"></p>
						<p><span class="form-name">Colour:</span> <input type="text" name="colour" value="'.$row["colour"].'"></p>
						<p><span class="form-name">Dial Colour:</span> <input type="text" name="dial_colour" value="'.$watchrow["dial_colour"].'"></p>
						<p><span class="form-name">Case Shape:</span> <input type="text" name="case_shape" value="'.$watchrow["case_shape"].'"></p>
						<p><span class="form-name">Clasp Type:</span> <input type="text" name="clasp_type" value="'.$watchrow["clasp_type"].'"></p>
						<p><span class="form-name">Display Type:</span> <input type="text" name="display_type" value="'.$watchrow["display_type"].'"></p>
						<p><span class="form-name">Case Material:</span> <input type="text" name="case_material" value="'.$watchrow["case_material"].'"></p>
						<p><span class="form-name">Band Material:</span> <input type="text" name="band_material" value="'.$watchrow["band_material"].'"></p>
						<p><span class="form-name">Available Stock:<span class="required">*</span></span> <input type="text" name="stock" required value="'.$watchrow["stock"].'"></p
						<p><b>Note:</b> Fields marked with <span class="required">*</span> are mandatory</p>
						<button name="updatewatch" class="btn btn-success add" type="submit">Update Watch</button>';
						?>
					</fieldset>
					</form>
				</div>

			</div>

            </div>
        </div>
	</div>





<!-- php footer include -->
<?php
include('footer.php');
?>


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
<!-- //script for responsive tabs -->       
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
</body>
</html>
<?php


echo '<script>
	if ("'.$item_category.'"=="bag") {
		if ("'.$item_gender.'"=="men") {
			document.getElementById("bag-div1").style.display = "block";
			document.getElementById("bag-men1").style.display = "block";
		} else if ("'.$item_gender.'"=="women") {
			document.getElementById("bag-div1").style.display = "block";
			document.getElementById("bag-women1").style.display = "block";
		}
	} else if ("'.$item_category.'"=="watch") {
		if ("'.$item_gender.'"=="men") {
			document.getElementById("watch-div1").style.display = "block";
		} else if ("'.$item_gender.'"=="women") {
			document.getElementById("watch-div1").style.display = "block";
		}
	} else if ("'.$item_category.'"=="footwear") {
		if ("'.$item_gender.'"=="men") {
			document.getElementById("footwear-div1").style.display = "block";
			document.getElementById("footwear-men1").style.display = "block";
			document.getElementById("size_for_men1").style.display = "block";
		} else if ("'.$item_gender.'"=="women") {
			document.getElementById("footwear-div1").style.display = "block";
			document.getElementById("footwear-women1").style.display = "block";
			document.getElementById("size_for_women1").style.display = "block";
		}
	}
</script>';
if (isset($_GET['getsellerpage'])) {
    echo '<script>
    $(window).load(function(){
        $("#myModal9").modal("show");
    });
    </script>';
}
?>