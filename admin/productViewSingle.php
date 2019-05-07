<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/productMenuActivation.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query  = "SELECT * FROM product WHERE productId = '$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get record");    
        
        while($row = mysqli_fetch_assoc($result)){
                        
            $size = $row['size'];
            $color = $row['color'];
            $image = $row['image'];
            $brand = $row['brand'];
            $category = $row['categoryId'];
            $buyingPrice = $row['buyingPrice'];
            $productName = $row['productName'];
            $stockAvailable = $row['stockAvailable'];
            $productDescription = $row['productDescription'];
            $originalSellingPrice = $row['sellingPrice'];
            $discountedSellingPrice = $row['discount'];
        }
    }
    
    //Getting categopry Name
    $cat_query = "SELECT * FROM category WHERE categoryId = '$category'";
    $cat_result = mysqli_query($connect, $cat_query);
    
    while($cat_row = mysqli_fetch_assoc($cat_result)){
        $categoryName = $cat_row['categoryName'];
    }
    
?>

           
<!-- BEGIN PAGE BODY ROW -->
<div class="row">

    <!-- BEGIN LEFT COLUMN -->
    <?php
        include("includeFiles/leftcolumn.php");
    ?>
    <!-- END LEFT COLUMN -->

    <!-- BEGIN RIGHT COLUMN -->
    <div class="col-md-10 right-column">
        
        <!-- BEGIN BREAD CRUMBS ROW -->
        <div class="row">                        
            <div class="col-sm-12 col-lg-12 col-xl-12 col-md-12 tree">
                <ul> 
                    <li> <a href="home.php"> Home  </a> </li> 
                    <li> <a href="productViewAll.php"> Product  </a> </li>
                    <li>  View Single Record </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->
        
        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                
                <!-- BEGIN TITLE -->
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">Product Details</span>
                </div>   
                <!-- END TITLE -->
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-image">
                            <div class="image">
                                <img src="images/uploads/products/<?php echo $image; ?>" alt=""> 
                            </div>
                        </div>
                        
                        <div class="restock">                            
                            <a href="productRestock.php?id=<?php echo urlencode($id);?>" class="btn green btn-outline sbold uppercase"> Restock Product</a>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <!-- BEGIN TABLE -->
                        <table class="table table-bordered">
                            <tr>
                                <td>Product Name</td>
                                <td><?php echo $productName; ?></td>
                            </tr>

                            <tr>
                                <td>Category</td>
                                <td><?php echo $categoryName; ?></td>
                            </tr>

                            <tr>
                                <td>Brand</td>
                                <td><?php echo $brand; ?></td>
                            </tr>

                            <tr>
                                <td>Color</td>
                                <td><?php echo $color; ?></td>
                            </tr>



                            <tr>
                                <td>Product Description</td>
                                <td><?php echo $productDescription; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Buying Price</td>
                                <td>Ksh. <?php echo $buyingPrice; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Selling Price</td>
                                <td style="text-decoration: line-through;" >Ksh. <?php echo $originalSellingPrice; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Discounted Selling Price</td>
                                <td>Ksh. <?php echo $discountedSellingPrice; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Stock Available</td>
                                <td style="font-weight: bold;" ><?php echo $stockAvailable; ?></td>
                            </tr>

                            <tr>
                                <td> <a href="productEdit.php?id=<?php echo urlencode($id);?>" class="btn yellow btn-outline sbold uppercase"> Edit </a> </td>
                                <td> <a href="productDelete.php?id=<?php echo urlencode($id);?>" class="btn red btn-outline sbold uppercase"> Delete </a> </td>
                            </tr>

                        </table>
                        <!-- END TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END ADD ADMINISTRATOR ROW -->

    </div>
    <!-- END RIGHT COLUMN -->

</div>
<!-- BEGIN PAGE BODY ROW -->

<?php
    include("includeFiles/footer.php");
?>