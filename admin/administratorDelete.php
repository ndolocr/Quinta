<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/administratorMenuActivation.php");
    
    //Saving Administrator Details
    if(isset($_GET['id'])){
        //Get Admin Details from database
        $id = $_GET['id'];
        $query  = "SELECT * FROM user WHERE userId = '$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get record");
        //Capture Capture Uservalues
        
        while($row = mysqli_fetch_assoc($result)){
            $city = $row['city'];        
            $address = $row['address'];
            $country = $row['country'];               
            $last_name = $row['lastName'];        
            $telephone = $row['telephone'];
            $first_name = $row['firstName'];
            $middle_name = $row['middleName'];
            $email_address = $row['emailAddress'];            
        }
    }
    
    if(isset($_POST['delete'])){
        $id         = $_POST['id'];
        $admin_query = "DELETE FROM admin WHERE userId='$id'";
        $admin_result = mysqli_query($connect, $admin_query) or die("Unable to delete admin record");
        
        $user_query = "DELETE FROM user WHERE userId='$id'";
        $user_result = mysqli_query($connect, $user_query) or die("Unable to delete user record");
        
        header('Location:administratorViewAll.php');
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
                    <li> <a href="administratorViewAll.php"> Administrator  </a> </li>
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
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> Name </th>
                                        <th style="text-align: center;"> Email </th>
                                        <th style="text-align: center;"> Phone </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style='text-align: center; color:#e7505a;'> 
                                            <?php echo $first_name."".$last_name; ?>                                            
                                        </td>
                                        <td style='text-align: center; color:#e7505a;'> 
                                            <?php echo $email_address ?>                                            
                                        </td>
                                        <td style='text-align: center; color:#e7505a;'> 
                                            <?php echo "0".$telephone ?>                                            
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan='3' style='text-align: center; color:#e7505a;'>
                                            Are you sure you want to delete this record?
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style='text-align: center;'>
                                            <a href="administratorViewAll.php" class="btn green uppercase"> Cancel </a>
                                        </td>
                                        
                                        <td></td>
                                        
                                        <td>                                            
                                            <form action="administratorDelete.php" method="POST"> 
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