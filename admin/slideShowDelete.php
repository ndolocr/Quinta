<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/slideShowMenuActivation.php");
    
    //Saving Administrator Details
    if(isset($_GET['id'])){        
        $id = $_GET['id'];
        $query  = "SELECT * FROM slideshow WHERE slideShowId = '$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get record");        
        
        while($row = mysqli_fetch_assoc($result)){           
            $image = $row['image'];
            $publish = $row['publish'];
        }
    }
    
    if(isset($_POST['delete'])){
        $id         = $_POST['id'];
        $query = "DELETE FROM slideshow WHERE slideShowId='$id'";
        $result = mysqli_query($connect, $query) or die("Unable to delete product record");
        
        header('Location:slideShowViewAll.php');
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
                    <li>  Delete </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->                

                    <div class="row">
                        <!-- START LEFT BOX -->
                        <div class="col-md-1"> </div>
                        <!-- END LEFT BOX -->

                        <div class="col-md-10 middle-box">                                         
                            
                            <table class="table">
                                <!--<thead>
                                    <tr>
                                        <th style="text-align: center;"> Slide Show </th>
                                        <th style="text-align: center;"> Slide Show </th>
                                        <th style="text-align: center;"> Published  </th>                                        
                                    </tr>
                                </thead>-->
                                <tbody>
                                    <tr>
                                        <td colspan='2' style='text-align: center; color:#e7505a;'> 
                                            <!-- BEGIN INPUT CONTROL -->
                                            
                                                    <div class="edit-image">
                                                        <div class="image">
                                                            <img src="images/uploads/slideshow/<?php echo $image; ?>" alt=""> 
                                                        </div>
                                                    </div>
                                                    <input type="text" value="<?php echo $id; ?>" name="slideShowId" hidden="true">
                                                
                                            <!-- END INPUT CONTROL -->                                            
                                        </td>
                                        <!--<td style='text-align: center; color:#e7505a;'> 
                                            <?php echo $publish ?>                                            
                                        </td>-->
                                    </tr>
                                    
                                    <tr>
                                        <td colspan='2' style='text-align: center; color:#e7505a;'>
                                            Are you sure you want to delete this record?
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style='text-align: center;'>
                                            <a href="slideShowViewAll.php" class="btn green uppercase"> Cancel </a>
                                        </td>
                                        
                                        <td style='text-align: center;'>                                            
                                            <form action="slideShowDelete.php" method="POST"> 
                                                <input type="text" value="<?php echo $id; ?>"  name="id" hidden="true">
                                                <input type="submit" name="delete" value="Delete" class='btn red uppercase' /> 
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>


                    </div>

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