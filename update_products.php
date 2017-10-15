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
        width: 63em;
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
        width: 110px;
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

</style>
<body>

<?php
include('header.php');
?>


<div id="customer">
    <div class="container-fluid">
        
            <div class="col-md-2">
            <!-- *** SELLER MENU ***
_________________________________________________________ -->
            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Customer section</h3>
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
                            <a href="#"><i class="fa fa-shopping-bag"></i> Update products</a>
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.col-md-3 -->
            <!-- *** SELLER MENU END *** -->
            </div>

            <div class="col-md-10">
                <div class="box" style=" background: #555 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUeNpi/P//PwM6YGLAAuCCmpqacC2MRGsHCDAA+fIHfeQbO8kAAAAASUVORK5CYII=);">
                   <form class="form-wrapper class1">
    <input type="text" placeholder="Search here..." required />
      <button type="submit">Search</button>
</form>

                </div>
            </div>

 </div>
    <!-- /.container -->
</div>
<!-- /#content -->


<?php
include('footer.php');
?>