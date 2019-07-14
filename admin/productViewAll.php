<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/productMenuActivation.php");
    
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
                    <span class="caption-subject font-blue-madison bold uppercase">View All Products</span>
                </div>   
                <!-- END TITLE -->
                
                <!-- BEGIN TABLE -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th> Product Name </th>
                            <th> Brand </th>
                            <th> size</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM product ORDER BY categoryId ASC";
                            $result = mysqli_query($connect, $query) or die("Unable to get record");                                      

                            $num = 1;
                            while($row = mysqli_fetch_assoc($result)){                                                                
                                $id = $row['productId'];
                                echo "<tr>";
                                    echo "<td>";
                                        echo $num;
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<img src='images/uploads/products/".$row['image']."'alt='product' class='img-circle' style='width: 35px;'>";
                                    echo "</td>";                                        

                                    echo "<td>";
                                        echo $row['productName'];
                                    echo "</td>";

                                    echo "<td>";
                                        echo $row['brand'];
                                    echo "</td>";

                                    echo "<td>";
                                        echo $row['size'];
                                    echo "</td>";

                                    if($_SESSION['product_view_single']=="Yes"){
                                        echo"<td> <a href='productViewSingle.php?id=".urlencode($id)."' class='btn green btn-outline sbold uppercase'> View </a> </td>";
                                    }

                                    if($_SESSION['product_edit']=="Yes"){
                                        echo"<td> <a href='productEdit.php?id=".urlencode($id)."' class='btn yellow btn-outline sbold uppercase'> Edit </a> </td>";
                                    }

                                    if($_SESSION['product_delete']=="Yes"){
                                        echo"<td> <a href='productDelete.php?id=".urlencode($id)."' class='btn red btn-outline sbold uppercase'> Delete </a> </td>";
                                    }

                                echo "</tr>";

                                $num++;                                
                            }                                     
                        ?>  
                    </tbody>
                </table>
                <!-- END TABLE -->
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