<?php
    SESSION_START();
    
    if(!$_SESSION['login']){
       header("location:index.php");
       die;
    }
?>