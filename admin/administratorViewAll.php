<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/administratorMenuActivation.php");
    
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
                    <span class="caption-subject font-blue-madison bold uppercase">View All Administrators</span>
                </div>   
                <!-- END TITLE -->
                
                <!-- BEGIN TABLE -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Name </th>
                            <th> Email Address </th>
                            <th> </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM admin";
                            $result = mysqli_query($connect, $query) or die("Unable to get record");                                      

                            $num = 1;
                            while($row = mysqli_fetch_assoc($result)){
                                $adminId = $row['adminId'];
                                $userId = $row['userId'];

                                $user_query = "SELECT * FROM user WHERE userId = '$userId'";
                                $user_result = mysqli_query($connect, $user_query) or die("Unable to get User Record");

                                while($user_row = mysqli_fetch_assoc($user_result)){
                                    $id = $user_row['userId'];
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $num;
                                        echo "</td>";

                                        echo "<td>";
                                            echo $user_row['firstName']." ".$user_row['lastName'];
                                        echo "</td>";

                                        echo "<td>";
                                            echo $user_row['emailAddress'];
                                        echo "</td>";

                                        /*echo "<td>";
                                            echo $user_row['telephone'];
                                        echo "</td>";*/

                                        echo"<td> <a href='administratorViewSingle.php?id=".urlencode($id)."' class='btn green btn-outline sbold uppercase'> View </a> </td>";

                                        echo"<td> <a href='administratorEdit.php?id=".urlencode($id)."' class='btn yellow btn-outline sbold uppercase'> Edit </a> </td>";

                                        echo"<td> <a href='administratorDelete.php?id=".urlencode($id)."' class='btn red btn-outline sbold uppercase'> Delete </a> </td>";

                                    echo "</tr>";

                                    $num++;
                                }                                            
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