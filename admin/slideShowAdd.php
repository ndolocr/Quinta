<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/slideShowMenuActivation.php");
        
    
    //Error messages
    $image_error_message = "";    
    
    //Saving Product Details
    if(isset($_POST['submit'])){
        //Capture POST Values
        
       
        $publish = $_POST['publish'];
          
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
                $file_destination = "images/uploads/slideshow/".$file_name_new;

                if(move_uploaded_file($file_temp, $file_destination)){
                    $image = $file_name_new;
                    
                    $query = "SELECT * FROM slideshow ORDER BY slideShowId DESC LIMIT 1";
                    $result = mysqli_query($connect, $query) or die("Error getting Slide Show record");
                    //Check number of records.
                    $num_rows = mysqli_num_rows($result);

                    if($num_rows==0){
                       $slideShowId = 1;
                    }else{
                        //Get last added Id and add one to it
                        while($row = mysqli_fetch_assoc($result)){
                               $num_id = $row['slideShowId'];
                               $slideShowId = $num_id + 1;
                        }
                    }
                     
                    //Insert User values in database
                    $insert_query = "INSERT INTO slideshow "
                           ."(slideShowId, image, publish )"
                           ."VALUES"
                           ."('$slideShowId', '$image', '$publish' )";
                   $insert_results = mysqli_query($connect, $insert_query) or die("Error saving Slide Show reocord!");

                   header("Location:slideShowViewAll.php");
                     
                     
                }else{
                    $image_error_message = "Error Uploading Image!";
                }
            }else{
                $image_error_message = "Error Uploading Image!";
            }
        }else{
            $image_error_message = "Invalid Image Type!";
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
                    <li> <a href="slideShowViewAll.php"> Slide Show  </a> </li>
                    <li>  Add </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->
                <form method="POST" action="slideShowAdd.php" enctype="multipart/form-data">

                    <div class="row">
                        <!-- START LEFT BOX -->
                        <div class="col-md-1"> </div>
                        <!-- END LEFT BOX -->

                        <div class="col-md-10 middle-box">                                         
                            
                            <div class="input-controls">
                                (Image Size 1500px by 500px)
                            </div>
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Upload Image
                                </div>                                            
                                <div class="control"> 
                                    <input type="file" name="image" class="input-text">                                     
                                </div>
                                <div class="first-name-error-message">
                                    <?php echo $image_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Publish
                                </div>                                            
                                <div class="control">
                                    <select name="publish" class="input-text">
                                        <option value="No"> No </option>
                                        <option value="Yes"> Yes </option> 
                                    </select>                                
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