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

<!-- php header include -->
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
        <div class="col-md-9" id="checkout">

            <div class="box">
                <form method="post" action="checkout2.php">
                    <ul class="nav nav-pills nav-justified">
                        <li class="visited"><a href="checkout1.php"><i class="fa fa-map-marker"></i>     Address</a>
                        </li>
                        <li class="visited"><a href="checkout2.php"><i class="fa fa-truck"></i>    Delivery Method</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-money"></i>    Payment Method</a>
                        </li>
                    </ul>
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Paypal</h4>

                                    <p>We like it all.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Payment gateway</h4>

                                    <p>VISA and Mastercard only.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment2">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Cash on delivery</h4>

                                    <p>You pay when you get it.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="payment3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="checkout2.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Shipping method</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
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