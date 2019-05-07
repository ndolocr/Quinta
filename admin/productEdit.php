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
            $productName = $row['productName'];
            $discount = $row['discount'];
            $buying_price = $row['buyingPrice'];
            $selling_price = $row['sellingPrice'];
            $productDescription = $row['productDescription'];
            
        }
    }
    
    //Error messages
    $category_error_message = "";
    $product_name_error_message = "";
    $buying_price_error_message = "";
    $selling_price_error_message = "";    
    
    //Saving Product Details
    if(isset($_POST['submit'])){
        //Capture POST Values
           
        $size = $_POST['size'];
        $color = $_POST['color'];
        $brand = $_POST['brand'];        
        $category = $_POST['category'];
        $discount = $_POST['discount'];
        $productId = $_POST['productId'];
        $description = $_POST['description'];
        $productName = $_POST['productName'];
        $buyingPrice = $_POST['buyingPrice'];
        $sellingPrice = $_POST['sellingPrice'];
        $originalImage = $_POST['originalImage'];
        
        if($discount==""){
            $discount = 0;
        }
       
        //Validations
        if($productName==""){
            $product_name_error_message = "* Product Name required!";
        }elseif($category==0){
            $category_error_message = "* Product Sub Category required!";
        }else{
            
            //processing member image
            //File Properties
            
            $file           = $_FILES['image'];
            $file_name      = $file['name'];
            $file_temp      = $file['tmp_name'];
            $file_size      = $file['size'];
            $file_error     = $file['error'];

            //Get file extension
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));

            //allowed extensions
            $allowed = array('png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG');

            //check if the file uploaded has the required extension
            if(in_array($file_ext, $allowed)){
                if($file_error == 0){
                    //rename file to make it unique
                    $file_name_new = time().".".$file_ext;
                    $file_destination = "images/uploads/products/".$file_name_new;

                    if(move_uploaded_file($file_temp, $file_destination)){
                        $image = $file_name_new;
                    }else{
                        $image = $originalImage;
                    }
                }else{
                    $image = $originalImage;
                }
            }else{
                $image = $originalImage;
            }
                   
            //Insert User values in database
            $insert_query = "UPDATE product SET "
                    . "productName='$productName', "
                    . "categoryId='$category', "
                    . "brand='$brand', "
                    . "size='$size', "
                    . "color='$color', "
                    . "image='$image', "
                    . "discount='$discount', "
                    . "buyingPrice='$buyingPrice', "
                    . "sellingPrice='$sellingPrice', "
                    . "productDescription='$description' " 
                    . "WHERE productId='$productId'";
            $insert_results = mysqli_query($connect, $insert_query) or die("Error saving product reocord!");
                   
            header("Location:productViewAll.php");
        }
        
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
                    <li> <a href="productViewAll.php"> Products  </a> </li>
                    <li>  Edit </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->
                <form method="POST" action="productEdit.php" enctype="multipart/form-data">

                    <div class="row">
                        <!-- START LEFT BOX -->
                        <div class="col-md-1"> </div>
                        <!-- END LEFT BOX -->

                        <div class="col-md-10 middle-box">                                         
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                                                           
                                <div class="control"> 
                                    <div class="edit-image">
                                        <div class="image">
                                            <img src="images/uploads/products/<?php echo $image; ?>" alt=""> 
                                        </div>
                                    </div>
                                    <input type="text" value="<?php echo $image; ?>" name="originalImage" hidden="true">
                                    <input type="text" value="<?php echo $id; ?>" name="productId" hidden="true">
                                    <input type="file" name="image" class="input-text" style="float: left;">
                                </div>
                                
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Product Name
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="productName"  value="<?php echo $productName; ?>" class="input-text">
                                </div>
                                <div class="first-name-error-message">
                                    <?php echo $product_name_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Category
                                </div>                                            
                                <div class="control"> 
                                    <select name="category" class="input-text">
                                        <?php 
                                            //Get Category Name
                                            $cat_query  = "SELECT * FROM category WHERE categoryId = '$category'";
                                            $cat_result = mysqli_query($connect, $cat_query) or die("Unable to get record");    

                                            while($cat_row = mysqli_fetch_assoc($cat_result)){

                                                $cat_name = $cat_row['categoryName'];
                                                $cat_id = $cat_row['categoryId'];
                                            }
                                        ?>
                                        <option value="<?php echo $cat_id; ?>" > <?php echo $cat_name; ?> </option>
                                        <option value="0"> --Category-- </option>
                                        <?php                                            

                                            $query  = "SELECT * FROM category ORDER BY categoryName ASC";
                                            $result = mysqli_query($connect, $query);

                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>                                                            
                                                    <option value="<?php echo $row['categoryId']; ?>"> <?php echo $row['categoryName']; ?> </option>                                                            
                                                <?php
                                            }
                                        ?> 
                                    </select>                                    
                                </div>
                                <div class="first-name-error-message">
                                    <?php echo $category_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->                                                       
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Brand
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="brand"  value="<?php echo $brand; ?>" class="input-text">
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Size
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="size"  value="<?php echo $size; ?>" class="input-text">
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Color
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="color"  value="<?php echo $color; ?>" class="input-text">
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->                            
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Buying Price
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" value="<?php echo $buying_price; ?>" name="buyingPrice"  placeholder="Buying Price" class="input-text">
                                </div>
                                <div class="telephone-error-message">
                                    <?php //echo $buying_price_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Selling Price
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" value="<?php echo $selling_price; ?>" name="sellingPrice"  placeholder="Selling Price" class="input-text">
                                </div>
                                <div class="password-error-message">
                                    <?php //echo $selling_price_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Discount Allowed
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" value="<?php echo $discount; ?>" name="discount"  placeholder="Discount Allowed" class="input-text">
                                </div>                                            
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->                            
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="description-label">
                                    Description
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            
                            <div class="input-controls"> 
                                                                      
                                <div class="description-control"> 
                                    <textarea class="description" name="description"><?php echo $productDescription; ?> </textarea>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label-button">

                                </div>                                
                                <div class="description-control"> 
                                    <input type="submit" name="submit"  value="Save" class="input-button">
                                </div>                                            
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->
                        </div>


                    </div>

                </form>
                <!-- END FORM -->
            </div>
        </div>
        <!-- END ADD ADMINISTRATOR ROW -->

    </div>
    <!-- END RIGHT COLUMN -->

</div>
<!-- END PAGE BODY ROW -->

<?php
    include("includeFiles/footer.php");
?>