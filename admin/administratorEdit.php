<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/administratorMenuActivation.php");
    
    //Error messages
    $city_error_message = "";
    $town_error_message = "";
    $address_error_message = "";
    $country_error_message = "";
    $password_error_message = "";
    $telephone_error_message = "";
    $last_name_error_message = "";
    $first_name_error_message = "";
    $middle_name_error_message = "";
    $email_address_error_message = "";
    
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
    
    //Saving Administrator Details
    if(isset($_POST['submit'])){
        //Capture POST Values
        $userId = $_POST['userId'];
        $city = $_POST['city'];        
        $address = $_POST['address'];
        $country = $_POST['country'];
        $last_name = $_POST['lastName'];        
        $telephone = $_POST['telephone'];
        $first_name = $_POST['firstName'];
        $middle_name = $_POST['middleName'];
        $email_address = $_POST['email'];
        
        //Validations
        if($first_name==""){
            $first_name_error_message = "* First Name required!";            
        }elseif($last_name==""){
            $last_name_error_message = "* Last Name required!";
        }elseif($email_address==""){
             $email_error_message = "* Email Address information required!";
        }elseif($address==""){
             $address_error_message = "* Address information required!";
        }elseif($country ==""){
            $country_error_message = "* Country information required!";
        }elseif($city==""){
            $city_error_message = "* City information required!";        
        }else{
            
            /*
             * Step 1:- Get User record and update information             
            */
            
            $query = "UPDATE user SET "
                    . "firstName='$first_name', "
                    . "lastName='$last_name', "
                    . "middleName='$middle_name', "
                    . "address='$address', "
                    . "city='$city', "
                    . "country='$country', "
                    . "telephone='$telephone', "
                    . "emailAddress='$email_address' "
                    . "WHERE userId='$userId'";
            $result = mysqli_query($connect, $query) or die("Error Saving user record!");
            
            header('Location:administratorViewAll.php');
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
                    <li> <a href="administratorViewAll.php"> Administrator  </a> </li>
                    <li>  Edit </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->
                <form method="POST" action="administratorEdit.php">

                    <div class="row">
                        <!-- START LEFT BOX -->
                        <div class="col-md-1"> </div>
                        <!-- END LEFT BOX -->

                        <div class="col-md-10 middle-box">                                         

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    First Name
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="firstName" value="<?php echo $first_name; ?>"  placeholder="First Name" class="input-text">
                                </div>
                                <div class="first-name-error-message">
                                    <?php echo $first_name_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Middle Name
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="middleName" value="<?php echo $middle_name; ?>"  placeholder="Middle Name" class="input-text">
                                </div>
                                <div class="middle-name-error-message">
                                    <?php echo $middle_name_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Last Name
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="lastName" value="<?php echo $last_name; ?>" placeholder="Last Name" class="input-text">
                                </div>                                            
                                <div class="last-name-error-message">
                                    <?php echo $last_name_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->                                                       
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Email Address
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="email" value="<?php echo $email_address; ?>"  placeholder="Email Address" class="input-text">
                                </div>
                                <div class="email-address-error-message">
                                    <?php echo $email_address_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Address
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="address" value="<?php echo $address; ?>" placeholder="Address" class="input-text">
                                </div>
                                <div class="address-error-message">
                                    <?php echo $address_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Country
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="country" value="<?php echo $country; ?>" placeholder="Country" class="input-text">
                                </div>
                                <div class="country-error-message">
                                    <?php echo $country_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    City
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="city" value="<?php echo $city; ?>" placeholder="City" class="input-text">
                                </div>
                                <div class="city-error-message">
                                    <?php echo $city_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->                                                                                                           

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Telephone
                                </div>                                            
                                <div class="control"> 
                                    <input type="text" name="telephone" value="<?php echo $telephone; ?>" placeholder="Telephone" class="input-text">
                                </div>
                                <div class="telephone-error-message">
                                    <?php echo $telephone_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->
                            
                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                                                          
                                <div class="control"> 
                                    <input type="text" name="userId" value="<?php echo $id; ?>" hidden="true" class="input-text">
                                </div>                                
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label-button">

                                </div>                                
                                <div class="control-button"> 
                                    <input type="submit" name="submit"  value="Edit" class="input-button">
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