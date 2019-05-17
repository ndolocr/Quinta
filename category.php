<?php
    include('dbfiles/dbconnect.php');
    include('include/header.php');
    
    $num_of_row = 0;
    
    //Getting Category ID
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $category_query = "SELECT * FROM category WHERE categoryId = '$id'";
        $category_result = mysqli_query($connect, $category_query) or die("Unable to get Category records");
        
        while($category_row = mysqli_fetch_assoc($category_result)){
            $category_name = $category_row['categoryName'];
        }
        
        $product_query = "SELECT * FROM product WHERE categoryId = '$id' ORDER BY productName ASC";
        $product_result = mysqli_query($connect, $product_query);
        $product_num_rows = mysqli_num_rows($product_result);
        
        if($product_num_rows){
            ?>
            <!-- BEGIN ROW -->
            <div class="row">
                <!-- BEGIN CATEGORY TITLE -->
                <div class="col-sm-12 product-title-bar">
                    <div class="title">
                        <?php echo $category_name; ?>
                    </div>                      
                </div>
                <!-- END CATEGORY TITLE -->
            </div>
            <!-- END ROW -->
            
            
            
            
            <!-- BEGIN ROW -->
            <div class="row"> 
                <?php
                    while($product_row = mysqli_fetch_assoc($product_result)){
                        ?>
                        <!-- BEGIN CATEGORY ITEMS -->
                        <div class="col-md-3">
                            <a href="product.php?id=<?php echo $product_row['productId']; ?>">
                                <div class="product-image">
                                    <img src="admin/images/uploads/products/<?php echo $product_row['image']; ?>" />
                                </div>
                            </a>
                                
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="product-name">
                                        <a href="product.php?id=<?php echo $product_row['productId']; ?>"> <?php echo $product_row['productName'] ; ?> </a>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-cost">
                                        <?php
                                            $sellingPrice = $product_row['sellingPrice'];
                                            if($sellingPrice){
                                                echo "Now Ksh. ".$sellingPrice;
                                            }                                                                                                    
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="product-crossed">
                                        <?php
                                             $discount = $product_row['discount'];
                                            if($discount>0){
                                                $newPrice = $sellingPrice + $discount;
                                                echo "Was Ksh. ".$newPrice;
                                            }                                                   
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <?php
        }
        
    }           
?>

<?php
    include('include/footer.php');
?>