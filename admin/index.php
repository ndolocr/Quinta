<?php
    SESSION_START();
    //Import Database Files
    require_once ("../dbfiles/dbconnect.php");
    
    //Initiate variables
    $incoming_error_message = "";
    
    if(isset($_POST['login'])){
        
        $email      = $_POST['email'];
        $pword      = $_POST['password'];
        
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
            $results = mysqli_query($connect, $query)or die(mysql_error());	

            //Check to see if the record exists
            $num_rows = mysqli_num_rows($results);
            
            if($num_rows===0){
                $incoming_error_message = "Invalid Login Details!";                
            }else{
                while($row = mysqli_fetch_assoc($results)){
                    $userId = $row['userId'];
                    $email = $row['emailAddress'];
                    $last_name = $row['lastName'];
                    $first_name = $row['firstName'];
                }
                
                $admin_query = "SELECT * FROM admin WHERE userId = '$userId'";
                $admin_results = mysqli_query($connect, $admin_query)or die(mysql_error());
                $num_admin_rows = mysqli_num_rows($admin_results);
                
                if($num_admin_rows===0){
                    $incoming_error_message = "Invalid Login Details!";
                }else{
                    while($admin_row = mysqli_fetch_all($admin_results)){
                        $adminId = $admin_row['adminId'];
                    }
                    
                     //Setting Session Variables
                    $_SESSION['login'] = true;
                    $_SESSION['userId'] = $userId;                        
                    $_SESSION['adminId'] = $adminId;
                    $_SESSION['email'] = $email_address;
                    $_SESSION['last_name'] = $last_name;
                    $_SESSION['first_name'] = $first_name;
                        
                    header('Location: home.php');
                }
            }
        }
    }
    
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> AZURY | TRADERS </title>        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        
        <!-- BEGIN CSS FILES -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />       
        <link href="../assets/css/login-4.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.min.css" rel="stylesheet" type="text/css" />
        <!-- END CSS FILES -->
    </head>
    
    <body class=" login">
        
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" name="login" action="index.php" method="POST">
                <h3 class="form-title">ADMIN | LOGIN</h3>                
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                </div> 
                <span class="error_form" id="error_message" style="color: #E74C3C; border-bottom: dashed 1px #E74C3C; margin: 0 auto; padding: 0% 0% 1% 0%; font-size: 16px; font-weight: bold; width: 100%;">
                    <?php echo $incoming_error_message; ?> 
                </span>
                <div class="form-actions"> 
                
                    <input type="submit" value="Login" name="login" class="btn green pull-right"/> 
                </div>
                
                <!--<div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p> No worries, click
                        <a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>
                </div>-->
                
            </form>
            <!-- END LOGIN FORM -->            
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        
        <!-- END COPYRIGHT -->
    </body>
    
</html>
