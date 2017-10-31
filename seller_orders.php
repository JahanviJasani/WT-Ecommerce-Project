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
<style type="text/css">
    #my_or {
        width: 100%;
    }
</style>
</head>
<body>

<?php
include('header.php');
?>
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>My <span>Orders </span></h3>
            <!--/w3_short-->
                 <div class="services-breadcrumb">
                        <div class="agile_inner_breadcrumb">

                           <ul class="w3_short">
                                <li><a href="index.php">Home</a><i>|</i></li>
                                <li>My Orders</li>
                            </ul>
                         </div>
                </div>
       <!--//w3_short-->
    </div>
</div>

<div id="customer">
    <div class="container-fluid">
        <div class="col-md-2">
            <!-- *** SELLER MENU ***
_________________________________________________________ -->
            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Seller section</h3>
                </div>

                <div class="panel-body">

                    <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                    <a href="seller_orders.php"><i class="fa fa-list"></i> My orders</a>
                    </li>
                    <li>
                    <a href="seller_account.php"><i class="fa fa-user"></i> My account</a>
                    </li>
                    <li>
                    <a href="seller_products.php"><i class="fa fa-shopping-bag"></i> My products</a>
                    </li>
                    <li>
                    <a href="discount_products.php"><i class="fa fa-tags"></i> My Discounts</a>
                    </li>
                    <li>
                    <li>
                    <a href="update_products.php"><i class="fa fa-pencil-square-o"></i> Update products</a>
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
        <div class="box">
                <div style="display: block; padding: 5px 15px 1px 15px;"> 
                <p class="lead">Pending Orders.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p><br>   
                    <div id="my_or">
                        
                            <div id="horizontalTab">
                                    <ul class="resp-tabs-list">
                                        <li>Processing</li>
                                        <li>Shipped</li>
                                        <li>Delivered</li>
                                        <li>Cancelled</li>
                                    </ul>
                                <div class="resp-tabs-container">
                                <!--/tab_one-->
                                    <div class="tab1">
                                       <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order Id<br>#Suborder</th>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>Customer Details</th>
                                                    <th>Total</th>
                                                    <th>Payment Method</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user = $_SESSION['user_id'];
                                                $seller_sql = "SELECT * FROM seller WHERE seller.user_id='$user'";
                                                $seller_sql_result = mysqli_query($conn,$seller_sql);
                                                $seller_row = mysqli_fetch_assoc($seller_sql_result);
                                                $seller_id = $seller_row['seller_id'];
                                                $sql = "SELECT * FROM sub_order, product WHERE sub_order.product_id=product.product_id AND product.seller_id='$seller_id' AND sub_order.status='Processing'";
                                                $result= mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $order_id = $row['order_id'];
                                                    $order_sql = "SELECT * FROM orders WHERE orders.order_id='$order_id'";
                                                    $order_sql_result = mysqli_query($conn,$order_sql);
                                                    $order_sql_row = mysqli_fetch_assoc($order_sql_result); 
                                                    echo mysqli_error($conn);
                                                    echo '
                                                    <tr>    
                                                        <th>'.$row['order_id'].' #'.$row['sub_order_id'].'</th>
                                                        <td>'.$order_sql_row['date'].'</td>
                                                        <td>'.$row['name'].'</td>
                                                        <td>
                                                        <p style="letter-spacing:0; font-size: 1em;">'.$order_sql_row['name'].'
                                                        <br>'.$order_sql_row['address'].'
                                                        <br>'.$order_sql_row['city'].' - '.$order_sql_row['zip'].'
                                                        <br>'.$order_sql_row['state'].'
                                                        <br>Mobile - '.$order_sql_row['mobile'].'
                                                        </p>
                                                        </td>
                                                        <td>'.$row['subtotal'].'</td>'
                                                        ; 
                                                        $payment = strtoupper($order_sql_row['payment_method']);
                                                        echo'
                                                        <td>'.$payment.'</td>
                                                        <td>
                                                                <select class="select" onchange="change_order_status(\''.$row['order_id'].'\',\''.$row['sub_order_id'].'\',this.value)">
                                                                    <option value="Processing" selected>Processing</option>
                                                                    <option value="Shipped">Shipped</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                    <option value="Cancelled">Cancelled</option>
                                                                
                                                                </select>
                                                        </td>
                                                    </tr>'
                                                    ;   
                                                }
                      
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> 

                                       
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    <!--//tab_one-->
                                    <!--/tab_two-->
                                    <div class="tab2">
                                       <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order Id<br>#Suborder</th>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>Customer Details</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user = $_SESSION['user_id'];
                                                $seller_sql = "SELECT * FROM seller WHERE seller.user_id='$user'";
                                                $seller_sql_result = mysqli_query($conn,$seller_sql);
                                                $seller_row = mysqli_fetch_assoc($seller_sql_result);
                                                $seller_id = $seller_row['seller_id'];
                                                $sql = "SELECT * FROM sub_order, product WHERE sub_order.product_id=product.product_id AND product.seller_id='$seller_id' AND sub_order.status='Shipped'";
                                                $result= mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $order_id = $row['order_id'];
                                                    $order_sql = "SELECT * FROM orders WHERE orders.order_id='$order_id'";
                                                    $order_sql_result = mysqli_query($conn,$order_sql);
                                                    $order_sql_row = mysqli_fetch_assoc($order_sql_result); 
                                                    echo mysqli_error($conn);
                                                    echo '
                                                    <tr>    
                                                        <th>'.$row['order_id'].' #'.$row['sub_order_id'].'</th>
                                                        <td>'.$order_sql_row['date'].'</td>
                                                        <td>'.$row['name'].'</td>
                                                        <td>
                                                        <p style="letter-spacing:0; font-size: 1em;">'.$order_sql_row['name'].'
                                                        <br>'.$order_sql_row['address'].'
                                                        <br>'.$order_sql_row['city'].' - '.$order_sql_row['zip'].'
                                                        <br>'.$order_sql_row['state'].'
                                                        <br>Mobile - '.$order_sql_row['mobile'].'
                                                        </p>
                                                        </td>
                                                        <td>'.$row['subtotal'].'</td>'
                                                        ; 
                                                        $payment = strtoupper($order_sql_row['payment_method']);
                                                        echo'
                                                        <td>'.$payment.'</td>
                                                        <td>
                                                                <select class="select" onchange="change_order_status(\''.$row['order_id'].'\',\''.$row['sub_order_id'].'\',this.value)">
                                                                    <option value="Processing" >Processing</option>
                                                                    <option value="Shipped" selected>Shipped</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                    <option value="Cancelled">Cancelled</option>
                                                                
                                                                </select>
                                                        </td>
                                                    </tr>'
                                                    ;   
                                                }
                      
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> 

                                       
                                        
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="tab3">
                                       <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order Id<br>#Suborder</th>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>Customer Details</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user = $_SESSION['user_id'];
                                                $seller_sql = "SELECT * FROM seller WHERE seller.user_id='$user'";
                                                $seller_sql_result = mysqli_query($conn,$seller_sql);
                                                $seller_row = mysqli_fetch_assoc($seller_sql_result);
                                                $seller_id = $seller_row['seller_id'];
                                                $sql = "SELECT * FROM sub_order, product WHERE sub_order.product_id=product.product_id AND product.seller_id='$seller_id' AND sub_order.status='Delivered'";
                                                $result= mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $order_id = $row['order_id'];
                                                    $order_sql = "SELECT * FROM orders WHERE orders.order_id='$order_id'";
                                                    $order_sql_result = mysqli_query($conn,$order_sql);
                                                    $order_sql_row = mysqli_fetch_assoc($order_sql_result); 
                                                    echo mysqli_error($conn);
                                                    echo '
                                                    <tr>    
                                                        <th>'.$row['order_id'].' #'.$row['sub_order_id'].'</th>
                                                        <td>'.$order_sql_row['date'].'</td>
                                                        <td>'.$row['name'].'</td>
                                                        <td>
                                                        <p style="letter-spacing:0; font-size: 1em;">'.$order_sql_row['name'].'
                                                        <br>'.$order_sql_row['address'].'
                                                        <br>'.$order_sql_row['city'].' - '.$order_sql_row['zip'].'
                                                        <br>'.$order_sql_row['state'].'
                                                        <br>Mobile - '.$order_sql_row['mobile'].'
                                                        </p>
                                                        </td>
                                                        <td>'.$row['subtotal'].'</td>'
                                                        ; 
                                                        $payment = strtoupper($order_sql_row['payment_method']);
                                                        echo'
                                                        <td>'.$payment.'</td>
                                                        <td>
                                                                <select class="select" onchange="change_order_status(\''.$row['order_id'].'\',\''.$row['sub_order_id'].'\',this.value)">
                                                                    <option value="Processing" >Processing</option>
                                                                    <option value="Shipped" >Shipped</option>
                                                                    <option value="Delivered" selected>Delivered</option>
                                                                    <option value="Cancelled">Cancelled</option>
                                                                
                                                                </select>
                                                        </td>
                                                    </tr>'
                                                    ;   
                                                }
                      
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> 

                                       
                                        
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="tab4">
                                       <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Order Id<br>#Suborder</th>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>Customer Details</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user = $_SESSION['user_id'];
                                                $seller_sql = "SELECT * FROM seller WHERE seller.user_id='$user'";
                                                $seller_sql_result = mysqli_query($conn,$seller_sql);
                                                $seller_row = mysqli_fetch_assoc($seller_sql_result);
                                                $seller_id = $seller_row['seller_id'];
                                                $sql = "SELECT * FROM sub_order, product WHERE sub_order.product_id=product.product_id AND product.seller_id='$seller_id' AND sub_order.status='Cancelled'";
                                                $result= mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $order_id = $row['order_id'];
                                                    $order_sql = "SELECT * FROM orders WHERE orders.order_id='$order_id'";
                                                    $order_sql_result = mysqli_query($conn,$order_sql);
                                                    $order_sql_row = mysqli_fetch_assoc($order_sql_result); 
                                                    echo mysqli_error($conn);
                                                    echo '
                                                    <tr>    
                                                        <th>'.$row['order_id'].' #'.$row['sub_order_id'].'</th>
                                                        <td>'.$order_sql_row['date'].'</td>
                                                        <td>'.$row['name'].'</td>
                                                        <td>
                                                        <p style="letter-spacing:0; font-size: 1em;">'.$order_sql_row['name'].'
                                                        <br>'.$order_sql_row['address'].'
                                                        <br>'.$order_sql_row['city'].' - '.$order_sql_row['zip'].'
                                                        <br>'.$order_sql_row['state'].'
                                                        <br>Mobile - '.$order_sql_row['mobile'].'
                                                        </p>
                                                        </td>
                                                        <td>'.$row['subtotal'].'</td>'
                                                        ; 
                                                        $payment = strtoupper($order_sql_row['payment_method']);
                                                        echo'
                                                        <td>'.$payment.'</td>
                                                        <td>
                                                                <select class="select" onchange="change_order_status(\''.$row['order_id'].'\',\''.$row['sub_order_id'].'\',this.value)">
                                                                    <option value="Processing" >Processing</option>
                                                                    <option value="Shipped">Shipped</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                    <option value="Cancelled" selected>Cancelled</option>
                                                                
                                                                </select>
                                                        </td>
                                                    </tr>'
                                                    ;   
                                                }
                      
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> 

                                       
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                
            </div>
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
<script type="text/javascript">
    function change_order_status(order_id,sub_order_id,order_status)
    {        
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "change_order_status.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("order_id="+order_id+"&sub_order_id="+sub_order_id+"&order_status="+order_status);
        // /window.location.reload();
    }
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