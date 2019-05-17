<?php 
    //Find session
    session_start();
    
    //Unset all session variables
    $_SESSION = array();
    
    //Destroy the session cookie
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-42000, '/');
    }
    
    //destroy the session
    session_destroy();
    
    //redirect page
    header('Location: index.php');
    
?>