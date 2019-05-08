<?php
    include('dbfiles/dbconnect.php');
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