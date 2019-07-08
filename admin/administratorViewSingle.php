<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/administratorMenuActivation.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query  = "SELECT * FROM user WHERE userId = '$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get record");    
        
        while($row = mysqli_fetch_assoc($result)){
                        
            $city = $row['city'];            
            $address = $row['address'];
            $country = $row['country'];
            $lastName = $row['lastName'];            
            $telephone = $row['telephone'];
            $firstName = $row['firstName'];
            $middleName = $row['middleName'];
            $emailAddress = $row['emailAddress'];

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
                    <li>  View Single Record </li>
                </ul>   
            </div>                        
        </div>
        <!-- END BREAD CRUMBS ROW -->
        
        <!-- BEGIN ADD ADMINISTRATOR ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                
                <!-- BEGIN TITLE -->
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                </div>   
                <!-- END TITLE -->
                
                <!-- BEGIN TABLE -->
                <table class="table">
                    <tr>
                        <td>First Name</td>
                        <td><?php echo $firstName; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Middle Name</td>
                        <td><?php echo $middleName; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Last Name</td>
                        <td><?php echo $lastName; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Telephone</td>
                        <td><?php echo $telephone; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Email Address</td>
                        <td><?php echo $emailAddress; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Address</td>
                        <td><?php echo $address; ?></td>
                    </tr>
                    
                    <tr>
                        <td>City</td>
                        <td><?php echo $city; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Country</td>
                        <td><?php echo $country; ?></td>
                    </tr>                    
                    
                </table>

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
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_add=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_add=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_add=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END SLIDESHOW ADD -->
                                        
                                        <!-- BEGIN STOCK ADD -->
                                        <?php 
                                            if($stock_add=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
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
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_edit=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_edit=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_edit=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
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
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_delete=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_delete=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_delete=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
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
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_view_all=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_view_all=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_view_all=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
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
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
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
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END ADMIN ADD -->

                                        <!-- BEGIN CATEGORY ADD -->
                                        <?php 
                                            if($category_view_single=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CATEGORY ADD -->
                                        
                                        <!-- BEGIN PRODUCT ADD -->
                                        <?php 
                                            if($product_view_single=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END PRODUCT ADD -->

                                        <!-- BEGIN SLIDESHOW ADD -->
                                        <?php 
                                            if($slideshow_view_single=="Yes"){?>
                                                <td>
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
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
                                                    <i class="fa fa-check font-green-haze"></i>
                                                </td>
                                        <?php 
                                            }else{
                                        ?>
                                                <td>
                                                    <i class="fa fa-remove font-red-sunglo"></i>
                                                </td>
                                        <?php
                                            }
                                        ?>
                                        <!-- END CUSTOMER ADD -->
                                    </tr>

                                    <tr>
                                        <td colspan="3"> 
                                            <a href="administratorEdit.php?id=<?php echo urlencode($id);?>" class="btn yellow btn-outline sbold uppercase"> Edit </a> 
                                        </td>
                                        <td colspan="4"> 
                                            <a href="administratorDelete.php?id=<?php echo urlencode($id);?>" class="btn red btn-outline sbold uppercase"> Delete </a> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                <!-- END TABLE -->
            </div>
        </div>
        <!-- END ADD ADMINISTRATOR ROW -->

    </div>
    <!-- END RIGHT COLUMN -->

</div>
<!-- BEGIN PAGE BODY ROW -->

<?php
    include("includeFiles/footer.php");
?>