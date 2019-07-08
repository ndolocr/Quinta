<?php include('include/session.php'); ?>

<?php
    include('dbfiles/dbconnect.php');
    //Processing Purchased Goods
    if(isset($_POST['submit'])){
        //Check if customer is logged in
        //include('include/session.php');
        
        if($_SESSION['login']){

            //Get Post information
            $productId = $_POST['product_id'];
            $customerId = $_SESSION['id'];
            $unit_price = $_POST['unit_price'];

            
            //Determine new records Id
            $cart_search_query = "SELECT * FROM cart ORDER BY cartId DESC LIMIT 1";
            $cart_search_result = mysqli_query($connect, $cart_search_query) or die("Error getting Cart records");
            $num_rows = mysqli_num_rows($cart_search_result);
            
            //Determine Card Id
            if($num_rows){
                while($cart_row = mysqli_fetch_assoc($cart_search_result)){
                    $cart_id = $cart_row['cartId'];
                    $cartId = $cart_id+1;
                }
            }else{
                $cartId = 1;

            }

            //Insert record in cart table
            $current_date = date("Y-m-d");            
            $cart_query = "INSERT INTO cart "
            ."(cartId, customerId, productId, unitPrice, transactionDate) "
            ."VALUES "
            ."('$cartId', '$customerId', '$productId', '$unit_price', '$current_date')";

            $cart_result = mysqli_query($connect, $cart_query) or die("Error Saving Cart Record!");

            header('Location: cart.php');            
        }else{
            header('Location: login.php');
            die;
        }
    }
    
    include('include/header.php');


    //Getting Product ID
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $product_query = "SELECT * FROM product WHERE productId='$id'";
        $product_result = mysqli_query($connect, $product_query) or die("Unable to get Product records");
        
        while($product_row = mysqli_fetch_assoc($product_result)){               
            $product_size = $product_row['size'];
            $product_brand = $product_row['brand'];
            $product_color = $product_row['color'];
            $product_image = $product_row['image'];
            $product_id = $product_row['productId'];
            $category_id = $product_row['categoryId'];
            $product_name = $product_row['productName'];
            $product_discount = $product_row['discount'];
            $product_buyingPrice = $product_row['buyingPrice'];
            $product_sellingPrice = $product_row['sellingPrice'];
            $product_stockAvailable = $product_row['stockAvailable'];
            $product_description = $product_row['productDescription'];
            
            //Getting Category Information
            $category_query = "SELECT * FROM category WHERE categoryId='$category_id'";
            $category_result = mysqli_query($connect, $category_query) or die("Unable to get Category records");
            
            while($category_row = mysqli_fetch_assoc($category_result)){
                $category_name = $category_row['categoryName'];
            }
        }
       
        ?>
        <!-- BEGIN ROW -->
        <div class="row">
            <!-- BEGIN CATEGORY TITLE -->
            <div class="col-sm-12 product-title-bar">
                <div class="title">
                    <?php echo $product_name; ?>
                </div>                      
            </div>
            <!-- END CATEGORY TITLE -->
        </div>
        <!-- END ROW -->
        
        <!-- BEGIN ROW -->
        <div class="row">
            <!-- START IMAGE SECTION -->
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-image">
                        <img src="admin/images/uploads/products/<?php echo $product_image; ?>" />
                    </div>
                </div>
            </div>
            <!-- END IMAGE SECTION -->
            
            <!-- START DETAILS SECTION -->
            <div class="col-md-9">
                <!-- START PRODUCT INFORMATION -->
                <div class="product-info">                    
                    <table style="width:90%;">
                        <tr>
                            <td class="product-details">
                                <h1> <?php echo $product_name; ?> </h1>
                    
                                <?php echo"Brand: ", $product_brand; ?></br>
                                <?php echo"Color: ", $product_color; ?>
                            </td>
                                                        
                        </tr>
                        <tr>
                            <td class="product-details" style="font-weight: bold;"> <?php echo "Category: ", $category_name; ?></td>
                        </tr>
                        <tr>
                            <td class="product-details"><?php echo $product_description; ?></td>
                        </tr>
                        <tr>
                            <?php 
                                if($product_sellingPrice){
                            ?>
                            <td class="product-details" > 
                                <div class="price-selling"> 
                                    <?php echo "Ksh. ", $product_sellingPrice; ?> 
                                </div>                               
                                <?php
                                    if($product_discount){
                                ?>
                                    <div class="discount"> 
                                        <?php echo "Ksh. ", $product_discount+$product_sellingPrice; ?> 
                                    </div>
                                <?php
                                    }
                                ?>
                                <div class="buying-form">
                                    <form method="POST" action="product.php">
                                        <input type="submit" name="submit" value="BUY NOW" class="btn yellow sbold uppercase">

                                        <input type="text" hidden="true" name="unit_price" value="<?php echo $product_sellingPrice ?>">
                                        <input type="text" hidden="true" name="product_id" value="<?php echo $product_id ?>">
                                    </form>
                                </div>

                                <div class="clear-float"> </div>
                            <?php 
                                }
                            ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END PRODUCT INFORMATION -->
            </div>
            <!-- END DETAILS SECTION -->
        </div>
        <!-- END ROW -->
        
        <?php    
    }
?>

<?php    
    include('include/footer.php');
?>