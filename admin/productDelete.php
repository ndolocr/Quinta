<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/productMenuActivation.php");
    
    //Saving Administrator Details
    if(isset($_GET['id'])){
        //Get Admin Details from database
        $id = $_GET['id'];
        $query  = "SELECT * FROM product WHERE productId = '$id'";
        $result = mysqli_query($connect, $query) or die("Unable to get record");
        //Capture Capture Uservalues
        
        while($row = mysqli_fetch_assoc($result)){
            $size = $row['size'];
            $color = $row['color'];
            $image = $row['image'];
            $brand = $row['brand'];
            $subCategory = $row['categoryId'];
            $productName = $row['productName'];
            $productDescription = $row['productDescription'];            
        }
    }
    
    if(isset($_POST['delete'])){
        $id         = $_POST['id'];
        $query = "DELETE FROM product WHERE productId='$id'";
        $result = mysqli_query($connect, $query) or die("Unable to delete product record");
        
        header('Location:productViewAll.php');
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
                    <li> <a href="productViewAll.php"> Products  </a> </li>
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
                                        <th style="text-align: center;"> Product Name </th>
                                        <th style="text-align: center;"> Brand  </th>
                                        <th style="text-align: center;"> Size </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style='text-align: center; color:#e7505a;'> 
                                            <?php echo $productName; ?>                                            
                                        </td>
                                        <td style='text-align: center; color:#e7505a;'> 
                                            <?php echo $brand ?>                                            
                                        </td>
                                        <td style='text-align: center; color:#e7505a;'> 
                                            <?php echo $size ?>                                            
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan='3' style='text-align: center; color:#e7505a;'>
                                            Are you sure you want to delete this record?
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style='text-align: center;'>
                                            <a href="productViewAll.php" class="btn green uppercase"> Cancel </a>
                                        </td>
                                        
                                        <td></td>
                                        
                                        <td style='text-align: center;'>                                            
                                            <form action="productDelete.php" method="POST"> 
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