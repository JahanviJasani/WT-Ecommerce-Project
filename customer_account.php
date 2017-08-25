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
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
include('header_login.php');
?>
<!-- /banner_bottom_agile_info -->
        <div class="page-head_agile_info_w3l">
        <div class="container">
        <h3>My <span>Account </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">

        <ul class="w3_short">
        <li><a href="index.php">Home</a><i>|</i></li>
        <li>My Account</li>
        </ul>
        </div>
        </div>
        <!--//w3_short-->
        </div>
        </div>

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
        <li>
        <a href="customer_orders.php"><i class="fa fa-list"></i> My orders</a>
        </li>
        <li  class="active">
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

        <div class="col-md-10">
        <div class="box">
        <p class="lead">Change your personal details or your password here.</p>
        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

        <h3 style="margin-bottom: 1.5em;">Change password</h3>

        <form>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <label for="password_old">Old password</label>
        <input type="password" class="ca-form-controls" id="password_old">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <label for="password_1">New password</label>
        <input type="password" class="ca-form-controls" id="password_1">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="password_2">Retype new password</label>
        <input type="password" class="ca-form-controls" id="password_2">
        </div>
        </div>
        </div>
        <!-- /.row -->

        <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
        </div>
        </form>

        <hr>

        <h3>Personal details</h3>
        <form>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="ca-form-controls" id="firstname">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="ca-form-controls" id="lastname">
        </div>
        </div>
        </div>
        <!-- /.row -->

        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="ca-form-controls" id="company">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="street">Street</label>
        <input type="text" class="ca-form-controls" id="street">
        </div>
        </div>
        </div>
        <!-- /.row -->

        <div class="row">
        <div class="col-sm-6 col-md-3">
        <div class="form-group">
        <label for="city">Company</label>
        <input type="text" class="ca-form-controls" id="city">
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="form-group">
        <label for="zip">ZIP</label>
        <input type="text" class="ca-form-controls" id="zip">
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="form-group">
        <label for="state">State</label>
        <select class="ca-form-controls" id="state"></select>
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
        <div class="form-group">
        <label for="country">Country</label>
        <select class="ca-form-controls" id="country"></select>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
        <label for="phone">Telephone</label>
        <input type="text" class="ca-form-controls" id="phone">
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="ca-form-controls" id="email">
        </div>
        </div>
        <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>

        </div>
        </div>
        </form>
        </div>
        </div>

        </div>
        <!-- /.container -->
        </div>
        <!-- /#content -->
