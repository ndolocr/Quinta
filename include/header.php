<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="" name="author" />
        <meta content="" name="description" />        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <title> Azury Traders </title>

        <!-- BEGIN CSS FILES -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet" />
        <link href="assets/css/login-4.css" rel="stylesheet" type="text/css" rel="stylesheet" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" rel="stylesheet" />
        <link href="assets/css/components.min.css" rel="stylesheet" type="text/css" rel="stylesheet" />
        <link href="assets/css/frontend.css" rel="stylesheet" type="text/css" rel="stylesheet" />
        <!-- END CSS FILES -->
        
        <!-- START JAVASCRIPT FILES -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery.slideshow.min.js"></script>
	
        <script type="text/javascript">
            $(document).ready(function() {
                    $('.slideshow').slideshow({
                            timeout: 5000,
                            fadetime: 2000,
                            type: 'sequence'
                    });
            });
	</script>
        <!-- END JAVASCRIPT FILES -->
    </head>
    
    <body>
        <!-- BEGIN CONTAINER -->
        <div class="container-fluid">
            <!-- BEGIN ROW -->
            <div class="row social-media">
                <div class="col-sm-6">                  
                    
                </div>
                
                <div class="col-sm-6">
                    <ul class="nav navbar-social" >
                        <li> <a href="http://www.facebook.com" target="_blank"> <i class="fa fa-facebook"> </i> </a> </li>
                        <li> <a href="http://www.twitter.com" target="_blank"> <i class="fa fa-twitter"> </i>  </a> </li>
                        <li> <a href="http://www.instagram.com" target="_blank"> <i class="fa fa-instagram"> </i>  </a> </li>
                        <li> <a href="http://www.google.com" target="_blank"> <i class="fa fa-google-plus"> </i>  </a> </li>
                        <li> <a href="http://www.pinterest.com" target="_blank"> <i class="fa fa-pinterest"> </i>  </a> </li>
                    </ul>
                </div>
            </div>
            <!-- END ROW` -->
            <!-- CLEAR ALL FLOAT -->
            <div class="clear-float"></div>
            <!-- CLEAR ALL FLOAT -->
            
            <!-- BEGIN ROW -->
            <div class="row upper-bar">
                <div class="col-sm-4">
                    <div class="logo"> AZURY Traders</div>
                    <div class="info"> Your One Stop Shop for all your needs...</div>
                </div>
                
                <div class="col-sm-8">
                    <form role="form" method="POST" id="search" name="search" action="">
                    	<div class="row">
                            <div class="col-md-10">
                                <input type="text" id="keyword" name="keyword" placeholder="Enter Keyword" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" id="submit" name="submit" value="Search" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                
                <!--<div class="col-sm-1">-->
                    <!-- SHOPPING CART LINK -->
                    <!--<a href="#">
                        <i class="fa fa-shopping-cart fa-2x"></i>
                    </a>-->
                    <!-- SHOPPING CART LINK -->
                </div>
            
            <!-- END ROW -->
            
            <!-- BEGIN MENU ROW-->
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div class="main-menu">
                        <ul class="nav navbar-nav">
                            <li> <a href="index.php"> Home </a> </li>
                            <li class="dropdown">
                                <a> Products </a>
                                <ul>
                                    <?php
                                        $query = "SELECT * FROM category";
                                        $result = mysqli_query($connect, $query) or die("Unable to get record");
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                            <li><a href="category.php?id=<?php echo $row['categoryId']?>"> <?php echo $row['categoryName'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li> <a href="about.php"> About us </a> </li>
                        </ul>
                    </div>
                    <!--<div class="main-menu">
                        <ul>
                            <li> <a href="index.php"> Home </a> </li>
                            <li> <a href=""> About us </a> </li>
                            <li> 
                                <a href=""> Product Categories </a> 
                                <ul>
                                    <li> <a href=""> About us </a> </li>
                                    <li> <a href=""> About us </a> </li>
                                    <li> <a href=""> About us </a> </li>
                                </ul>
                            </li>
                            <li> <a href=""> Contact Us </a> </li>
                        </ul>
                    </div>-->
                </div>


                <div class="col-sm-12 col-md-3">
                    <?php
                        if(isset($_SESSION['login'])){
                    
                            //Get number of records in cart
                            $userId = $_SESSION['id'];
                            $numQuery = "SELECT * FROM cart WHERE customerId = '$userId'";
                            $numResults = mysqli_query($connect, $numQuery);
                            $num_num_rows = mysqli_num_rows($numResults);
                        ?>
                        <ul class="nav navbar-nav" style="text-align: right;">
                            <li style="color:#999999; font-weight: bold; padding-top: 12px;">
                                Welcome: <?php echo $_SESSION['firstname'] ?>                                
                            </li>

                            <li style="font-weight: bold;"> 
                                <a href="logout.php" style="color:#999999;"> <i class="fa fa-shopping-lock fa-1x"></i> Logout </a> 
                            </li>

                            <li style="font-weight: bold;" >  
                                <a href="cart.php" style="color:#999999;"> <i class="fa fa-shopping-cart fa-1x"></i>  
                                    <div class="noofitems">  <?php echo $num_num_rows; ?> </div>
                                </a>
                            </li>
                        </ul>

                    <?php 
                        }else{
                            ?>
                            <ul class="nav navbar-nav">                                
                                <li style="font-weight: bold;" > <a href="login.php">Login </a> </li>
                                <li style="font-weight: bold;"> <a href="registration.php"> Register </a> </li>
                            </ul>
                            <?php
                        }

                    ?>
                </div>
            </div>
            <!-- END MENU ROW-->
            
            
            
        