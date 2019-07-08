<?php
    include("includeFiles/checkSession.php");
    include("includeFiles/header.php");
    include("includeFiles/menu.php");
    
    include("includeFiles/dashboardActivation.php");


    
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
                </ul>   
            </div>
        </div>
        <!-- END BREAD CRUMBS ROW -->

        <!-- BEGIN BREAD CRUMBS ROW -->
        <div class="row">                        
            <div class="col-sm-12 col-lg-12 col-xl-12 col-md-12 ">
                <form action="home.php" method="POST" >
                    <table style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <td style="padding: 3px; font-weight: bold;"> 
                                    Transaction 
                                </td>
                                <td style="padding: 3px; font-weight: bold;">  
                                    From 
                                </td>
                                <td style="padding: 3px; font-weight: bold;">  
                                    To 
                                </td>
                                <td style="padding: 3px; font-weight: bold;"> 
                                    By 
                                </td>
                                <td style="padding: 3px; font-weight: bold;"> 
                                     
                                </td>
                                <td style="padding: 3px; font-weight: bold;"> 
                                    
                                </td>
                            </tr>    
                        </thead>
                        



                        <tr> 
                            <td style="padding-right: 10px;">
                                <select name="transaction" class="input-text">
                                    <option value="checkout"> Items Bought </option>
                                    <option value="cart"> Items in Cart </option>                                
                                </select>
                            </td>

                            <td style="padding-right: 10px;">
                                <input type="date" id="date_from" name="date_from" class="form-control">
                            </td>

                            <td style="padding-right: 10px;">
                                <input type="date" id="date_to" name="date_to" class="form-control">
                            </td>

                            <td style="padding-right: 10px;">
                                <select name="customer" class="input-text">
                                    <option value="all">---------- All ----------</option>
                                    <?php
                                    $query  = "SELECT * FROM user";
                                    $result = mysqli_query($connect, $query);

                                    while($row = mysqli_fetch_assoc($result)){
                                        $userId = $row['userId'];
                                        
                                        /*$uQuery  = "SELECT * FROM user WHERE userId='$userId'";
                                        $uResult = mysqli_query($connect, $uQuery);
                                        while($uRow = mysqli_fetch_assoc($uResult)){*/
                                            ?>                                                            
                                                <option value="<?php echo $row['userId']; ?>"> <?php echo $row['firstName']." ".$row['lastName']; ?> </option>
                                            <?php
                                        //}                                    
                                    }
                                    ?>
                                </select>
                            </td>

                            <td style="padding: 3px; font-weight: bold;"> 
                                <input type="submit" value="Search" name="submit" class="btn blue uppercase" />
                            </td>

                            <td style="padding: 3px; font-weight: bold;">
                                <input type="reset"  value="Cancel" class="btn default uppercase">
                            </td>
                        </tr>
                    </table> 
                </form>  
            </div>
        </div>
        <!-- END BREAD CRUMBS ROW -->


        <!-- BEGIN ADD CUSTOMER ROW -->
        <div class="row">
            <div class="col-sm-12 col-md-12 main-page-content">
                <!-- BEGIN TITLE -->
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">View All Customers</span>
                </div>   
                <!-- END TITLE -->
                
                <!-- BEGIN TABLE -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Name </th>
                            <th> Product </th>
                            <th> Unit Price </th>
                            <th> Quantity Ordered</th>
                            <th> Total Cost</th>
                            <th> TransactionDate </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if(isset($_POST['submit'])){
                                $date_to = $_POST['date_to'];
                                $customer = $_POST['customer'];
                                $date_from = $_POST['date_from'];
                                $transaction = $_POST['transaction'];

                                if($transaction=="cart"){
                                    //SQL Queries on Cart Table
                                    if($customer=="all"){
                                        if($date_from){
                                            if($date_to){
                                                $squery = "SELECT * FROM cart WHERE transactionDate >= '$date_from' AND transactionDate <= '$date_to'";
                                            }else{
                                                $squery = "SELECT * FROM cart WHERE transactionDate >= '$date_from'";
                                            }                    
                                        }
                                        $squery = "SELECT * FROM cart";            
                                    }else{
                                        if($date_from){
                                            if($date_to){
                                                $squery = "SELECT * FROM cart WHERE customerId = '$customer' AND transactionDate >= '$date_from' AND transactionDate <= '$date_to'";
                                            }else{
                                                $squery = "SELECT * FROM cart WHERE customerId = '$customer' AND transactionDate >= '$date_from'";
                                            }                    
                                        }
                                        $squery = "SELECT * FROM cart WHERE customerId = '$customer'";
                                    }
                                }else{
                                    //SQL Queries on Checkout Table
                                    if($customer=="all"){
                                        if($date_from){
                                            if($date_to){
                                                $squery = "SELECT * FROM checkout WHERE transactionDate >= '$date_from' AND transactionDate <= '$date_to'";
                                            }else{
                                                $squery = "SELECT * FROM checkout WHERE transactionDate >= '$date_from'";
                                            }                    
                                        }
                                        $squery = "SELECT * FROM checkout";            
                                    }else{
                                        if($date_from){
                                            if($date_to){
                                                $squery = "SELECT * FROM checkout WHERE customerId = '$customer' AND transactionDate >= '$date_from' AND transactionDate <= '$date_to'";
                                            }else{
                                                $squery = "SELECT * FROM checkout WHERE customerId = '$customer' AND transactionDate >= '$date_from'";
                                            }                    
                                        }
                                        $squery = "SELECT * FROM checkout WHERE customerId = '$customer'";
                                    }
                                }

                                $sresult = mysqli_query($connect, $squery) or die("Error!"); 
                                $num = 1;

                                while($srow = mysqli_fetch_assoc($sresult)){
                                $productId = $srow['productId'];
                                $customerId = $srow['customerId'];
                                $unitPrice = $srow['unitPrice'];
                                $quantity = $srow['quantity'];
                                $created_on = $srow['transactionDate'];

                                echo "<tr>";
                                    echo "<td>";
                                        echo $num;
                                    echo "</td>";
                                    $user_query = "SELECT * FROM user WHERE userId = '$customerId'";
                                    $user_result = mysqli_query($connect, $user_query) or die("Unable to get User Record");

                                    while($user_row = mysqli_fetch_assoc($user_result)){
                                        echo "<td>";
                                            echo $user_row['firstName']." ".$user_row['lastName'];
                                        echo "</td>";
                                    }

                                    $product_query = "SELECT * FROM product WHERE productId = '$productId'";
                                    $product_result = mysqli_query($connect, $product_query) or die("Unable to get product Record");

                                    while($product_row = mysqli_fetch_assoc($product_result)){
                                        echo "<td>";
                                            echo $product_row['productName'];
                                        echo "</td>";
                                    }

                                    echo "<td>";
                                        echo $unitPrice;
                                    echo "</td>";

                                    echo "<td>";
                                        echo $quantity;
                                    echo "</td>";

                                    echo "<td>";
                                        echo $quantity*$unitPrice;
                                    echo "</td>";

                                    echo "<td>";
                                        echo $created_on;
                                    echo "</td>";

                                    $num++;
                               
                                }  
                            }                                     
                        ?>  
                    </tbody>
                </table>
                <!-- END TABLE -->
            </div>
        </div>
        <!-- END ADD CUSTOMER ROW -->


    </div>
    <!-- END RIGHT COLUMN -->

</div>
<!-- END PAGE BODY ROW -->

<?php
    include("includeFiles/footer.php");
?>