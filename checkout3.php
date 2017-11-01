<?php
include('functions.php');
error_reporting(0);
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
        <h3>CHeck<span>out </span></h3>
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
                <form method="post" action="checkout.php" id="checkout_form">
                    <ul class="nav nav-pills nav-justified">
                        <li class="visited"><a href="checkout1.php"><i class="fa fa-map-marker"></i>     Address</a>
                        </li>
                        <li class="visited"><a href="checkout2.php"><i class="fa fa-truck"></i>    Review Order</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-money"></i>    Payment Method</a>
                        </li>
                    </ul>
                    <div class="content" style="margin-top: 3em;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Cash on delivery</h4>

                                    <p>Pay by cash or card on delivery.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment1" id="cod" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Credit/Debit Card</h4>

                                    <p>Pay easily by your Visa/MasterCard.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment2" id="card" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Wallet</h4>

                                    <p>Pay by convenient e-wallets.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment3" id="wallet" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Netbanking</h4>

                                    <p>Pay right through your bank account.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment4" id="netbanking" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>UPI</h4>

                                    <p>Pay rapidly through UPI.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment5" id="upi" required="required">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                    <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id">
                    <input type="hidden" name="pmt_method" id="pmt_method">
                    <input type="hidden" name="total_amt" id="total_amt">
                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="checkout2.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Review Order</a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary" onclick="checkpayment();" name="placeorder">Place Order<i class="fa fa-chevron-right"></i>
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
    $user_name='';
    $user_mobile='';
    $user_email='';
    $user_sql = "SELECT * FROM users WHERE users.user_id='$uid'";
    $user_sql_result = mysqli_query($conn, $user_sql);
    $user_row = mysqli_fetch_assoc($user_sql_result);
    $user_name = $user_row['first_name'].' '.$user_row['last_name'];
    $user_email = $user_row['email'];
    $user_mobile = $user_row['mobile'];
    $sql = "SELECT * FROM cart WHERE cart.user_id='$uid'";
    $result=mysqli_query($conn, $sql);
    $item_count = mysqli_num_rows($result);
    if ($item_count==0) {
      echo "<p style='text-align: center;'><b>No products in Cart!</b></p>";
    } else {
        $total = 0;
        $discounts=0;
        $total_discounts=0;
        
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
        $total = $total + $sql_cart_product_result_row['qty']*$productrow['price'];
        $discounts = $discounts + $sql_cart_product_result_row['qty']*$productrow['price']*$productrow['discount'];
        
        
    }
        $total_discounts = $total_discounts + $total - $discounts;
        echo'<p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
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
                        <tr>
                        <td>Discounts</td>
                        <th>₹'.$discounts.'</th>
                        </tr>
                        <tr>
                        <tr class="total">
                        <td>Total</td>
                        <th>₹'.$total_discounts.'</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
           ';
    }
}
?>
 </div>
        </div>

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
    function checkpayment(){
        document.getElementById('total_amt').value = <?php echo $total_discounts; ?>;
if(document.getElementById('cod').checked) {
         document.getElementById('pmt_method').value='cod';
         document.getElementById('razorpay_payment_id').value='NA';
         this.form.submit();
    }
    else if(document.getElementById('card').checked) {
         rzp1.open();
         event.preventDefault();
    
    }
    else if(document.getElementById('netbanking').checked) {     
         rzp2.open();
         event.preventDefault();
    }
    else if(document.getElementById('wallet').checked) {
    
         rzp3.open();
         event.preventDefault();
    }
    else if(document.getElementById('upi').checked) {

         rzp4.open();
         event.preventDefault();
    }
    
}
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
var options = {
    "key": "rzp_test_ceTDQ2ptdhHVA2",
    "amount": <?php echo $total_discounts*100;?>, // 2000 paise = INR 20
    "name": "Elite Shoppy",
    "description": "Purchase from Elite Shoppy",
    "image": "/your_logo.png",
    "handler": function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('pmt_method').value = 'card';
        document.getElementById('checkout_form').submit();
    },
    "prefill.method": "card",
    "prefill.name": <?php echo json_encode($user_name);?>,
    "prefill.email": <?php echo json_encode($user_email);?>,
    "prefill.contact": <?php echo json_encode($user_mobile);?>,
    "modal.escape" : "false",
    
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#2fdab8"
    }
};
var rzp1 = new Razorpay(options);

</script>

<script>
var options = {
    "key": "rzp_test_ceTDQ2ptdhHVA2",
    "amount": <?php echo $total_discounts*100;?>, // 2000 paise = INR 20
    "name": "Elite Shoppy",
    "description": "Purchase from Elite Shoppy",
    "image": "/your_logo.png",
    "handler": function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('pmt_method').value = 'netbanking';
        document.getElementById('checkout_form').submit();
    },
    "prefill.method": "netbanking",
    "prefill.name": <?php echo json_encode($user_name);?>,
    "prefill.email": <?php echo json_encode($user_email);?>,
    "prefill.contact": <?php echo json_encode($user_mobile);?>,
    "modal.escape" : "false",
    
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#2fdab8"
    }
};
var rzp2 = new Razorpay(options);

</script>

<script>
var options = {
    "key": "rzp_test_ceTDQ2ptdhHVA2",
    "amount": <?php echo $total_discounts*100;?>, // 2000 paise = INR 20
    "name": "Elite Shoppy",
    "description": "Purchase from Elite Shoppy",
    "image": "/your_logo.png",
    "handler": function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('pmt_method').value = 'wallet';
        document.getElementById('checkout_form').submit();
    },
    "prefill.method": "wallet",
    "prefill.name": <?php echo json_encode($user_name);?>,
    "prefill.email": <?php echo json_encode($user_email);?>,
    "prefill.contact": <?php echo json_encode($user_mobile);?>,

    "modal.escape" : "false",

    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#2fdab8"
    }
};
var rzp3 = new Razorpay(options);

</script>

<script>
var options = {
    "key": "rzp_test_ceTDQ2ptdhHVA2",
    "amount": <?php echo $total_discounts*100;?>, // 2000 paise = INR 20
    "name": "Elite Shoppy",
    "description": "Purchase from Elite Shoppy",
    "image": "/your_logo.png",
    "handler": function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('pmt_method').value = 'upi';
        document.getElementById('checkout_form').submit();
    },
    "prefill.method": "upi",
    "prefill.name": <?php echo json_encode($user_name);?>,
    "prefill.email": <?php echo json_encode($user_email);?>,
    "prefill.contact": <?php echo json_encode($user_mobile);?>,

    "modal.escape" : "false",

    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#2fdab8"
    }
};
var rzp4 = new Razorpay(options);

</script>




<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>

<?php
include('footer.php');
?>

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