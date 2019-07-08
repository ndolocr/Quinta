<?php include('include/session.php'); ?>

<?php   
    include('dbfiles/dbconnect.php');    

    //Setting variables
    $incoming_error_message = "";

    //Getting Customer Id

    //Processing registration
    if(isset($_POST['submit']))    {
        $userId = $_SESSION['id'];
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
        
        }elseif($telephone==""){
            $password_error_message = "* Phone number required!";
        }else{
            
             //Insert User values in database
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

            //Setting Session Variables                
            $_SESSION['city']                   = $city;                
            $_SESSION['email']                  = $email;  
            $_SESSION['address']                = $address;              
            $_SESSION['country']                = $country;
            $_SESSION['telephone']              = $telephone;
            $_SESSION['lastname']               = $last_name;
            $_SESSION['firstname']              = $first_name;
            $_SESSION['middlename']             = $middle_name;

            header("Location:cart.php");
        }
        
    }
        
?>          

<?php
    include('include/header.php');
?>

<div class="row">
    <!-- BEGIN CATEGORY TITLE -->
    <div class="col-sm-12 product-title-bar">
        <div class="title">
            Edit Personal Details
        </div>                              
    </div>
    <!-- END CATEGORY TITLE -->
</div>
<!-- END ROW --> 

<div class="row">
    <!--<div class="col-md-6">
        Section One
    </div>-->

    <div class="col-md-6 col-md-offset-3">
        <form action="editCustomer.php" method="POST">
            <div class="form-body">
                <div class="form-group">
                    <div class="input-group"> 
                        <span class="error_form" id="error_message" style="color: #E74C3C; border-bottom: dashed 1px #E74C3C; margin-bottom:200px; padding: 0% 0% 0% 0%; font-size: 20px; font-weight: bold; width: 100%;">
                            <?php echo $incoming_error_message; ?> 
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label> First Name </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-adn"></i>
                        </span>
                        <input type="text" name="firstName" value="<?php echo $_SESSION['firstname']; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Middle Name </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-adn"></i>
                        </span>
                        <input type="text" name="middleName" value="<?php echo $_SESSION['middlename']; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Last Name </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-adn"></i>
                        </span>
                        <input type="text" name="lastName" value="<?php echo $_SESSION['lastname']; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Email Address </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Address </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-book"></i>
                        </span>
                        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Country </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-flag"></i>
                        </span>
                        <input type="text" name="country" value="<?php echo $_SESSION['country']; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> City </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </span>
                        <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Telephone </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" name="telephone" value="<?php echo $_SESSION['telephone']; ?>" class="form-control">
                    </div>
                </div>                

                <div class="form-action">
                    <button type="submit" name="submit" class="btn blue sbold uppercase"> Edit </button>
                </div>

            </div>
            
        </form>
    </div>
</div>             
                                      
<?php
    include('include/footer.php');
?>