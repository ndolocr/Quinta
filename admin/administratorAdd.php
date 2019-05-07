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
    if(isset($_POST['submit'])){
        //Capture POST Values
        
        $city = $_POST['city'];        
        $address = $_POST['address'];
        $country = $_POST['country'];   
        $password = $_POST['password'];
        $last_name = $_POST['lastName'];        
        $telephone = $_POST['telephone'];
        $first_name = $_POST['firstName'];
        $middle_name = $_POST['middleName'];
        $email_address = $_POST['email'];
        $confirm_password = $_POST['confirmPassword'];
        
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
        }elseif($password<>$confirm_password){
            $password_error_message = "* Passwords do not match!";
        }elseif($telephone==""){
            $password_error_message = "* Phone number required!";
        }else{
            //Save Administrator Informatio in the database
            
            //Step 1:- Encrypting my passwords
            //Using MD5 to encrypt the password
            $md5_password = md5($password);
            //Encrypting ecnrypted password further with Sha1
            $sha1_password = sha1($md5_password);
            //Encrypting password further with crypt
            //Setting crype salt
            $salt = "my";
            $crypt_password = crypt($sha1_password, $salt);

            //Setting final value of password
            $password = $crypt_password;
        
            /*
             * Step 2:- Check number of record in staff table.
             * If there are no records, give the new record id number 1
             * If there are other records, check the last record and get
             * its id. Add one to the id to get the new id number.
            */
            
            $query = "SELECT * FROM user ORDER BY userId DESC LIMIT 1";
            $result = mysqli_query($connect, $query) or die("Error getting user record");
            //Check number of records.
            $num_rows = mysqli_num_rows($result);
            
             if($num_rows==0){
                $userId = 1;
             }else{
                 //Get last added Id and add one to it
                 while($row = mysqli_fetch_assoc($result)){
                        $num_id = $row['userId'];
                        $userId = $num_id + 1;
                 }
             }
            
             //Insert User values in database
             $insert_query = "INSERT INTO user "
                    ."(userId, firstName, lastName, middleName, address, city, country, telephone, emailAddress, password )"
                    ."VALUES"
                    ."('$userId', '$first_name', '$last_name', '$middle_name', '$address', '$city', '$country', '$telephone', '$email_address', '$password')";
            $insert_results = mysqli_query($connect, $insert_query) or die("Error saving user reocord!");

            //Saving Admin information in database
            //Check Admin Information
            $admin_query = "SELECT * FROM admin ORDER BY adminId DESC LIMIT 1";
            $admin_result = mysqli_query($connect, $admin_query) or die("Error getting admin record!");
            //Check number of records.
            $admin_num_rows = mysqli_num_rows($admin_result);

            if($admin_num_rows==0){
                $adminId = 0;
            }else{
                while($admin_row = mysqli_fetch_assoc($admin_result)){
                    $admin_id = $admin_row['adminId'];
                    $adminId = $admin_id + 1;
                }
            }
            
            //Insert Admin information
            $insert_admin_query = "INSERT INTO admin "
                    ."(adminId, userId)"
                    ."VALUES"
                    ."('$adminId', '$userId')";
            $insert_admin_results = mysqli_query($connect, $insert_admin_query) or die("Error saving admin record!");
            
            header("Location:viewAdministrator.php");
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
                    <li>  Add </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- START FORM -->
                <form method="POST" action="administratorAdd.php">

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
                                    <input type="text" name="firstName"  placeholder="First Name" class="input-text">
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
                                    <input type="text" name="middleName"  placeholder="Middle Name" class="input-text">
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
                                    <input type="text" name="lastName"  placeholder="Last Name" class="input-text">
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
                                    <input type="text" name="email"  placeholder="Email Address" class="input-text">
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
                                    <input type="text" name="address"  placeholder="Address" class="input-text">
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
                                    <input type="text" name="country"  placeholder="Country" class="input-text">
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
                                    <input type="text" name="city"  placeholder="City" class="input-text">
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
                                    <input type="text" name="telephone"  placeholder="Telephone" class="input-text">
                                </div>
                                <div class="telephone-error-message">
                                    <?php echo $telephone_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Password
                                </div>                                            
                                <div class="control"> 
                                    <input type="password" name="password"  placeholder="Password" class="input-text">
                                </div>
                                <div class="password-error-message">
                                    <?php echo $password_error_message; ?>
                                </div>
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label">
                                    Confirm Password
                                </div>                                            
                                <div class="control"> 
                                    <input type="password" name="confirmPassword"  placeholder="Confirm Password" class="input-text">
                                </div>                                            
                                <div class="clear-float"></div>
                            </div>
                            <!-- END INPUT CONTROL -->

                            <!-- BEGIN INPUT CONTROL -->
                            <div class="input-controls"> 
                                <div class="label-button">

                                </div>                                
                                <div class="control-button"> 
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