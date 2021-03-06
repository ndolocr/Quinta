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

<!-- BEGIN PRODUCT ADVERTISEMENT SECTION -->
<div class="row category-row">    
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="category-identifier">
            <img src="assets/img/jackets.jpg">
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="category-identifier">
            <img src="assets/img/discount_jacket.jpg">
            <img src="assets/img/bestjacket.jpg">
        </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="category-identifier">
            <img src="assets/img/winter.jpg">
            <img src="assets/img/fitting.jpg">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 advert">
        <img src="assets/img/advert.jpg">
    </div>
</div>

<div class="row category-row">    
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="category-identifier">
            <img src="assets/img/shoes.jpg">
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="category-identifier">
            <img src="assets/img/leather.jpg">
            <img src="assets/img/sport.jpg">
        </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="category-identifier">
            <img src="assets/img/warm.jpg">
            <img src="assets/img/loved.jpg">
        </div>
    </div>
</div>
<!-- END PRODUCT ADVERTISEMENT SECTION -->

<!--        
<?php
    while($category_row = mysqli_fetch_assoc($category_result)){
        $categoryId = $category_row['categoryId'];
        
            ?>
-->
            <!-- BEGIN ROW -->
            <!--<div class="row">-->
                <!-- BEGIN CATEGORY TITLE -->
                <!--<div class="col-sm-12 product-title-bar">
                    <div class="title">
                        <?php echo $category_row['categoryName']; ?>
                    </div>  

                    <div class="next">
                        <a href="category.php?id=<?php echo $categoryId; ?>"> See all  <i class="fa fa-chevron-right"> </i> </a>
                    </div>
                </div>-->
                <!-- END CATEGORY TITLE -->
            <!--</div> -->
            <!-- END ROW -->
            
            <!-- BEGIN ROW -->
            <!--<div class="row"> 
            
            <?php            
                ?>
                -->
                <!-- BEGIN CATEGORY ITEMS -->
                <!--<div class="col-md-3">
                    <div class="product-item">
                        <a href="category.php?id=<?php echo $category_row['categoryId']; ?>">
                            <div class="product-image">
                                <img src="admin/images/uploads/categories/<?php echo $category_row['image']; ?>" />
                            </div>
                        </a>                                                                   
                    </div>
                </div>
                <!-- END CATEGORY ITEMS -->
                <!--<div class="row">
                    <div class="col-md-8">
                        <?php echo $category_row['description'] ; ?>
                        <!--<div class="product-name">
                            <a href="product.php?id=<?php echo $product_row['productId']; ?>"> <?php echo $product_row['productName'] ; ?> </a>
                        </div> -->
                    <!--</div>
                </div>-->
                <!--<?php
            //}
            ?>
            </div>-->
            <!-- END ROW -->
            <!--<?php
            
        //}
    }
?>                 -->           
        
<?php
    include('include/footer.php');
?>