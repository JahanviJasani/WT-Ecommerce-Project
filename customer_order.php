<?php
include('functions.php');
if (!(isset($_SESSION['user_id']) && $_SESSION['user_type']==0)) {
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
<body>

<?php
include('header.php');
?>

<div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>Order <span>Details </span></h3>
            <!--/w3_short-->
                 <div class="services-breadcrumb">
                        <div class="agile_inner_breadcrumb">

                           <ul class="w3_short">
                                <li><a href="index.php">Home</a><i>|</i></li>
                                <li>Order Details</li>
                            </ul>
                         </div>
                </div>
       <!--//w3_short-->
    </div>
</div>

<!-- Home | my order div end -->

<div id="customer">
    <div class="container-fluid">
        <div class="col-md-2">
            <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Customer section</h3>
                </div>

                <div class="panel-body">

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="customer_orders.php"><i class="fa fa-list"></i> My orders</a>
                        </li>
                        <li>
                            <a href="customer_account.php"><i class="fa fa-user"></i> My account</a>
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.col-md-3 -->

            <!-- *** CUSTOMER MENU END *** -->
                </div>
                <?php 
                $uid=$_SESSION['user_id'];
                $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
                $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
                $result=mysqli_query($conn, $sql); 
                $row = mysqli_fetch_assoc($result);
                
                echo' <div class="col-md-10" id="customer-order">
                    <div class="box">
                    <div style="display: block; padding: 5px 15px 5px 15px;"> 
                        <h3 style="font-size: 2em; font-weight: 600;">Order #'.$order_id.'</h3><br>
                        <p class="lead">Order #'.$order_id.' was placed on <strong>'.$row['date'].'</strong> and is currently <strong>Being prepared</strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p><br>';?>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sub Order Id</th>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Status</th>
                                        <th>Sub-Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                    $uid=$_SESSION['user_id'];
                                    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);   
                                    $sql = "SELECT * FROM sub_order WHERE sub_order.order_id='$order_id'";
                                    $result=mysqli_query($conn, $sql);
                                    $item_count = mysqli_num_rows($result);
                                    if ($item_count==0) {
                                      echo "<p style='text-align: center;'><b>No products in order!</b></p>";
                                    } else {
                                      while (($row = mysqli_fetch_assoc($result))){
                                        $pid = $row['product_id'];
                                        $imagesql = "SELECT * FROM images WHERE images.product_id='$pid' AND images.image_location LIKE '%primary%'";
                                        $imageresult = mysqli_query($conn, $imagesql);
                                        $imagerow = mysqli_fetch_assoc($imageresult);
                                        $sql_product = "SELECT * FROM product WHERE product_id='$pid'";
                                        $productresult = mysqli_query($conn, $sql_product);
                                        $productrow = mysqli_fetch_assoc($productresult);
                                        echo '
                                        <tr>
                                            <td>'.$row['sub_order_id'].'</td>
                                            <td>
                                                <a href="single.php?pid='.$pid.'">
                                                    <img src="'.$imagerow['image_location'].'">
                                                </a>
                                            </td>
                                            <td><a href="single.php?pid='.$pid.'">'.$productrow['name'].'</a>
                                            </td>
                                            <td>'.$row['quantity'].'</td>
                                            <td>₹ '.$productrow['price'].'</td>
                                            <td><span class="label label-info">'.$row['status'].'</span>
                                            </td>
                                            <td>₹ '.$row['subtotal'].'</td>
                                        </tr>';
                                        }
                                    }
                                    ?>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                        <?php
                        $uid=$_SESSION['user_id'];
                        $sql="SELECT * FROM users where user_id='$uid'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        echo '<div class="row addresses">
                            <div class="col-md-6">
                                <h3 style="font-size: 1.7em; font-weight: 600;">Invoice address</h3>
                                <p>'.$row['first_name'].' '.$row['last_name'].'
                                    <br>'.$row['address'].'
                                    <br>'.$row['city'].'
                                    <br>'.$row['zip'].'
                                    <br>'.$row['state'].'
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h3 style="font-size: 1.7em; font-weight: 600;">Shipping address</h3>
                                <p>'.$row['first_name'].' '.$row['last_name'].'
                                    <br>'.$row['address'].'
                                    <br>'.$row['city'].'
                                    <br>'.$row['zip'].'
                                    <br>'.$row['state'].'
                                </p>
                            </div>
                        </div>';
                        ?>
                    </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php
include('footer.php');
?>