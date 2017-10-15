<?php
include('functions.php');
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
<script src="js/backend.js"></script>
</head>

<style type="text/css">
#after_delete {
    display: none;
}
#button_delete {
    display: none;
    float: right;
}
</style>

<body>
<?php
include('header.php');
?>

            <!-- /banner_bottom_agile_info -->
            <div class="page-head_agile_info_w3l">
            <div class="container">
            <h3>My <span>Products </span></h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

            <ul class="w3_short">
            <li><a href="index.php">Home</a><i>|</i></li>
            <li>My Products</li>
            </ul>
            </div>
            </div>
            <!--//w3_short-->
            </div>
            </div>

            <div id="customer">
                <div class="container-fluid">
                    <div class="col-md-2">
                    <!-- *** SELLER MENU ***-->
                    <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                    <h3 class="panel-title">Seller section</h3>
                    </div>

                    <div class="panel-body">

                    <ul class="nav nav-pills nav-stacked">
                    <li>
                    <a href="seller_orders.php"><i class="fa fa-list"></i> My orders</a>
                    </li>
                    <li>
                    <a href="seller_account.php"><i class="fa fa-user"></i> My account</a>
                    </li>
                    <li class="active">
                    <a href="products.php"><i class="fa fa-shopping-bag"></i> My products</a>
                    </li>
                    <li>
                    <a href="#"><i class="fa fa-shopping-bag"></i> Update products</a>
                    </li>
                    <li>
                    <a href="functions.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                    </ul>
                    </div>

                     </div>
                    <!-- /.col-md-3 -->
                    <!-- *** SELLER MENU END *** -->
                    </div>

                    <div class="col-md-10" id="customer-orders">
                    <div class="box" id="hidediv">
                        <p class="lead">Your Product List</p><hr>
                        <p>Want to add a new product to your lineup?</p> <button style="float: right;padding-left: 15px;padding-right: 15px; margin-top: -1.7em;" class="btn btn-primary">Add</button><br><hr>
                        <p>Want to delete any existing product?</p><button style="float: right;padding-left: 15px;padding-right: 15px; margin-top: -1.7em;" class="btn btn-primary" onclick="deleteitems()">Delete</button><br>
                    </div>
            <div class="box">
                <p class="lead">My products.</p>
                <p class="text-muted"><b>The products listed for sale by you are displayed here.</b> In case of any questions <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p><br>

                <div class="table-responsive" id="before_delete">
                <table class="table table-hover">
                <thead>
                <tr>
                <th>Product Id</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty. in Stock</th>
                <th>Update Stock</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <th><a href="#"># 1735</a></th>
                <td>Louis Vuitton</td>
                <td>Hand Bag</td>
                <td>$ 200.00</td>
                <td style="text-align: center;">5</td>
                <td>
                <form>
                <input type="number" name="stock_quantity" style="width: 50px;">
                <button type="submit" name="qty_change_submit" class="btn btn-primary btn-sm">Update</button>
                </form>
                </td>
                </td>
                 </tr>
                <tr>
                <th><a href="#"># 1735</a></th>
                <td>Louis Vuitton</td>
                <td>Hand Bag</td>
                <td>$ 200.00</td>
                <td style="text-align: center;">2</td>
                <td>
                <form>
                <input type="number" name="stock_quantity" style="width: 50px;">
                <button type="submit" name="qty_change_submit" class="btn btn-primary btn-sm">Update</button>
                </form>
                </td>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <div class="table-responsive" id="after_delete">
                <form action="#" method="GET">
                <table class="table table-hover">
                <thead>
                <tr>
                <th></th>
                <th>Product Id</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty. in Stock</th>
                <th>Update Stock</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td><input id="checkbox-2" class="checkbox-custom" name="checkbox-2" type="checkbox">
            <label for="checkbox-2" class="checkbox-custom-label"></label></td>
                <th><a href="#"># 1735</a></th>
                <td>Louis Vuitton</td>
                <td>Hand Bag</td>
                <td>$ 200.00</td>
                <td style="text-align: center;">5</td>
                <td>
                <form>
                <input type="number" name="stock_quantity" style="width: 50px;">
                <button type="submit" name="qty_change_submit" class="btn btn-primary btn-sm">Update</button>
                </form>
                </td>
                </tr>
                <tr>
                <td><input id="checkbox-3" class="checkbox-custom" name="checkbox-2" type="checkbox">
            <label for="checkbox-3" class="checkbox-custom-label"></label></td>
                <th><a href="#"># 1735</a></th>
                <td>Louis Vuitton</td>
                <td>Hand Bag</td>
                <td>$ 200.00</td>
                <td style="text-align: center;">2</td>
                <td>
                <form>
                <input type="number" name="stock_quantity" style="width: 50px;">
                <button type="submit" name="qty_change_submit" class="btn btn-primary btn-sm">Update</button>
                </form>
                </td>
                </tr>
                </tbody>
                </table>
                <hr><button id="button_delete" onclick="deletiondone()" class="btn btn-primary btn-sm" style="background-color: #2fdab8; border: #2fdab8; font-size: 1em; margin-right: 6.5em;">Delete</button>
            </div>
            </div>
            </div>
            <!-- /.container -->
            </div>
            <!-- /#content -->

<!-- php footer include -->
<?php
include('footer.php');
?>

<script src="js/index.js"></script>
<script src="js/Product.js"></script>

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
