
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
<link href="css/team.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>

<?php
include('header.php');


?>

<div class="shopping-cart-page">
  <h1 style="position: block;color: #000;font-size: 2.75em;">Shopping Cart</h1>
  <div class="column-labels">
  <label class="sc-product-image">Image</label>
  <label class="sc-product-details">Product</label>
  <label class="sc-product-price">Price</label>
  <label class="sc-product-quantity">Quantity</label>
  <label class="sc-product-removal">Remove</label>
  <label class="sc-product-line-price">Total</label>
  </div>

  <div class="sc-product">
  <div class="sc-product-image">
  <img src="https://sc01.alicdn.com/kf/HTB1FAlQLpXXXXXOXXXX760XFXXX1/Handbags-Lastest-Fancy-Ladies-Stylish-Women-Shoulder.png">
  </div>
  <div class="sc-product-details">
  <div class="sc-product-title">Fancy Handbag</div>
  <p class="sc-product-description">Faux leather material burgundy colored satchel<br>Do not expose to extreme heat</p>
  </div>
  <div class="sc-product-price">12.99</div>
  <div class="sc-product-quantity">
  <input type="number" value="2" min="1">
  </div>
  <div class="sc-product-removal">
  <button class="remove-product">
  Remove
  </button>
  </div>
  <div class="sc-product-line-price">25.98</div>
  </div>


  <div class="sc-product">
  <div class="sc-product-image">
  <img src="http://g02.a.alicdn.com/kf/HTB1TqSULVXXXXcRXXXXq6xXFXXXw/-New-2016-Women-Backpacks-bow-Brand-pu-leather-Backpack-travel-hiking-Bags-high-quality-girls.jpg">
  </div>
  <div class="sc-product-details">
  <div class="sc-product-title">Backpack travel hiking Bags</div>
  <p class="sc-product-description">Material - PU leather<br>Golden Sequin Detail, 2 in 1 combo, 1 Handbag, 1 Clutch with wrist strap</p>
  </div>
  <div class="sc-product-price">45.99</div>
  <div class="sc-product-quantity">
  <input type="number" value="1" min="1">
  </div>
  <div class="sc-product-removal">
  <button class="remove-product">
  Remove
  </button>
  </div>
  <div class="sc-product-line-price">45.99</div>
  </div>

  <div class="totals">
  <div class="totals-item">
  <label>Subtotal</label>
  <div class="totals-value" id="cart-subtotal">71.97</div>
  </div>
  <div class="totals-item">
  <label>Tax (5%)</label>
  <div class="totals-value" id="cart-tax">3.60</div>
  </div>
  <div class="totals-item">
  <label>Shipping</label>
  <div class="totals-value" id="cart-shipping">15.00</div>
  </div>
  <div class="totals-item totals-item-total">
  <label>Grand Total</label>
  <div class="totals-value" id="cart-total">90.57</div>
  </div>
  </div>
  </div>
  <div class="form1">
  <form method="post" action="checkout1.php">
	<div class="pull-left">
		<a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
	</div>
	<div class="pull-right">
		<button type="submit" class="btn btn-primary">Proceed to Checkout <i class="fa fa-chevron-right"></i>
		</button>
	</div>
  </form>
  </div>
 
 <!-- php footer include -->
<?php
include('footer.php');
?>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
  /* Set rates + misc */
  var taxRate = 0.05;
  var shippingRate = 15.00; 
  var fadeTime = 300;


  /* Assign actions */
  $('.sc-product-quantity input').change( function() {
  updateQuantity(this);
  });

  $('.sc-product-removal button').click( function() {
  removeItem(this);
  });


  /* Recalculate cart */
  function recalculateCart()
  {
  var subtotal = 0;

  /* Sum up row totals */
  $('.sc-product').each(function () {
  subtotal += parseFloat($(this).children('.sc-product-line-price').text());
  });

  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;

  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
  $('#cart-subtotal').html(subtotal.toFixed(2));
  $('#cart-tax').html(tax.toFixed(2));
  $('#cart-shipping').html(shipping.toFixed(2));
  $('#cart-total').html(total.toFixed(2));
  if(total == 0){
  $('.checkout').fadeOut(fadeTime);
  }else{
  $('.checkout').fadeIn(fadeTime);
  }
  $('.totals-value').fadeIn(fadeTime);
  });
  }

  /* Update quantity */
  function updateQuantity(quantityInput)
  {
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.sc-product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Update line price display and recalc cart totals */
  productRow.children('.sc-product-line-price').each(function () {
  $(this).fadeOut(fadeTime, function() {
  $(this).text(linePrice.toFixed(2));
  recalculateCart();
  $(this).fadeIn(fadeTime);
  });
  });  
  }

  /* Remove item from cart */
  function removeItem(removeButton)
  {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
  productRow.remove();
  recalculateCart();
  });
  }
  </script>
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
