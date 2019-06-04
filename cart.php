<?php include('include/session.php'); ?>

<?php    
    include('dbfiles/dbconnect.php');
    include('include/header.php');


    //Getting Product ID
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        
        
        $query = "SELECT * FROM cart WHERE customerId='$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get cart records");
        
        /*
        while($row = mysqli_fetch_assoc($result)){            
            
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
        */
        ?>
        <!-- BEGIN ROW -->
        <div class="row">
            <!-- BEGIN CATEGORY TITLE -->
            <div class="col-sm-12 product-title-bar">
                <div class="title">
                    
                </div>                      
            </div>
            <!-- END CATEGORY TITLE -->
        </div>
        <!-- END ROW -->
        
        <!-- BEGIN ROW -->
        <div class="row">
            <!-- START IMAGE SECTION -->
            <!--<div class="col-md-3">
                <div class="product-item">
                    <div class="product-image">
                        
                    </div>
                </div>
            </div>-->
            <!-- END IMAGE SECTION -->
            
            <!-- START DETAILS SECTION -->
            <div class="col-md-12">
                <!-- START PRODUCT INFORMATION -->
                <div class="product-info">                    
                    <table table-striped table-bordered table-hover style="width:100%;"> 
                        <tr>
                            <th>  </th>
                            <th> Product Name </th>
                            <th> Brand </th>
                            <th> Size </th>
                            <th> Color </th>
                            <th> Cost </th>
                            <th> No of Items </th>
                            <th> Remove Item </th>

                        </tr>                       
                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                                $product_id = $row['productId'];

                                //Getting Product Information
                                $product_query = "SELECT * FROM product WHERE productId = '$product_id'";
                                $product_result = mysqli_query($connect, $product_query) or die("Error Getting Product Information");

                                //Getting Information from Product Table
                                while($product_row = mysqli_fetch_assoc($product_result)){
                                    ?>
                                    <tr>
                                        <td > <div class="prod_image"> <img src="admin/images/uploads/products/<?php echo $product_row['image']; ?>" /> </div> </td>
                                    
                                        <td> <?php echo $product_row['productName'] ?> </td>
                                        <td> <?php echo $product_row['brand'] ?> </td>
                                        <td> <?php echo $product_row['size'] ?> </td>
                                        <td> <?php echo $product_row['color'] ?> </td>
                                        <td> <?php echo $product_row['sellingPrice'] ?> </td>
                                    
                                        
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                        <tr>
                            <td>
                            
                                <div class="buying-form">
                                    <form method="POST" action="product.php">
                                        <input type="submit" name="submit" value="BUY NOW" class="btn yellow sbold uppercase">
                                    </form>
                                </div>

                                <div class="clear-float"> </div>
                            
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