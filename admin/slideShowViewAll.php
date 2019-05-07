<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/slideShowMenuActivation.php");
    
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
                    <li> <a href="slideShowViewAll.php"> Slide Show  </a> </li>
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
                    <span class="caption-subject font-blue-madison bold uppercase">View All Slide Show Images</span>
                </div>   
                <!-- END TITLE -->
                
                <!-- BEGIN TABLE -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th> Published </th>                            
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM slideshow ORDER BY slideShowId ASC";
                            $result = mysqli_query($connect, $query) or die("Unable to get record");                                      

                            $num = 1;
                            while($row = mysqli_fetch_assoc($result)){                                                                
                                $id = $row['slideShowId'];
                                echo "<tr>";
                                    echo "<td>";
                                        echo $num;
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<img src='images/uploads/slideshow/".$row['image']."'alt='product' class='img img-show-admin' style='width: 150px;'>";
                                    echo "</td>";                                        

                                    echo "<td>";
                                        echo $row['publish'];
                                    echo "</td>";
                                    
                                    echo"<td> <a href='slideShowEdit.php?id=".urlencode($id)."' class='btn yellow btn-outline sbold uppercase'> Edit </a> </td>";

                                    echo"<td> <a href='slideShowDelete.php?id=".urlencode($id)."' class='btn red btn-outline sbold uppercase'> Delete </a> </td>";

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