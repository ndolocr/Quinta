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
            
            //Access levels
            $admin_add = $row['admin_add']; 
            $admin_edit = $row['admin_edit'];
            $admin_delete = $row['admin_delete'];
            $admin_view_all = $row['admin_view_all'];
            $admin_view_single = $row['admin_view_single'];

            $category_add = $row['category_add'];
            $category_edit = $row['category_edit'];
            $category_delete = $row['category_delete'];
            $category_view_all = $row['category_view_all'];
            $category_view_single = $row['category_view_single'];

            $product_add = $row['product_add'];
            $product_edit = $row['product_edit'];
            $product_delete = $row['product_delete'];
            $product_view_all = $row['product_view_all'];
            $product_view_single = $row['product_view_single'];

            $slideshow_add = $row['slideshow_add'];
            $slideshow_edit = $row['slideshow_edit'];
            $slideshow_delete = $row['slideshow_delete'];
            $slideshow_view_all = $row['slideshow_view_all'];
            $slideshow_view_single = $row['slideshow_view_single'];

            $stock_add = $row['stock_add'];

            $customer_view_all = $row['customer_view_all'];
            $customer_view_single = $row['customer_view_single'];
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

            //Getting values of Checkboxes 
            //Add
            if(isset($_POST['admin_add'])){
                $admin_add = "Yes"; 
            }else{
                $admin_add = "No";
            }

            if(isset($_POST['category_add'])){
                $category_add = "Yes"; 
            }else{
                $category_add = "No";
            }

            if(isset($_POST['product_add'])){
                $product_add = "Yes"; 
            }else{
                $product_add = "No";
            }

            if(isset($_POST['slideshow_add'])){
                $slideshow_add = "Yes"; 
            }else{
                $slideshow_add = "No";
            }

            if(isset($_POST['stock_add'])){
                $stock_add = "Yes"; 
            }else{
                $stock_add = "No";
            }            
            

            //Edit
            if(isset($_POST['admin_edit'])){
                $admin_edit = "Yes"; 
            }else{
                $admin_edit = "No";
            }

            if(isset($_POST['category_edit'])){
                $category_edit = "Yes"; 
            }else{
                $category_edit = "No";
            }

            if(isset($_POST['product_edit'])){
                $product_edit = "Yes"; 
            }else{
                $product_edit = "No";
            }

            if(isset($_POST['slideshow_edit'])){
                $slideshow_edit = "Yes"; 
            }else{
                $slideshow_edit = "No";
            }

            //View All
            if(isset($_POST['admin_view_all'])){
                $admin_view_all = "Yes"; 
            }else{
                $admin_view_all = "No";
            }

            if(isset($_POST['category_view_all'])){
                $category_view_all = "Yes"; 
            }else{
                $category_view_all = "No";
            }

            if(isset($_POST['product_view_all'])){
                $product_view_all = "Yes"; 
            }else{
                $product_view_all = "No";
            }

            if(isset($_POST['slideshow_view_all'])){
                $slideshow_view_all = "Yes"; 
            }else{
                $slideshow_view_all = "No";
            }

            if(isset($_POST['customer_view_all'])){
                $customer_view_all = "Yes"; 
            }else{
                $customer_view_all = "No";
            }

            //View All
            if(isset($_POST['admin_view_single'])){
                $admin_view_single = "Yes"; 
            }else{
                $admin_view_single = "No";
            }

            if(isset($_POST['category_view_single'])){
                $category_view_single = "Yes"; 
            }else{
                $category_view_single = "No";
            }

            if(isset($_POST['product_view_single'])){
                $product_view_single = "Yes"; 
            }else{
                $product_view_single = "No";
            }

            if(isset($_POST['slideshow_view_single'])){
                $slideshow_view_single = "Yes"; 
            }else{
                $slideshow_view_single = "No";
            }

            if(isset($_POST['customer_view_single'])){
                $customer_view_single = "Yes"; 
            }else{
                $customer_view_single = "No";
            }

        
            //Deelete
            if(isset($_POST['admin_delete'])){
                $admin_delete = "Yes"; 
            }else{
                $admin_delete = "No";
            }

            if(isset($_POST['category_delete'])){
                $category_delete = "Yes"; 
            }else{
                $category_delete = "No";
            }

            if(isset($_POST['product_delete'])){
                $product_delete = "Yes"; 
            }else{
                $product_delete = "No";
            }

            if(isset($_POST['slideshow_delete'])){
                $slideshow_delete = "Yes"; 
            }else{
                $slideshow_delete = "No";
            }
            
            $query = "UPDATE user SET "
                    . "firstName='$first_name', "
                    . "lastName='$last_name', "
                    . "middleName='$middle_name', "
                    . "address='$address', "
                    . "city='$city', "
                    . "country='$country', "
                    . "telephone='$telephone', "
                    . "emailAddress='$email_address', "
                    . "admin_add='$admin_add', "
                    . "admin_edit='$admin_edit', "
                    . "admin_delete='$admin_delete', "
                    . "admin_view_all='$admin_view_all', "
                    . "admin_view_single='$admin_view_single', "
                    . "category_add='$category_add', "
                    . "category_edit='$category_edit', "
                    . "category_delete='$category_delete', "
                    . "category_view_all='$category_view_all', "
                    . "category_view_single='$category_view_single', "
                    . "product_add='$product_add', "
                    . "product_edit='$product_edit', "
                    . "product_delete='$product_delete', "
                    . "product_view_all='$product_view_all', "
                    . "product_view_single='$product_view_single', "
                    . "slideshow_add='$slideshow_add', "
                    . "slideshow_edit='$slideshow_edit', "
                    . "slideshow_delete='$slideshow_delete', "
                    . "slideshow_view_all='$slideshow_view_all', "
                    . "slideshow_view_single='$slideshow_view_single', "
                    . "stock_add='$stock_add', "
                    . "customer_view_all='$customer_view_all', "
                    . "customer_view_single='$customer_view_single' "
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

                            <!-- BEGIN ADMINISTRATOR ACCESS LEVELS -->
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="7" style="font-weight: bold; text-align: center;">
                                            Administrator Access Levels
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> # </th>
                                        <th> Admin </th>
                                        <th> Category </th>
                                        <th> Product </th>
                                        <th> Slideshow </th>
                                        <th> Stock </th>
                                        <th> Customer </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Add </td>
                                        <!-- BEGIN ADMIN ADD -->
                                        <?php 
                                            if($admin_add=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="admin_add" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="admin_add">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_add=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="category_add" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="category_add">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_add=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="product_add" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="product_add">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_add=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_add" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_add">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END SLIDESHOW ADD -->
                                        
                                        <!-- BEGIN STOCK ADD -->
                                        <?php 
                                            if($stock_add=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="stock_add" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="stock_add">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END STOCK ADD -->
                                        
                                        
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td> Edit </td>

                                        <!-- BEGIN ADMIN ADD -->
                                        <?php 
                                            if($admin_edit=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="admin_edit" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="admin_edit">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_edit=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="category_edit" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="category_edit">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_edit=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="product_edit" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="product_edit">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_edit=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_edit" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_edit">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END SLIDESHOW ADD -->
                                        
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td> Delete </td>

                                        <!-- BEGIN ADMIN ADD -->
                                        <?php 
                                            if($admin_delete=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="admin_delete" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="admin_delete">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_delete=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="category_delete" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="category_delete">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_delete=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="product_delete" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="product_delete">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_delete=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_delete" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_delete">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END SLIDESHOW ADD -->
                                        
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td> View All </td>
                                        
                                        <!-- BEGIN ADMIN ADD -->
                                        <?php 
                                            if($admin_view_all=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="admin_view_all" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="admin_view_all">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_view_all=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="category_view_all" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="category_view_all">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_view_all=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="product_view_all" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="product_view_all">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_view_all=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_view_all" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_view_all">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END SLIDESHOW ADD -->

                                        <td> </td>

                                        <!-- BEGIN CUSTOMER ADD -->
                                        <?php 
                                            if($customer_view_all=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="customer_view_all" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="customer_view_all">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CUSTOMER ADD -->
                                    </tr>
                                    <tr>
                                        <td> View Single </td>
                                        
                                        <!-- BEGIN ADMIN ADD -->
                                        <?php 
                                            if($admin_view_single=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="admin_view_single" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="admin_view_single">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_view_single=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="category_view_single" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="category_view_single">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_view_single=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="product_view_single" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="product_view_single">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_view_single=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_view_single" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="slideshow_view_single">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END SLIDESHOW ADD -->

                                        <td> </td>

                                        <!-- BEGIN CUSTOMER ADD -->
                                        <?php 
                                            if($customer_view_single=="Yes"){?>
                                                <td>
                                                    <input type="checkbox" name="customer_view_single" checked>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <input type="checkbox" name="customer_view_single">
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CUSTOMER ADD -->
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END ADMINISTRATOR ACCESS LEVELS -->
                            <div class="form-actions">
                                <input type="submit" value="Edit Admin" name="submit" class="btn green uppercase" />
                                <input type="reset"  value="Cancel" class="btn default uppercase">
                            </div>

                            <!-- BEGIN INPUT CONTROL -->
                            <!-- <div class="input-controls"> 
                                <div class="label-button">

                                </div>                                
                                <div class="control-button"> 
                                    <input type="submit" name="submit"  value="Edit" class="input-button">
                                </div>                                            
                                <div class="clear-float"></div>
                            </div> -->
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