<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/categoryMenuActivation.php");
        
    
    //Error messages
    $category_name_error_message = "";
    $product_name_error_message = "";
    $buying_price_error_message = "";
    $selling_price_error_message = "";    
    
    //Saving Product Details
    if(isset($_POST['submit'])){
        //Capture POST Values
               
        $description = $_POST['description'];
        $categoryName = $_POST['categoryName'];
        $originalImage = "default.PNG";       
       
        //Validations
        if($categoryName==""){
            $category_name_error_message = "* Product Name required!";        
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
                    $file_destination = "images/uploads/categories/".$file_name_new;

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
                   
            $query = "SELECT * FROM category ORDER BY categoryId DESC LIMIT 1";
            $result = mysqli_query($connect, $query) or die("Error getting category record");
            //Check number of records.
            $num_rows = mysqli_num_rows($result);
            
             if($num_rows==0){
                $categoryId = 1;
             }else{
                 //Get last added Id and add one to it
                 while($row = mysqli_fetch_assoc($result)){
                        $num_id = $row['categoryId'];
                        $categoryId = $num_id + 1;
                 }
             }
            
             //Insert User values in database
             $insert_query = "INSERT INTO category "
                    ."(categoryId, categoryName, description, image )"
                    ."VALUES"
                    ."('$categoryId', '$categoryName', '$description', '$image')";
            $insert_results = mysqli_query($connect, $insert_query) or die("Error saving category reocord!");
                   
            header("Location:categoryViewAll.php");
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
                    <li> <a href="categoryViewAll.php"> Category  </a> </li>
                    <li>  Add </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->
                <form method="POST" action="categoryAdd.php" enctype="multipart/form-data">

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
                                    Category Image
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
                                    Category Name
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="categoryName"  placeholder="Category Name" class="input-text">
                                </div>
                                <div class="first-name-error-message">
                                    <?php echo $category_name_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>                            
                            
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