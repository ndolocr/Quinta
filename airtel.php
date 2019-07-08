<?php 
    include('include/session.php');    
    include('dbfiles/dbconnect.php');
    include('include/header.php');

   
    $code_error_message = "";    
    
    if(isset($_POST['submit'])){
        //Get POST values
        $code = $_POST['code'];
        $paymentMode = $_POST['company']; 

        if($code==""){
            $code_error_message = "* AIRTEL MONEY Code required to comlete transaction!";
        }else{
            //Checking number of records belonging to client
            $customerId = $_SESSION['id'];

            $cartQuery = "SELECT * FROM cart WHERE customerId='$customerId'";
            $cartResult = mysqli_query($connect, $cartQuery) or die("Unable to get cart records");

            while($cartRow = mysqli_fetch_assoc($cartResult)){


                $paymentMode = $paymentMode;
                $cartId = $cartRow['cartId'];
                $quantity = $cartRow['quantity'];                
                $productId = $cartRow['productId'];                
                $unit_price = $cartRow['unitPrice'];
                $current_date = date("Y-m-d");
                $totalCost = ($unit_price * $quantity);

                //Checkout checkout id
                $cQuery = "SELECT * FROM checkout ORDER BY checkOutId DESC LIMIT 1";
                $cResult = mysqli_query($connect, $cQuery) or die("Error getting checkout records");
                //Check number of records.
                $num_rows = mysqli_num_rows($cResult);

                if($num_rows==0){
                    $checkOutId = 1;
                 }else{
                     //Get last added Id and add one to it
                     while($row = mysqli_fetch_assoc($cResult)){
                            $num_id = $row['checkOutId'];
                            $checkOutId = $num_id + 1;
                     }
                 }

                //Saving Checkout record
                $checkoutQuery =  "INSERT INTO checkout "
                    ."(checkOutId, customerId, cartId, productId, quantity, totalCost, paymentMode, code, transactionDate )"
                    ." VALUES "
                    ."('$checkOutId', '$customerId', '$cartId', '$productId', '$quantity', '$totalCost', '$paymentMode', '$code', '$current_date' )";

                $checOutResults = mysqli_query($connect, $checkoutQuery) or die("Error saving checkout record!");

                //deleting cart record
                $cartDeleteQuery = "DELETE FROM cart WHERE cartId = '$cartId'";
                $cartDeleteResult = mysqli_query($connect, $cartDeleteQuery);

                //Reset Total to zero
                $_SESSION['total'] = 0;

                
            }

            ?>
                <div id="outer">
                    <div id="inner">
                        Thank you for shopping with us. Your order will be delivered at your address in two days time!
                    </div>
                </div>
            <?php            

        }

    }else{
        //Getting Product ID
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];        
            
            $query = "SELECT * FROM cart WHERE customerId='$id'";
            $result = mysqli_query($connect, $query) or die("Unable to get cart records");

            if(isset($_SESSION['total'])){
                $total = $_SESSION['total'];
            }

            ?>        

                <!-- BEGIN ROW -->
                <div class="row">
                    
                    <!-- BEGIN PRODUCT SECTION -->
                    <div class="col-md-12 ">
                        
                        <!-- BEGIN ROW -->
                        <div class="row">
                            <!--<div class="col-sm-2"> </div>-->
                            <div class="col-sm-4">
                                <div class="cart-headers"> Payment </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cart-headers"> Procedure </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cart-headers">  </div>
                            </div>                        
                        </div>
                        <!-- END ROW -->

                        <!-- BEGIN ROW -->
                        <div class="row cart-product-details">
                            <!--<div class="col-sm-2 greycol"> </div>-->
                            <div class="col-sm-4 side-bars"> 
                                <div class="prod_image_money"> 
                                    <img src="assets/img/airtel.png">
                                </div>                                            

                                <div class="clear-float"> </div>
                            </div>

                            <div class="col-sm-4 side-bars">                            
                                <ul>
                                    <li> Select WALLET From Airtel Menu </li>
                                    <li> Select AIRTEL MONEY. </li>
                                    <li> Select Buy Goods </li>
                                    <li> Till Number : 12345 </li>
                                    <li> Enter Amount required </li>
                                    <li> Enter AIRTEL MONEY PIN </li>
                                    <li> Press Enter! </li>
                                </ul>
                            </div>

                            <div class="col-sm-4 ">
                                <form method="POST" action="airtel.php">
                                    <!-- BEGIN INPUT CONTROL -->
                                    <div class="input-controls">                                          
                                        <div class="control"> 
                                            <b> Total Cost: Ksh. <?php echo $total; ?> </b>    
                                        </div>                                    
                                        <div class="clear-float"></div>
                                    </div>
                                    <!-- END IMPUT CONTROL -->

                                    <!-- BEGIN INPUT CONTROL -->
                                    <div class="input-controls"> 
                                        <div class="label">                                        
                                        </div>                                            
                                        <div class="control"> 
                                            <input type="text" name="code"  placeholder="AIRTEL MONEY Code" class="input-text">
                                            <input type="text" name="company"  value="AIRTEL" hidden="true">
                                        </div>
                                        <div class="code-error-message" style="color:#F00;">
                                            <?php echo $code_error_message; ?>
                                        </div>
                                        <div class="clear-float"></div>
                                    </div>
                                    <!-- END IMPUT CONTROL -->

                                    <!-- BEGIN INPUT CONTROL -->
                                    <div class="input-controls"> 
                                        <div class="label-button">

                                        </div>                                
                                        <div class="control-button"> 
                                            <input type="submit" name="submit"  value="Confirm Payment" class="input-button">
                                        </div>                                            
                                        <div class="clear-float"></div>
                                    </div>
                                    <!-- END INPUT CONTROL -->
                                </form>                             
                                                              
                            </div>

                        </div>
                        <!-- END ROW -->                        
                          
                          <!-- BEGIN ROW -->
                        <div class="row cart-product-details">
                            <!--<div class="col-sm-2 greycol"> </div>-->
                            

                        </div>
                        <!-- END ROW -->

                    </div>
                    <!-- END PRODUCT SECTION -->

                    <div class="col-md-1"></div>
                    
                   </div>
                <!-- END ROW -->
            <?php    
        }
    }
?>

<?php    
    include('include/footer.php');
?>