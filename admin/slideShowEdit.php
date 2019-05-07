<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/slideShowMenuActivation.php");
        
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query  = "SELECT * FROM slideshow WHERE slideShowId = '$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get record");    
        
        while($row = mysqli_fetch_assoc($result)){                                    
            $image = $row['image'];
            $publish = $row['publish'];
        }
    }else{
        header('Location:slideShowViewAll.php');
    }
      
    
    //Saving Product Details
    if(isset($_POST['submit'])){
        //Capture POST Values
           
        $publish = $_POST['publish'];
        $slideShowId = $_POST['slideShowId'];
        
        $insert_query = "UPDATE slideshow SET "
                . "publish='$publish' " 
                . "WHERE slideShowId='$slideShowId'";
        $insert_results = mysqli_query($connect, $insert_query) or die("Error saving Slide Show reocord!");

        header("Location:slideShowViewAll.php");

        
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
                    <li>  Edit </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->
                <form method="POST" action="slideShowEdit.php" enctype="multipart/form-data">

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
                                            <img src="images/uploads/slideshow/<?php echo $image; ?>" alt=""> 
                                        </div>
                                    </div>
                                    <input type="text" value="<?php echo $id; ?>" name="slideShowId" hidden="true">
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
                                        <?php
                                            if($publish=='No'){
                                                ?>
                                                    <option value="No"> No </option>
                                                    <option value="Yes"> Yes </option>
                                                <?php
                                            }else{
                                                ?>
                                                    <option value="Yes"> Yes </option>
                                                    <option value="No"> No </option>
                                                <?php
                                            }
                                        ?>
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