<?php
include('functions.php');
error_reporting(0);
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
<script src="js/backend.js"></script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style-default.css" rel='stylesheet' type='text/css'/>
<link href="css/team.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/backend.js"></script>
</head>
<body>
<?php
include('header.php');
?>

<div class="shopping-cart-page">
  <h1 style="position: block;color: #000;font-size: 2.75em;">Shopping Cart</h1>
<?php
  if(isset($_SESSION['user_id']))
  {
    $uid=$_SESSION['user_id'];
    $sql = "SELECT * FROM cart WHERE cart.user_id='$uid'";
    $result=mysqli_query($conn, $sql);
    $item_count = mysqli_num_rows($result);
    if ($item_count==0) {
      echo "<hr style='height: 1px;'><p style='text-align: center; font-size: 1.2em;'><b>No products in Cart!</b></p>";
    } else {
      echo'<div class="column-labels">
            <label class="sc-product-image">Image</label>
            <label class="sc-product-details">Product</label>
            <label class="sc-product-price">Price</label>
            <label class="sc-product-quantity">Quantity</label>
            <label class="sc-product-removal">Remove</label>
            <label class="sc-product-line-price">SubTotal</label>
          </div>';
  
       $count=0;
      while (($row = mysqli_fetch_assoc($result))){
        $pid = $row['product_id'];
        $imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
        $imageresult = mysqli_query($conn, $imagesql);
        $imagerow = mysqli_fetch_assoc($imageresult);
        $sql_product = "SELECT * FROM product WHERE product_id='$pid'";
        $productresult = mysqli_query($conn, $sql_product);
        $productrow = mysqli_fetch_assoc($productresult);
        $sql_cart_product="SELECT * FROM cart WHERE cart.user_id='$uid' AND cart.product_id='$pid'";
        $sql_cart_product_result=mysqli_query($conn, $sql_cart_product);
        $sql_cart_product_result_row = mysqli_fetch_assoc($sql_cart_product_result);
        $total = $sql_cart_product_result_row['qty']*$productrow['price'] - $sql_cart_product_result_row['qty']*$productrow['price']*$productrow['discount'];
        echo '<div class="sc-product"> 
              <div class="sc-product-image">
              <img src="'.$imagerow['image_location'].'" alt="" >
              </div>
              <div class="sc-product-details">
              <div class="sc-product-brand"><h4>'.$productrow['brand'].'</h4></div>
              <div class="sc-product-title"><a href="single.php?pid='.$pid.'">'.$productrow['name'].'</a></div>';
              if($row['size'] != NULL) {
                echo'<h4>Size : '.$row['size'].'</h4>';
                $footsize=$row['size'];
                $footsql1 = "SELECT * FROM footwear WHERE product_id='$pid'";
                $footresult1 = mysqli_query($conn, $footsql1);
                $footrow1 = mysqli_fetch_assoc($footresult1);
                $id=$footrow1['footwear_id'];
                $footsql2="SELECT * FROM footwear_size WHERE footwear_size.footwear_id='$id' AND footwear_size.footwear_size='$footsize'";
                $footresult2=mysqli_query($conn, $footsql2);
                $footrow2 = mysqli_fetch_assoc($footresult2);
                if ($footrow2['stock']==0) {
                  $count+=1;
                echo '<p style="margin: 0.5em 0 0;color: #B12704;font-size: 1em;line-height: 1.5em; font-weight: 700;">Out of Stock</p>';
                } elseif ($footrow2['stock']==1) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 1 left in Stock</p>';
                } elseif ($footrow2['stock']==2) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 2 left in Stock</p>';
                } elseif ($footrow2['stock']>2) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">In Stock</p>';
                }
              }
              if ($productrow['category']=='bag') {
                $bagsql = "SELECT * FROM bags WHERE bags.product_id='$pid'";
                $bagresult = mysqli_query($conn, $bagsql);
                $bagrow = mysqli_fetch_assoc($bagresult);

                if ($bagrow['stock']==0) {
                  $count++;
                echo '<p style="margin: 0.5em 0 0;color: #B12704;font-size: 1em;line-height: 1.5em; font-weight: 700;">Out of Stock</p>';
                } elseif ($bagrow['stock']==1) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 1 left in Stock</p>';
                } elseif ($bagrow['stock']==2) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 2 left in Stock</p>';
                } elseif ($bagrow['stock']>2) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">In Stock</p>';
                }
              } elseif ($productrow['category']=='watch') {
                $watchsql = "SELECT * FROM watches WHERE watches.product_id='$pid'";
                $watchresult = mysqli_query($conn, $watchsql);
                $watchrow = mysqli_fetch_assoc($watchresult);
                if ($watchrow['stock']==0) {
                  $count++;
                echo '<p style="margin: 0.5em 0 0;color: #B12704;font-size: 1em;line-height: 1.5em; font-weight: 700;">Out of Stock</p>';
                } elseif ($watchrow['stock']==1) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 1 left in Stock</p>';
                } elseif ($watchrow['stock']==2) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">Only 2 left in Stock</p>';
                } elseif ($watchrow['stock']>2) {
                echo '<p style="margin: 0.5em 0 0;color: #008A00;font-size: 1em;line-height: 1.5em; font-weight: 700;">In Stock</p>';
                }
              } 
              echo'</div>';
              if($productrow['discount'] != NULL) {
                $new_price=$productrow['price'] - ($productrow['discount']*$productrow['price']);
                echo'<div class="sc-product-price">'.$new_price.'
                <br><del> '.$productrow['price'].'</del>
                </div>';
              }
                else {
                    echo'<div class="sc-product-price">'.$productrow['price'].'</div>';
                }
             if ($productrow['category'] == 'bag') { 
                echo'<div class="sc-product-quantity">
                <input type="number" min="1" max="'.$bagrow['stock'].'" value="'.$sql_cart_product_result_row['qty'].'" onchange="updateQuantity(this,\''.$pid.'\',\''.$_SESSION['user_id'].'\');">
                </div>';
              }
              else if($productrow['category'] == 'watch') {
                echo'<div class="sc-product-quantity">
                <input type="number" min="1" max="'.$watchrow['stock'].'" value="'.$sql_cart_product_result_row['qty'].'" onchange="updateQuantity(this,\''.$pid.'\',\''.$_SESSION['user_id'].'\');">
                </div>';
              }
              else if ($productrow['category']) {
                echo'<div class="sc-product-quantity">
                <input type="number" min="1" max="'.$footrow2['stock'].'" value="'.$sql_cart_product_result_row['qty'].'" onchange="updateQuantity(this,\''.$pid.'\',\''.$_SESSION['user_id'].'\');">
                </div>';
              }
              echo'<div class="sc-product-removal">
              <button class="remove-product" onclick="removeItem(this,\''.$pid.'\',\''.$_SESSION['user_id'].'\');">
              Remove
              </button>';
              echo'</div>
              <div class="sc-product-line-price">'.$total.'</div>
              </div>';}
    }
  }
?>
<div class="pull-right">
<?php
  echo'<a href="checkout1.php" class="btn btn-primary">Proceed to Checkout <i class="fa fa-chevron-right"></i>';
?>
</a>
</div>
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
  /*$('.sc-product-quantity input').change( function() {
  updateQuantity(this);
  });

  $('.sc-product-removal button').click( function() {
  removeItem(this);
  });*/
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
  function updateQuantity(quantityInput,pid,user_id)
  {

  /* Calculate line price */
  var qty=quantityInput.value;
  var xhttp = new XMLHttpRequest();
    //var url=window.location.href;
    var size="NA";//alert(url + " " + pid + "  "+ user_id);
    xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert(this.responseText);
                document.getElementById('cart_count').innerHTML=this.responseText;
                window.scrollTo(0,0);
            }
        };
    xhttp.open("POST", "add_to_cart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("product_id="+pid+"&user_id="+user_id+"&qty="+qty+"&size="+size);
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
  function removeItem(removeButton,pid,user_id)
  {
    console.log("Hello");
    console.log(<?php echo $count ?>);
    <?php $count=$count-1; ?>
    console.log(<?php echo $count ?>);
  /* Remove row from DOM and recalc cart total */
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  //alert(this.responseText);
                  document.getElementById('cart_count').innerHTML=this.responseText;
                  //window.scrollTo(0,0);
              }
          };
      xhttp.open("POST", "remove_from_cart.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("product_id="+pid+"&user_id="+user_id);
      var productRow = $(removeButton).parent().parent();
      productRow.slideUp(fadeTime, function() {
      productRow.remove();
      recalculateCart();});
  }
  </script>
  <!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
  <!-- Custom-JavaScript-File-Links --> 
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
if (isset($_GET['getsellerpage'])) {
    echo '<script>
    $(window).load(function(){
        $("#myModal9").modal("show");
    });
    </script>';
}
?>