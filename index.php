<?php 
    include('include/session.php');
    include('dbfiles/dbconnect.php');
    include('include/header.php');
    
    $category_query = "SELECT * FROM category";
    $category_result = mysqli_query($connect, $category_query) or die("Unable to get Category records");
    
?>
<!-- BEGIN SLIDE SHOW ROW-->
<?php 
    $slideshow_query = "SELECT * FROM slideshow WHERE publish = 'Yes'";
    $slideshow_result = mysqli_query($connect, $slideshow_query);
    
    $num_slideshow_rows = mysqli_num_rows($slideshow_result);
    
    if($num_slideshow_rows){
?>
        <div class="row slideshow">
            <div class="col-sm-12">
                <?php
                    while($slideshow_row = mysqli_fetch_assoc($slideshow_result)){
                        ?>
                            <img src="admin/images/uploads/slideshow/<?php echo $slideshow_row['image']; ?>" />
                        <?php
                    }
                ?>                                
            </div>
        </div>
<?php
    }
?>
<!-- END SLIDE SHOW ROW-->
        
<?php
    while($category_row = mysqli_fetch_assoc($category_result)){
        $categoryId = $category_row['categoryId'];
        
        /*$product_query = "SELECT * FROM product WHERE categoryId = '$categoryId' ORDER BY productName ASC LIMIT 4";
        $product_result = mysqli_query($connect, $product_query);
        $product_num_rows = mysqli_num_rows($product_result);
        
        if($product_num_rows){*/
            ?>

            <!-- BEGIN ROW -->
            <div class="row">
                <!-- BEGIN CATEGORY TITLE -->
                <div class="col-sm-12 product-title-bar">
                    <div class="title">
                        <?php echo $category_row['categoryName']; ?>
                    </div>  

                    <div class="next">
                        <a href="category.php?id=<?php echo $categoryId; ?>"> See all  <i class="fa fa-chevron-right"> </i> </a>
                    </div>
                </div>
                <!-- END CATEGORY TITLE -->
            </div>
            <!-- END ROW -->
            
            <!-- BEGIN ROW -->
            <div class="row"> 
            
            <?php            
                ?>
                
                <!-- BEGIN CATEGORY ITEMS -->
                <div class="col-md-3">
                    <div class="product-item">
                        <a href="category.php?id=<?php echo $category_row['categoryId']; ?>">
                            <div class="product-image">
                                <img src="admin/images/uploads/categories/<?php echo $category_row['image']; ?>" />
                            </div>
                        </a>                                                                   
                    </div>
                </div>
                <!-- END CATEGORY ITEMS -->
                <div class="row">
                    <div class="col-md-8">
                        <?php echo $category_row['description'] ; ?>
                        <!--<div class="product-name">
                            <a href="product.php?id=<?php echo $product_row['productId']; ?>"> <?php echo $product_row['productName'] ; ?> </a>
                        </div> -->
                    </div>
                </div>
                <?php
            //}
            ?>
            </div>
            <!-- END ROW -->
            <?php
            
        //}
    }
?>                            
        
<?php
    include('include/footer.php');
?>