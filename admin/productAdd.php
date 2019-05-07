<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/productMenuActivation.php");
        
    
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
        $description = $_POST['description'];
        $product_name = $_POST['productName']; 
        $buying_price = $_POST['buyingPrice'];
        $selling_price = $_POST['sellingPrice'];
        
        
        if($discount==""){
            $discount = 0;            
        }
              
        
        
       
        //Validations
        if($product_name==""){
            $product_name_error_message = "* Product Name required!";
        }elseif($category==0){
            $category_error_message = "* Product Category required!";
        }else{
            
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
        
            $query = "SELECT * FROM product ORDER BY productId DESC LIMIT 1";
            $result = mysqli_query($connect, $query) or die("Error getting product record");
            //Check number of records.
            $num_rows = mysqli_num_rows($result);
            
             if($num_rows==0){
                $productId = 1;
             }else{
                 //Get last added Id and add one to it
                 while($row = mysqli_fetch_assoc($result)){
                        $num_id = $row['productId'];
                        $productId = $num_id + 1;
                 }
             }
            
             //Insert User values in database
             $insert_query = "INSERT INTO product "
                    ."(productId, categoryId, productName, brand, size, color, productDescription, image, buyingPrice, sellingPrice, discount)"
                    ."VALUES"
                    ."('$productId', '$category', '$product_name', '$brand', '$size', '$color', '$description', '$image', '$buying_price', '$selling_price', '$discount' )";
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
                    <li>  Add </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->
                <form method="POST" action="productAdd.php" enctype="multipart/form-data">

                    <div class="row">
                        <!-- START LEFT BOX -->
                        <div class="col-md-1"> </div>
                        <!-- END LEFT BOX -->

                        <div class="col-md-10 middle-box">                                         
                            
                            <div class="input-controls">
                                (Image Size 700px by 700px)
                            </div>
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Product Image
                                </div>                                            
                                <div class="control"> 
                                    <input type="file" name="image" class="input-text">
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
                                    <input type="text" name="productName"  placeholder="Product Name" class="input-text">
                                </div>
                                <div class="first-name-error-message">
                                    <?php echo $product_name_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Sub Category
                                </div>                                            
                                <div class="control"> 
                                    <select name="category" class="input-text">
                                        <option value="0">--Category--</option>
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
                                    <input type="text" name="brand"  placeholder="Brand" class="input-text">
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
                                    <input type="text" name="size"  placeholder="size" class="input-text">
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
                                    <input type="text" name="color"  placeholder="Color" class="input-text">
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
                                    <input type="text" name="buyingPrice"  placeholder="Buying Price" class="input-text">
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
                                    <input type="text" name="sellingPrice"  placeholder="Selling Price" class="input-text">
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
                                    <input type="text" name="discount"  placeholder="Discount Allowed" class="input-text">
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
                                    <textarea class="description" name="description"></textarea>
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