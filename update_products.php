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
<script src="js/backend.js"></script>
</head>


<style type="text/css">

    .class1:before, .class1:after{
      content:"";
      display:table;
    }
    
    .class1:after{
      clear:both;
    }
    
    .form-wrapper {
        width: 100%;
        padding: 15px;
        background: #444;
        background: rgba(0,0,0,.2);
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
    }
    
    .form-wrapper input {
        width: 85%;
        height: 40px;
        padding: 10px 5px;
        float: left;    
        border: 0;
        background: #eee;
        -moz-border-radius: 3px 0 0 3px;
        -webkit-border-radius: 3px 0 0 3px;
        border-radius: 3px 0 0 3px;      
    }
    
    .form-wrapper input:focus {
        outline: 0;
        background: #fff;
        -moz-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
        -webkit-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
        box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
    }
    
    .form-wrapper input::-webkit-input-placeholder,
    .form-wrapper input:-moz-placeholder,
    .form-wrapper input:-ms-input-placeholder
     {
       color: #999;
       font-weight: normal;
       font-style: italic;
    }
        
    .form-wrapper button {
        overflow: visible;
        position: absolute;
        float: right;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 14%;
        color: #fff;
        text-transform: uppercase;
        background: #2fdab8;
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;      
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
    }   
      
    .form-wrapper button:hover{     
        background: #000;
    }   
      
    .form-wrapper button:active,
    .form-wrapper button:focus{   
        background: #000;    
    }
    
    .form-wrapper button:before {
        content: '';
        position: absolute;
        border-width: 8px 8px 8px 0;
        border-style: solid solid solid none;
        border-color: transparent #2fdab8 transparent;
        top: 12px;
        left: -6px;
    }
    
    .form-wrapper button:hover:before{
        border-right-color: #000;
    }
    
    .form-wrapper button:focus:before{
        border-right-color: #000;
    }    
    
    .form-wrapper button::-moz-focus-inner {
        border: 0;
        padding: 0;
    }
    .resp-tabs-list li {
        width: 33.33%;
    }
    .resp-tab-active {
        background-color: #000;
        background: #2fdab8;
        border-bottom: 4px solid #2fdab8;
        color: #fff !important;
    }
    .resp-tab-active:before {
        border-top: 10px solid #2fdab8;
    }
    .resp-tabs-active {
        color: #fff;
    }
    #pid {
        width: 123px;
        height: 52px;>
    }
    #brand {
        width: 100px;
        height: 52px;
    }
    #name {
        width: 351px;
        height: 52px;
    }
    #price {
        width: 108px;
        height: 52px;
    }
    #qty {
        width: 142px;
        height: 52px;
    }
    #us {
        width: 173px;
        height: 52px;
    }

</style>
<body>
<?php
include('header.php');
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>



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
                    <li>
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
                    <li class="active">
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

            <div class="col-md-10">
                <div class="box" style=" background: #555 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUeNpi/P//PwM6YGLAAuCCmpqacC2MRGsHCDAA+fIHfeQbO8kAAAAASUVORK5CYII=);">
                    <form class="form-wrapper class1" action="update_products.php" method="GET">
                        <input type="text" placeholder="Search here..." name="search" required />
                        <button type="submit">Search</button>
                    </form>
                </div>
            
                    <!-- 3 products categories tabs start -->
                <div class="new_arrivals_agile_w3ls_info box" style="padding-top: 10px; padding-bottom: 0px;" id="productlisttabs"> 
                <div style="display: block; padding: 5px 15px 1px 15px;"> 
                    <p class="lead">Edit your products</p><hr>
                    <div class="container-fluid">
                            <div id="horizontalTab" style="width: 100%;">
                                <ul class="resp-tabs-list">
                                    <li> Watches</li>
                                    <li> Bags</li>
                                    <li> Footwear</li>
                                </ul>
                                <div class="resp-tabs-container">
                            <!--/tab_one-->
                                <div class="tab1">

                                    <!-- start1 -->
                                    <div class="table-responsive" id="before_delete">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th id="pid">Product</th>
                                                    <th id="brand">Brand</th>
                                                    <th id="name">Name</th>
                                                    <th id="price">Price</th>
                                                    <th id="us">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $uid = $_SESSION['user_id'];
                                                    if (isset($_GET['search'])) {
                                                        $watchsql = "SELECT * FROM product WHERE product.category='watch' AND product.name LIKE '%".$search."%' AND product.seller_id IN (SELECT seller_id FROM seller WHERE seller.user_id='$uid')";
                                                    } else {
                                                        $watchsql = "SELECT * FROM product WHERE product.category='watch' AND product.seller_id IN (SELECT seller_id FROM seller WHERE seller.user_id='$uid')";
                                                    }
                                                    $watchresult = mysqli_query($conn, $watchsql);

                                                while ($watchrow = mysqli_fetch_assoc($watchresult)) {
                                                    $pid=$watchrow["product_id"];
                                                    $imagesql = "SELECT * FROM images WHERE images.product_id=$pid AND images.image_location LIKE '%primary%'";
                                                    $imageresult = mysqli_query($conn, $imagesql);
                                                    $imagerow = mysqli_fetch_assoc($imageresult);
                                                    echo '<tr>
                                                        <th><a href="#"><img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front"></a></th>
                                                        <td>'.$watchrow["brand"].'</td>
                                                        <td>'.$watchrow["name"].'</td>
                                                        <td>'.$watchrow["price"].'</td>';
                                                        $wid = $watchrow["product_id"];
                                                        $wsql = "SELECT stock FROM watches WHERE watches.product_id='$wid'";
                                                        $wresult = mysqli_query($conn, $wsql);
                                                        $wrow = mysqli_fetch_assoc($wresult);
                                                        echo '<td>
                                                            <form action="update_product.php" method="GET">
                                                                <input type="hidden" name="prod_id" value="'.$watchrow["product_id"].'">
                                                                <button type="submit" class="btn btn-primary btn-sm">View or Edit</button>
                                                            </form>
                                                        </td>
                                                        </td>
                                                    </tr>';
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end1 -->
                                    

                                    <div class="clearfix"></div>
                                </div>
                                <!--//tab_one-->
                                <!--/tab_two-->
                                <div class="tab2">

                                    <!-- start1 -->
                                    <div class="table-responsive" id="before_delete">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th id="pid">Product Id</th>
                                                    <th id="brand">Brand</th>
                                                    <th id="name">Name</th>
                                                    <th id="price">Price</th>
                                                    <th id="us">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $uid = $_SESSION['user_id'];
                                                    if (isset($_GET['search'])) {
                                                        $bagsql = "SELECT * FROM product WHERE product.category='bag' AND product.name LIKE '%".$search."%' AND product.seller_id IN (SELECT seller_id FROM seller WHERE seller.user_id='$uid')";
                                                    } else {
                                                        $bagsql = "SELECT * FROM product WHERE product.category='bag' AND product.seller_id IN (SELECT seller_id FROM seller WHERE seller.user_id='$uid')";
                                                    }
                                                    $bagresult = mysqli_query($conn, $bagsql);

                                                while ($bagrow = mysqli_fetch_assoc($bagresult)) {
                                                    $pid=$bagrow["product_id"];
                                                    $imagesql = "SELECT * FROM images WHERE images.product_id=$pid AND images.image_location LIKE '%primary%'";
                                                    $imageresult = mysqli_query($conn, $imagesql);
                                                    $imagerow = mysqli_fetch_assoc($imageresult);
                                                    echo '<tr>
                                                        <th><a href="#"><img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front"></a></th>
                                                        <td>'.$bagrow["brand"].'</td>
                                                        <td>'.$bagrow["name"].'</td>
                                                        <td>'.$bagrow["price"].'</td>';
                                                        $bid = $bagrow["product_id"];
                                                        $bsql = "SELECT stock FROM bags WHERE bags.product_id='$bid'";
                                                        $bresult = mysqli_query($conn, $bsql);
                                                        $brow = mysqli_fetch_assoc($bresult);
                                                        echo '<td>
                                                            <form action="update_product.php" method="GET">
                                                                <input type="hidden" name="prod_id" value="'.$pid.'">
                                                                <button type="submit" class="btn btn-primary btn-sm">View or Edit</button>
                                                            </form>
                                                        </td>
                                                        </td>
                                                    </tr>';
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end1 -->
                                    

                                    <div class="clearfix"></div>
                                </div>
                         <!--//tab_two-->
                                <div class="tab3">

                                    <!-- start1 -->
                                    <div class="table-responsive" id="before_delete">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th id="pid">Product Id</th>
                                                    <th id="brand">Brand</th>
                                                    <th id="name">Name</th>
                                                    <th id="price">Price</th>
                                                    <th id="us">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $uid = $_SESSION['user_id'];
                                                    if (isset($_GET['search'])) {
                                                        $footwearsql = "SELECT * FROM product WHERE product.category='footwear' AND product.name LIKE '%".$search."%' AND product.seller_id IN (SELECT seller_id FROM seller WHERE seller.user_id='$uid')";
                                                    } else {
                                                        $footwearsql = "SELECT * FROM product WHERE product.category='footwear' AND product.seller_id IN (SELECT seller_id FROM seller WHERE seller.user_id='$uid')";
                                                    }
                                                    $footwearresult = mysqli_query($conn, $footwearsql);
                                                    
                                                while ($footwearrow = mysqli_fetch_assoc($footwearresult)) {
                                                    $pid=$footwearrow["product_id"];
                                                    $imagesql = "SELECT * FROM images WHERE images.product_id=$pid AND images.image_location LIKE '%primary%'";
                                                    $imageresult = mysqli_query($conn, $imagesql);
                                                    $imagerow = mysqli_fetch_assoc($imageresult);
                                                    echo '<tr>
                                                        <th><a href="#"><img src="'.$imagerow['image_location'].'" alt="" class="pro-image-front"></a></th>
                                                        <td>'.$footwearrow["brand"].'</td>
                                                        <td>'.$footwearrow["name"].'</td>
                                                        <td>'.$footwearrow["price"].'</td>
                                                        <td>
                                                            <form action="update_product.php" method="GET">
                                                                <input type="hidden" name="prod_id" value="'.$pid.'">
                                                                <button type="submit" class="btn btn-primary btn-sm">View or Edit</button>
                                                            </form>
                                                        </td>
                                                    </tr>';
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end1 -->
                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

                <!-- 3 products categories tabs end -->
                </div>
            </div>
 </div>
    <!-- /.container -->
</div>
<!-- /#content -->


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

<?php
if (isset($_GET['update_product'])) {
    echo '<script>
    $(window).load(function(){
        $("#myModal12").modal("show");
    });
    </script>';
}
if (isset($_GET['getsellerpage'])) {
    echo '<script>
    $(window).load(function(){
        $("#myModal9").modal("show");
    });
    </script>';
}
?>