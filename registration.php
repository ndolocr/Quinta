<?php include('include/session.php'); ?>

<?php   
    include('dbfiles/dbconnect.php');    

    //Setting variables
    $incoming_error_message = "";

    //Processing registration
    if(isset($_POST['submit']))    {
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

            //Saving Customer information in database
            //Check Customer Information
            $customer_query = "SELECT * FROM customer ORDER BY customerId DESC LIMIT 1";
            $customer_result = mysqli_query($connect, $customer_query) or die("Error getting customer record!");
            //Check number of records.
            $customer_num_rows = mysqli_num_rows($customer_result);

            if($customer_num_rows==0){
                $customerId = 0;
            }else{
                while($customer_row = mysqli_fetch_assoc($customer_result)){
                    $customer_id = $customer_row['customerId'];
                    $customerId = $customer_id + 1;
                }
            }
            
            //Insert Admin information
            $insert_customer_query = "INSERT INTO customer "
                    ."(customerId, userId)"
                    ."VALUES"
                    ."('$customerId', '$userId')";
            $insert_customer_results = mysqli_query($connect, $insert_customer_query) or die("Error saving Customer record!");
            
            //Setting Session Variables            
            $_SESSION['login']                  = true;
            $_SESSION['city']                   = $city;                
            $_SESSION['email']                  = $email;  
            $_SESSION['id']                     = $userId;
            $_SESSION['address']                = $address;              
            $_SESSION['country']                = $country;
            $_SESSION['lastname']               = $last_name;
            $_SESSION['firstname']              = $first_name;
            $_SESSION['middlename']             = $middle_name;

            header("Location:index.php");
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
            Register
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
        <form action="registration.php" method="POST">
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
                        <input type="text" name="firstName" placeholder="Enter your Firstname!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Middle Name </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-adn"></i>
                        </span>
                        <input type="text" name="middleName" placeholder="Enter your Middlename!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Last Name </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-adn"></i>
                        </span>
                        <input type="text" name="lastName" placeholder="Enter your Lastname!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Email Address </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="text" name="email" placeholder="Enter your Email!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Address </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-book"></i>
                        </span>
                        <input type="text" name="address" placeholder="Enter your Address!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Country </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-flag"></i>
                        </span>
                        <input type="text" name="country" placeholder="Enter your Country!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> City </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </span>
                        <input type="text" name="city" placeholder="Enter your City!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Telephone </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" name="telephone" placeholder="Enter your Telephone!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Password </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        <input type="password" name="password" placeholder="Enter your Password!" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Confirm Password </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        <input type="password" name="confirmPassword" placeholder="Renter your Password!" class="form-control">
                    </div>
                </div>

                <div class="form-action">
                    <button type="submit" name="submit" class="btn blue sbold uppercase"> Register </button>
                </div>

            </div>
            
        </form>
    </div>
</div>             
                                      
<?php
    include('include/footer.php');
?>