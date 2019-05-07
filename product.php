<?php
    include('dbfiles/dbconnect.php');
    include('include/header.php');
    
    $category_query = "SELECT * FROM category";
    $category_result = mysqli_query($connect, $category_query) or die("Unable to get Category records");
    
?>

