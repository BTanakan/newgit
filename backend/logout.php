<?php 
    session_start();
    
    session_destroy();
    header('location: ../index.php');
    var_dump("logout");
    exit(0);
?>