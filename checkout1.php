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
                <form method="post" action="checkout2.php">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#"><i class="fa fa-map-marker"></i>     Address</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-truck"></i>    Delivery Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i>    Payment Method</a>
                        </li>
                    </ul>
                    <div style="margin-top: 2em;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <labe1 for="firstname">Firstname</label1>
                                    <input type="text" class="form-control1" id="firstname">
                                </div>
                            </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label1 for="lastname">Lastname</label1>
                            <input type="text" class="form-control1" id="lastname">
                            </div>
                        </div>
                        </div>
                    <!-- /.row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label1 for="company">Company</label1>
                                    <input type="text" class="form-control1" id="company">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label1 for="street">Street</label1>
                                    <input type="text" class="form-control1" id="street">
                                </div>
                            </div>
                        </div>
                    <!-- /.row -->
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label1 for="city">Company</label1>
                                    <input type="text" class="form-control1" id="city">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label1 for="zip">ZIP</label1>
                                    <input type="text" class="form-control1" id="zip">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label1 for="state">State</label1>
                                    <select class="form-control1" id="state"></select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label1 for="country">Country</label1>
                                    <select class="form-control1" id="country"></select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label1 for="phone">Telephone</label1>
                                    <input type="text" class="form-control1" id="phone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label1 for="email">Email</label1>
                                        <input type="text" class="form-control1" id="email">
                                    </div>
                            </div>
                        </div>
                    <!-- /.row -->
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Continue shopping</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <!-- /.box -->
        </div>
        <!-- /.col-md-9 -->
        <div class="col-md-3">
            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                        <td>Order subtotal</td>
                        <th>$446.00</th>
                        </tr>
                        <tr>
                        <td>Shipping and handling</td>
                        <th>$10.00</th>
                        </tr>
                        <tr>
                        <td>Tax</td>
                        <th>$0.00</th>
                        </tr>
                        <tr class="total">
                        <td>Total</td>
                        <th>$456.00</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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


<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>

<?php
include('footer.php');
?>

</body>
</html>