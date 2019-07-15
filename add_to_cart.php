<?php 
    include('include/session.php');
    include('dbfiles/dbconnect.php');

    if(isset($_GET['id'])){
        $category_id = $_GET['url'];
        $product_id = $_GET['id'];

        //Get Post information
        $quantity = 1;
        $productId = $product_id;        
        $customerId = $_SESSION['id'];

        $product_query = "SELECT * FROM product WHERE productId = '$productId'";
        $product_result = mysqli_query($connect, $product_query);
        while($product_row = mysqli_fetch_assoc($product_result)){
            $unit_price = $product_row['sellingPrice'];    
        }
        

            
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
        ."(cartId, customerId, productId, unitPrice, quantity, transactionDate) "
        ."VALUES "
        ."('$cartId', '$customerId', '$productId', '$unit_price', '$quantity', '$current_date')";

            $cart_result = mysqli_query($connect, $cart_query) or die("Error Saving Cart Record!");

            header('Location: category.php?id='.$category_id);            
        }else{
            header('Location: login.php');
            die;
        }

?>    

    