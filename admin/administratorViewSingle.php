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
                    
                    <tr>
                        <td> <a href="administratorEdit.php?id=<?php echo urlencode($id);?>" class="btn yellow btn-outline sbold uppercase"> Edit </a> </td>
                        <td> <a href="administratorDelete.php?id=<?php echo urlencode($id);?>" class="btn red btn-outline sbold uppercase"> Delete </a> </td>
                    </tr>
                    
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