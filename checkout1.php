<?php
header('Access-Control-Allow-Origin: *'); 
?>
<?php
include('functions.php');
?>

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
<link href="css/style-default.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/backend.js"></script>
</head>

<?php
include('header.php');
?>

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Check<span>out </span></h3>
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><a href="index.php">Home</a><i>|</i></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div id="checkout">
    <div class="container">
        <div class="col-md-9">
            <div class="box">
                <form method="post" action="functions.php">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#"><i class="fa fa-map-marker"></i>     Address</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-truck"></i>    Review Order</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i>    Payment Method</a>
                        </li>
                    </ul>
                    <?php 
                        $uid=$_SESSION['user_id'];
                        $sql_user = "SELECT * FROM users WHERE users.user_id='$uid'";
                        $sql_result = mysqli_query($conn, $sql_user);
                        $user_row = mysqli_fetch_assoc($sql_result);
                        $sql = "SELECT * FROM cart WHERE cart.user_id='$uid'";

                    echo '
                    <div style="margin-top: 2em;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <labe1 for="firstname">First Name</label1>
                                    <input type="text" class="form-control1" id="firstname" name="firstname" value="'.$user_row['first_name'].'" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label1 for="lastname">Last Name</label1>
                                    <input type="text" class="form-control1" id="lastname" name="lastname" value="'.$user_row['last_name'].'" required="required">
                                </div>
                            </div>
                        </div>
                    <!-- /.row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label1 for="address">Address</label1>
                                    <input type="text" class="form-control1" id="address" name="address" value="'.$user_row['address'].'" required="required">
                                </div>
                            </div>
                            
                        </div>
                    <!-- /.row -->
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label1 for="zip">ZIP</label1>
                                    <input type="text" class="form-control1" id="zip" name="zip" value="'.$user_row['zip'].'"required="required" onkeyup="apicaller();" minlength="6" maxlength="6">
                                </div>
                            </div>';
                            //$json = file_get_contents('http://postalpincode.in/api/pincode/');
                            echo '<div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label1 for="city">City</label1>
                                    <input type="text" class="form-control1" id="city" name="city" value="'.$user_row['city'].'" required="required" readonly>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label1 for="state">State</label1>
                                    <input type="text" class="form-control1" id="state" name="state" value="'.$user_row['state'].'" required="required" readonly>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label1 for="phone">Telephone</label1>
                                    <input type="text" class="form-control1" id="phone" name="phone" value="'.$user_row['mobile'].'" required="required" > 
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label1 for="email">Email</label1>
                                        <input type="text" class="form-control1" id="email" name="email" value="'.$user_row['email'].'" required="required" >
                                    </div>
                            </div>
                        </div>
                    <!-- /.row -->
                    </div>';
                     ?>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Continue shopping</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="address_submit" class="btn btn-primary">Continue to Review Order<i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <!-- /.box -->
        </div>
        <!-- /.col-md-9 -->
        <?php
  if(isset($_SESSION['user_id']))
  {
    echo '<div class="col-md-3" >
            <div class="box" id="order-summary" style="height:528px;">
                <div class="box-header">
                    <h3>Order summary</h3>
                </div>';
    $uid=$_SESSION['user_id'];
    $sql = "SELECT * FROM cart WHERE cart.user_id='$uid'";
    $result=mysqli_query($conn, $sql);
    $item_count = mysqli_num_rows($result);
    if ($item_count==0) {
      echo "<p style='text-align: center;'><b>No products in Cart!</b></p>";
    } else {
        $total = 0;
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
        $total = $total + $sql_cart_product_result_row['qty']*$productrow['price'];}

        echo'       <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                    <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                        <td>Order subtotal</td>
                        <th>₹'.$total.'</th>
                        </tr>
                        <tr>
                        <td>Shipping and handling</td>
                        <th>₹0.00</th>
                        </tr>
                        <tr>
                        <td>Tax</td>
                        <th>₹0.00</th>
                        </tr>
                        <tr class="total">
                        <td>Total</td>
                        <th>₹'.$total.'</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>';
    }
}
?>

    <!-- /.col-md-3 -->
    </div>
<!-- /.container -->
</div>
<!-- /#content -->

<!-- /#content -->
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

<script type="text/javascript">
    function pincode_api()
    {
        var xhttp = new XMLHttpRequest();
        var pincode = document.getElementById('zip').value;
               xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            //document.getElementById('cart_count').innerHTML=this.responseText;
            //window.scrollTo(0,0);
        }
    };
    var url = 'http://postalpincode.in/api/pincode/'+ pincode;
    xhttp.open("GET", url, true);
    xhttp.send();
    }
</script>
<script type="text/javascript">
  function apicaller() {
     var xhttp = new XMLHttpRequest();
    var pin = document.getElementById('zip').value;
    if(pin.length == 6){
          var city = document.getElementById('city');
          var state = document.getElementById('state');
          //var country = document.getElementById('country');
          xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
              var res = xhttp.responseText;
              var response = JSON.parse(xhttp.responseText);
              city.value = response['PostOffice'][0]['Region'];
              state.value = response['PostOffice'][0]['State'];
              //country.value = response['PostOffice'][0]['Country'];
            }
        };
        xhttp.open("POST", "pincode.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("pincode="+pin);
    }
    else if(pin.length<6){
      var city = document.getElementById('city');
          var state = document.getElementById('state');
          //var country = document.getElementById('country')
          city.value = '';
          state.value = '';
          //country.value = '';
    }
}
</script>
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>

<?php
include('footer.php');
?>

</body>
</html>