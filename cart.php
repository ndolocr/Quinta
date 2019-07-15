<?php include('include/session.php'); ?>

<?php    
    include('dbfiles/dbconnect.php');
    include('include/header.php');


    //Getting Product ID
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];        
        
        $query = "SELECT * FROM cart WHERE customerId='$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get cart records");
        $num_rows = mysqli_num_rows($result);

        if($num_rows==0){
            ?>
            <div id="outer">
                <div id="inner">
                    No Records found in the Cart!
                </div>
            </div>
            <?php
        }else{

        ?>        

            <!-- BEGIN ROW -->
            <div class="row">
                <!-- BEGIN CATEGORY TITLE -->
                <div class="col-sm-12 product-title-bar">
                    <div class="title">
                        Cart
                    </div>                      
                </div>
                <!-- END CATEGORY TITLE -->
            </div>
            <!-- END ROW -->

            <!-- BEGIN ROW -->
            <div class="row">
                
                <!-- BEGIN PRODUCT SECTION -->
                <div class="col-md-7 ">
                    
                    <!-- BEGIN ROW -->
                    <div class="row">
                        <!--<div class="col-sm-2"> </div>-->
                        <div class="col-sm-4">
                            <div class="cart-headers"> Item </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers"> Quantity </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers"> Unit Price </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers"> Subtotal </div>
                        </div>
                    </div>
                    <!-- END ROW -->

                    <?php
                    $totalCost = 0;

                    while($row = mysqli_fetch_assoc($result)){
                        $product_id = $row['productId'];

                        //Getting Product Information
                        $product_query = "SELECT * FROM product WHERE productId = '$product_id'";
                        $product_result = mysqli_query($connect, $product_query) or die("Error Getting Product Information");


                        //Getting Information from Product Table
                        while($product_row = mysqli_fetch_assoc($product_result)){
                            ?>
                            <!-- BEGIN ROW -->
                            <div class="row cart-product-details">
                                <!--<div class="col-sm-2 greycol"> </div>-->
                                <div class="col-sm-4 side-bars"> 
                                    <div class="prod_image"> 
                                        <img src="admin/images/uploads/products/<?php echo $product_row['image']; ?>" /> 
                                    </div>            
                                
                                    <div class="prod_details">
                                        <?php 
                                            //Getting Category Name
                                            $catId = $product_row['categoryId'];
                                            $cat_query = "SELECT * FROM category WHERE categoryId = '$catId'";
                                            $cat_result = mysqli_query($connect, $cat_query) or die("Error getting Category details");

                                            while($cat_row = mysqli_fetch_assoc($cat_result)){
                                                echo " <div class='category_name'> Category: ";
                                                    echo $cat_row['categoryName'];
                                                echo "</div>";
                                            }
                                            

                                        ?> 
                                        <?php echo $product_row['productName'] ?> <br>

                                        <div class="category_name">
                                            <a href="cart_delete.php?cart_id=<?php echo $row['cartId']; ?>">
                                                <i class="fa fa-trash"> </i> Remove
                                            </a>
                                        </div>
                                        
                                    </div>

                                    <div class="clear-float"> </div>
                                </div>

                                <div class="col-sm-2 side-bars">
                                    <a href="cart_plus.php?cart_id=<?php echo $row['cartId']; ?>" style="color:#7ed321; padding-right: 10px; text-decoration: none;">
                                        <i class="fa fa-plus"> </i>
                                    </a>

                                    <?php echo $row['quantity']; ?>

                                    <a href="cart_minus.php?cart_id=<?php echo $row['cartId']; ?>" style="color:#D43714; padding-left: 10px; text-decoration: none;">
                                        <i class="fa fa-minus"> </i>
                                    </a>
                                    
                                    <br><br>
                                </div>

                                <div class="col-sm-2 side-bars column-details">
                                    <div class="product_prices"> 
                                        <?php echo "Ksh. ".$product_row['sellingPrice']; ?> <br>
                                        <div class="crossed"> 
                                            <?php
                                            $before_discount = ($product_row['sellingPrice']+$product_row['discount']); ?>
                                            <?php echo "Ksh. ".$before_discount; ?> <br>
                                        </div>
                                        <div class="saved"> 
                                            <?php echo "Saving Ksh. ".$product_row['discount']; ?> <br>
                                        </div>
                                    </div>
                                    <br>
                                </div>

                                <div class="col-sm-2">
                                    <?php
                                        echo "Ksh. ".$subtotal = $product_row['sellingPrice'] * $row['quantity'];

                                        $totalCost = $totalCost + $subtotal;
                                    ?>
                                
                                </div>
                            </div>
                            <!-- END ROW -->                        
                            <?php 
                        }
                    }
                    ?>

                    <!-- BEGIN TOTAL PRICE ROW -->
                    <div class="row cart-product-details">
                        <!--<div class="col-sm-2"> </div>-->
                        <div class="col-sm-4 offset-sm-2">
                            <div class="cart-headers"> </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers">  </div>
                        </div>
                        <div class="col-sm-2 side-bars">
                            <div class="cart-headers"> Total Price </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers"> <?php echo"Ksh. ".$totalCost; ?> </div>
                        </div>
                    </div>
                    <!-- END TOTAL PRICE ROW -->

                    <?php $_SESSION['total'] = $totalCost; ?>

                    <!-- BEGIN CHECKOUT BUTTON SECTION -->
                    <div class="row cart-product-details">
                        <!--<div class="col-sm-2"> </div>-->
                        <div class="col-sm-4 offset-sm-2">
                            <div class="cart-headers"> </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers">  </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers"> </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="cart-headers">
                                <!-- <a href="checkout.php" class="btn red btn-outline sbold uppercase">
                                    Proceed to Checkout
                                </a> -->
                            </div>
                        </div>
                    </div>
                    <!-- END CHECKOUT BUTTON SECTION -->

                </div>
                <!-- END PRODUCT SECTION -->

                <div class="col-md-1"></div>

                <!-- BEGIN ADDRESS SECTION -->
                <div class="col-md-4">
                    <div class="row address-header">                        
                        <div class="col-sm-2 ">                            
                            <i class="fa fa-check"> </i>
                        </div>

                        <div class="col-sm-10">                             
                            Personal Address     
                        </div>
                    </div>
                    
                    <div class="row address-header">                        
                        <div class="col-sm-2 "></div>

                        <div class="col-sm-10">                             
                            <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?>
                            <br>
                            <div class="other-information">
                                <?php 
                                    echo "P.O. Box ".$_SESSION['address'].", <br>".$_SESSION['city'].", ".$_SESSION['country'].".";
                                    echo "<br>";
                                    echo $_SESSION['email'].".";
                                ?>                                
                            </div>
                            <br>                            
                        </div>
                    </div>

                    <div class="row address-header">                        
                        <div class="col-sm-2 ">                            
                            
                        </div>

                        <div class="col-sm-10">                             
                            <a href="editCustomer.php" class="btn yellow btn-outline sbold uppercase">
                                Edit my Details
                            </a>     
                        </div>
                    </div>

                    <div class="row address-header">                        
                        <div class="col-sm-2 ">                            
                            <i class="fa fa-money"> </i>
                        </div>

                        <div class="col-sm-10">                             
                            Payment Method    
                        </div>
                    </div>
                        
                        <div class="row address-header">                        
                            <div class="col-sm-2 mobile-money "> 
                                <!-- <img src="assets/img/mpesa.png"> -->
                            </div>

                            <div class="col-sm-10">
                                <a href="mpesa.php?messagez=1" class="btn green btn-outline sbold uppercase">
                                    Lipa Na MPESA
                                </a>                            
                                
                            </div>
                        </div>

                        <div class="row address-header">                        
                            <div class="col-sm-2 mobile-money "> 
                                <!-- <img src="assets/img/airtel.png"> -->
                            </div>

                            <div class="col-sm-10">
                                <a href="airtel.php?messagez=1" class="btn red btn-outline sbold uppercase">
                                    Airtel Money
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                        <!--
                        <div class="row address-header">                        
                            <div class="col-sm-2 mobile-money "> -->
                                <!-- <img src="assets/img/airtel.png"> --> <!--
                            </div>

                            <div class="col-sm-10">
                                <a href="checkout.php?payment=visa" class="btn yellow btn-outline sbold uppercase">
                                    --- Visa card  ---
                                </a>
                            </div>
                        </div>

                    </div>
            </div>
            -->
            <!-- END ROW -->
        <?php
        }    
    }
?>

<?php    
    include('include/footer.php');
?>