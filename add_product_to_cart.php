<?php 
    include('include/session.php');    
    include('dbfiles/dbconnect.php');

    if(isset($_GET['productId'])){
        $productId = $_GET['productId'];

        $prodQuery = "SELECT * FROM product WHERE productId='$productId'";
        $prodResult = mysqli_query($connect, $prodQuery);

        while($prodRow = mysqli_fetch_assoc($prodResult)){
            $unit_price = $prodRow['sellingPrice'];
        }

        if($_SESSION['login']){

            //Get Post information
            
            $customerId = $_SESSION['id'];
            


            
            //Determine new records Id
            $cart_search_query = "SELECT * FROM cart ORDER BY cartId DESC LIMIT 1";
            $cart_search_result = mysqli_query($connect, $cart_search_query) or die("Error getting Cart records");
            $num_rows = mysqli_num_rows($cart_search_result);
            
            //Determine Card Id
            if($num_rows){
                while($cart_row = mysqli_fetch_assoc($cart_search_result)){
                    $cart_id = $cart_row['cartId'];
                    $cartId = $cart_id+1;
                }
            }else{
                $cartId = 1;

            }

            //Insert record in cart table
            $current_date = date("Y-m-d");            
            $cart_query = "INSERT INTO cart "
            ."(cartId, customerId, productId, unitPrice, transactionDate) "
            ."VALUES "
            ."('$cartId', '$customerId', '$productId', '$unit_price', '$current_date')";

            $cart_result = mysqli_query($connect, $cart_query) or die("Error Saving Cart Record!");

            header('Location: ' . $_SERVER['HTTP_REFERER']);           
        }else{
            header('Location: login.php');
            die;
        }
    }

    
        
    include('include/footer.php');
?>