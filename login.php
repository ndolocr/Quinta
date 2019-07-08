<?php include('include/session.php'); ?>

<?php   
    include('dbfiles/dbconnect.php');    

    //Setting variables
    $incoming_error_message = "";

    //Processing Login
    if(isset($_POST['submit']))    {
        $email   = $_POST['email'];
        $pword   = $_POST['password'];

        if(empty($email) or empty($pword)){
            //send message to alert admin passwords do not match
            $incoming_error_message = "Invalid Login Details!"; 
        }else{
            //Encrypting my passwords
            //Using MD5 to encrypt the password
            $md5_password = md5($pword);
            //Encrypting ecnrypted password further with Sha1
            $sha1_password = sha1($md5_password);
            //Encrypting password further with crypt
            //Setting crype salt
            $salt = "my";
            $crypt_password = crypt($sha1_password, $salt);

            //Setting final value of password
            $password = $crypt_password;
            
            //Get Admin record
            $query = "SELECT * FROM user WHERE emailAddress = '$email' AND password = '$password'";
            $results = mysqli_query($connect, $query)or die(mysqli_error($connect)); 

            //Check to see if the record exists
            $numberofrows = mysqli_num_rows($results);
            
            if($numberofrows===0){
                $incoming_error_message = "Invalid Login Details!";                
            }else{
                while($row = mysqli_fetch_assoc($results)){
                    
                    $city                           = $row['city'];
                    $id                             = $row['userId'];
                    $country                        = $row['country'];
                    $address                        = $row['address'];
                    $password                       = $row['password'];
                    $last_name                      = $row['lastName'];
                    $telephone                      = $row['telephone'];                    
                    $first_name                     = $row['firstName'];
                    $middle_name                    = $row['middleName'];
                    $email                          = $row['emailAddress'];
                    
                }
                //Setting Session Variables
                $_SESSION['id']                     = $id;
                $_SESSION['login']                  = true;
                $_SESSION['city']                   = $city;                
                $_SESSION['email']                  = $email;  
                $_SESSION['address']                = $address;              
                $_SESSION['country']                = $country;
                $_SESSION['telephone']              = $telephone;
                $_SESSION['lastname']               = $last_name;
                $_SESSION['firstname']              = $first_name;
                $_SESSION['middlename']             = $middle_name;
                
                //Redirect Customer to Home Page
                header('Location: index.php');
            }
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
            Login
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
        <form action="login.php" method="POST">
            <div class="form-body">
                <div class="form-group">
                    <div class="input-group"> 
                        <span class="error_form" id="error_message" style="color: #E74C3C; border-bottom: dashed 1px #E74C3C; margin-bottom:200px; padding: 0% 0% 0% 0%; font-size: 20px; font-weight: bold; width: 100%;">
                            <?php echo $incoming_error_message; ?> 
                        </span>
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
                    <label> Password </label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        <input type="password" name="password" placeholder="Enter your Password!" class="form-control">
                    </div>
                </div>

                <div class="form-action">
                    <button type="submit" name="submit" class="btn blue sbold uppercase"> Login </button>
                </div>

            </div>
            
        </form>
    </div>
</div>             
                                      
<?php
    include('include/footer.php');
?>