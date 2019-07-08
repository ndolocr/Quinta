<?php 
    include('include/session.php');
    include('dbfiles/dbconnect.php');

    if(isset($_GET['cart_id'])){
        $id = $_GET['cart_id'];
        
        $query = "SELECT * FROM cart WHERE cartId = '$id'";
        $result = mysqli_query($connect, $query);

        while($row = mysqli_fetch_assoc($result)){
            $original_quantity = $row['quantity'];
        }

        $quantity = $original_quantity + 1;

        echo $quantity;

        $edit_query = "UPDATE cart SET quantity = '$quantity' WHERE cartId = '$id'";
        $edit_result = mysqli_query($connect, $edit_query);

        header("Location:cart.php");

    }
?>    

    