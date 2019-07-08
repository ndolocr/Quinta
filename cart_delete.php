<?php 
    include('include/session.php');
    include('dbfiles/dbconnect.php');

    if(isset($_GET['cart_id'])){
        $id = $_GET['cart_id'];
        
        $query = "DELETE FROM cart WHERE cartId = '$id'";
        $result = mysqli_query($connect, $query);

        header("Location:cart.php");

    }
?>    

    