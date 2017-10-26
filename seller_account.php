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
<script type="text/javascript">
    function enable()
    {
        var form = document.getElementById("personal");
        form.removeAttribute('disabled');
    }
</script>
<body>

<?php
include('header.php');
?>

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
                        <li class="active">
                            <a href="seller_account.php"><i class="fa fa-user"></i> My account</a>
                        </li>
                        <li>
                            <a href="seller_products.php"><i class="fa fa-shopping-bag"></i> My products</a>
                        </li>
                        <li>
                            <a href="discount_products.php"><i class="fa fa-tags"></i> My Discounts</a>
                        </li>
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

        <div class="col-md-9">
        <div class="box" style="height: 100%;">
            <div style="display: block; padding: 5px 15px 1px 15px;"> 
        <p class="lead">Change your personal details or your password here.</p>
        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

        <h3 style="margin-bottom: 1.5em;">Change password</h3>
        
                <form method="POST" action="functions.php">
                <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label for="password_old">Old password</label>
                <input type="password" class="ca-form-controls" id="password_old" name="password_old">
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label for="password_1">New password</label>
                <input type="password" class="ca-form-controls" id="password_1" name="password_1">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                <label for="password_2">Retype new password</label>
                <input type="password" class="ca-form-controls" id="password_2" name="password_2">
                </div>
                </div>
                </div>
                <!-- /.row -->

                <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary" name="changepassword" id="changepassword"><i class="fa fa-save"></i> Save new password</button>
                </div>
                </form>

                
                <br>
                <hr>
                <div class="row">

                    <div class="col-sm-9">
                        <h3>Personal details</h3>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button class="btn btn-primary" onclick="enable();" ><i class="fa fa-edit"></i>Edit</button>
                    </div>
                </div>
                <div>
                    <fieldset id="personal" disabled="disabled">
                        <?php 
                            $user = $_SESSION['user_id'];
                            $sql = "SELECT * FROM users WHERE users.user_id='$user'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $sql = "SELECT * FROM seller WHERE seller.user_id='$user'" ;
                            $result = mysqli_query($conn, $sql);                   
                            $seller = mysqli_fetch_assoc($result);
                            echo '
                            <form action="functions.php" method="POST">
                            <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="ca-form-controls" id="firstname" name="firstname" value="'.$row['first_name'].'">
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="ca-form-controls" id="lastname" name="lastname" value="'.$row['last_name'].'">
                            </div>
                            </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="ca-form-controls" id="email" name="email" value="'.$row['email'].'">
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="ca-form-controls" id="mobile" name="mobile"  value="'.$row['mobile'].'">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label for="bankname">Bank Name</label>
                            <input type="text" class="ca-form-controls" id="bankname" name="bankname" value="'.$seller['bank_name'].'">
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label for="accountnumber">Account Number</label>
                            <input type="text" class="ca-form-controls" id="accountnumber" name="accountnumber"  value="'.$seller['account_num'].'">
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label for="ifsc">IFSC</label>
                            <input type="text" class="ca-form-controls" id="ifsc" name="ifsc"  value="'.$seller['ifsc'].'">
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-sm-12">
                            <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="ca-form-controls" id="address" name="address"  value="'.$row['address'].'">
                            </div>
                            </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                            <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="ca-form-controls" id="city" name="city"  value="'.$row['city'].'">
                            </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                            <label for="zip">ZIP</label>
                            <input type="text" class="ca-form-controls" id="zip" name="zip"  value="'.$row['zip'].'">
                            </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="ca-form-controls" id="state" name="state"  value="'.$row['state'].'">
                            </div>
                            </div>
                            
                            </div>
                            <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary" id="profile_update" name="profile_update"><i class="fa fa-save"></i> Save changes</button>

                            </div>
                            </div>
                            </form>';
                            ?>
                    </div> 
                    
    </fieldset>
</div>
    </div> 
</div>
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->


<?php
include('footer.php');

if (isset($_GET['change'])) {
    echo "<script> alert('Current Password incorrect')</script>";  
}
if (isset($_GET['getsellerpage'])) {
    echo '<script>
    $(window).load(function(){
        $("#myModal9").modal("show");
    });
    </script>';
}
?>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

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
