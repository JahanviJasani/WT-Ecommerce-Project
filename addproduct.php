<?php
include('functions.php');
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
</style>
</head>
<body>

<?php
include('header.php');
?>

	<div id="customer">
		<div class="container">
			<div class="box">
				<p class="lead">Add a New Product</p><hr>

				
				<form id="select-category-form">
					<div class="dropdown-group">
						<p style="width: inherit; font-size: 1.2em">Category</p><br>
						<select id="category-dropdown" onchange="selectitem()" style="margin-left: 10px;">
							<option value="">Select a Category</option>
							<option value="footwear">Footwear</option>
							<option value="bag">Bags</option>
							<option value="watch">Watches</option>
						</select>
					</div>
					<div class="dropdown-group">
						<p style="width: inherit; font-size: 1.2em;">Gender</p><br>
						<select id="gender-dropdown" onchange="selectitem()" style="margin-left: 10px;">
							<option value="">Select a Gender</option>
							<option value="men">Men</option>
							<option value="women">Women</option>
						</select>
					</div>
				</form>
				<div id="footwear-div">
					<h3>Add Footwear</h3>
					<form action="functions.php" method="POST">
						<p><span class="form-name">Sub-category:<span class="required">*</span></p> 
						<select id="footwear-men" name="footwear-men" style="margin-left: 10px;">
							<option value="">Select</option>
							<option value="Casual Shoes">Casual Shoes</option>
							<option value="Boots">Boots</option>
							<option value="Sandals">Sandals</option>
							<option value="Sneakers">Sneakers</option>
							<option value="Flip Flops">Flip Flops</option>
							<option value="Athletic Shoes">Athletic Shoes</option>
							<option value="Running Shoes">Running Shoes</option>
							<option value="Canvas Shoes">Canvas Shoes</option>
							<option value="Loafers">Loafers</option>
							<option value="Others">Others</option>
						</select>
						<select id="footwear-women" name="footwear-women" style="margin-left: 10px;">
							<option value="">Select</option>
							<option value="Canvas Shoes">Canvas Shoes</option>
							<option value="Boots">Boots</option>
							<option value="Kitten Heels">Kitten Heels</option>
							<option value="Gladiators">Gladiators</option>
							<option value="Flip Flops">Flip Flops</option>
							<option value="Wedges">Wedges</option>
							<option value="Stiletto">Stiletto</option>
							<option value="Pumps">Pumps</option>
							<option value="Loafers">Loafers</option>
							<option value="Others">Others</option>
						</select>
						</p>
						<input type="hidden" name="category" value="footwear">
						<input type="hidden" name="gender" id="gender-footwear" value="">
						<p><span class="form-name">Brand:<span class="required">*</span></span> <input type="text" name="brand" required></p>
						<p><span class="form-name">Name:<span class="required">*</span></span> <input type="text" name="name" required></p>
						<p><span class="form-name">Price(in &#8377;):<span class="required">*</span></span> <input type="number" step="0.01" min="0" name="price" required></p>
						<p><span class="form-name">Colour:</span> <input type="text" name="colour"></p>
						<p><span class="form-name">Description:</span> <textarea name="description"></textarea></p>
						<p><span class="form-name">Material:</span> <input type="text" name="material"></p>
						<p><span class="form-name">Size(UK):<span class="required">*</span></span><a href="#">Refer to size chart</a></p>
							<div id="size_for_women" class="women_size">
							<input id="size3w" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size3w" class="checkbox-custom-label">  3</label> 
					        <input type="number" name="stock_size" class="size-box">
					        <br>
					        <input id="size4w" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size4w" class="checkbox-custom-label">  4</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br>
					        <input id="size5w" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size5w" class="checkbox-custom-label">  5</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br>
					        <input id="size6w" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size6w" class="checkbox-custom-label">  6</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br>
					        <input id="size7w" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size7w" class="checkbox-custom-label">  7</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br>
					        <input id="size8w" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size8w" class="checkbox-custom-label">  8</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br><br>
					        </div>
					        <div id="size_for_men" class="men_size">
							<input id="size6m" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size6m" class="checkbox-custom-label">  6</label> 
					        <input type="number" name="stock_size" class="size-box" style="margin-left: 39px;">
					        <br>
					        <input id="size7m" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size7m" class="checkbox-custom-label">  7</label>
					        <input type="number" name="stock_size" class="size-box" style="margin-left: 39px;">
					        <br>
					        <input id="size8m" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size8m" class="checkbox-custom-label">  8</label>
					        <input type="number" name="stock_size" class="size-box" style="margin-left: 39px;">
					        <br>
					        <input id="size9m" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size9m" class="checkbox-custom-label">  9</label>
					        <input type="number" name="stock_size" class="size-box" style="margin-left: 39px;">
					        <br>
					        <input id="size10m" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size10m" class="checkbox-custom-label">  10</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br>
					        <input id="size11m" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size11m" class="checkbox-custom-label">  11</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br>
					        <input id="size12m" class="checkbox-custom" name="size" type="checkbox">
					        <label for="size12m" class="checkbox-custom-label">  12</label>
					        <input type="number" name="stock_size" class="size-box">
					        <br><br>
					        </div>

						<p><span class="form-name">Upload Images:<span class="required">*</span></span> <input type="file" name="img" multiple required accept="image/*"></p>
						<p><b>Note:</b> Fields marked with <span class="required">*</span> are mandatory</p>
						<button name="addfoot" class="btn btn-success add" type="submit">Add Footwear</button>
					</form>
				</div>
				<div id="bag-div">
					<h3>Add Bag</h3>
					<form action="functions.php" method="POST">
					<p><span class="form-name">Sub-category:<span class="required">*</span></span> 
						<select id="bag-men" name="bag-men">
							<option value="">Select</option>
							<option value="Briefcase">Briefcase</option>
							<option value="Messenger Bags">Messenger Bags</option>
							<option value="Duffel">Duffel</option>
							<option value="Tote Bags">Tote Bags</option>
							<option value="Casual Bags">Casual Bags</option>
							<option value="Others">Others</option>
						</select>
						<select id="bag-women" name="bag-women">
							<option value="">Select</option>
							<option value="Crossbody">Crossbody</option>
							<option value="Tote Bags">Tote Bags</option>
							<option value="Clutch">Clutch</option>
							<option value="Satchel">Satchel</option>
							<option value="Casual Bags">Casual Bags</option>
							<option value="Others">Others</option>
						</select>
						</p>
						<input type="hidden" name="category" value="bag">
						<input type="hidden" name="gender" id="gender-bag" value="">
						<p><span class="form-name">Brand:<span class="required">*</span></span> <input type="text" name="brand" required></p>
						<p><span class="form-name">Name:<span class="required">*</span></span> <input type="text" name="name" required></p>
						<p><span class="form-name">Price(in &#8377;):<span class="required">*</span></span> <input type="number" step="0.01" min="0" name="price" required></p>
						<p><span class="form-name">Colour:</span> <input type="text" name="colour"></p>
						<p><span class="form-name">Description:</span> <br><textarea name="description"></textarea></p>
						<p><span class="form-name">Material:</span> <input type="text" name="material"></p>
						<p><span class="form-name">Length(in cm):</span> <input type="number" step="0.1" min="0" name="material"></p>
						<p><span class="form-name">Height(in cm):</span> <input type="number" step="0.1" min="0" name="material"></p>
						<p><span class="form-name">Width(in cm):</span> <input type="number"  step="0.1" min="0" name="material"></p>
						<p><span class="form-name">Weigth(in kg):</span> <input type="number" step="0.1" min="0" name="material"></p>
						<p><span class="form-name">Capacity(Lts):</span> <input type="number" step="0.1" min="0" name="capacity"></p>
						<p><span class="form-name">Available Stock:<span class="required">*</span></span> <input type="number" min="0" name="stock" required></p>
						<p><span class="form-name">Upload Images:<span class="required">*</span></span> <input type="file" name="img" multiple required accept="image/*"></p>
						<p><b>Note:</b> Fields marked with <span class="required">*</span> are mandatory</p>
						<button name="addbag" class="btn btn-success add" type="submit">Add Bag</button>
					</form>
				</div>
				<div id="watch-div">
					<h3>Add Watch</h3>
					<form action="functions.php" method="POST">
						<input type="hidden" name="category" value="watch">
						<input type="hidden" name="gender" id="gender-watch" value="">
						<p><span class="form-name">Brand:<span class="required">*</span></span> <input type="text" name="brand" required></p>
						<p><span class="form-name">Name:<span class="required">*</span></span> <input type="text" name="name" required></p>
						<p><span class="form-name">Price(in &#8377;):<span class="required">*</span></span> <input type="number" min="0" step="0.01" name="price" required></p>
						<p><span class="form-name">Dial Colour:</span> <input type="text" name="dial-colour"></p>
						<p><span class="form-name">Description:</span> <br><textarea name="description"></textarea></p>
						<p><span class="form-name">Case Shape:</span> <input type="text" name="case-shape"></p>
						<p><span class="form-name">Clasp Type:</span> <input type="text" name="clasp-type"></p>
						<p><span class="form-name">Display Type:</span> <input type="text" name="display-type"></p>
						<p><span class="form-name">Case Material:</span> <input type="text" name="case-material"></p>
						<p><span class="form-name">Band Material:</span> <input type="text" name="band-material"></p>
						<p><span class="form-name">Available Stock:<span class="required">*</span></span> <input type="text" name="stock" required></p>
						<p><span class="form-name">Upload Images:<span class="required">*</span></span> <input type="file" name="img" multiple required accept="image/*"></p>
						<p><b>Note:</b> Fields marked with <span class="required">*</span> are mandatory</p>
						<button name="addwatch" class="btn btn-success add" type="submit">Add Watch</button>
					</form>
				</div>

			</div>

            
        </div>
	</div>





<!-- php footer include -->
<?php
include('footer.php');
?>

<script src="js/index.js"></script>

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
addproduct.php
Displaying addproduct.php.