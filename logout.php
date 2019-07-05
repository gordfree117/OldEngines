<?php 
session_start(); 


    echo "logout button pressed";
    session_unset(); 
    session_destroy(); 
    header("location: index.php");

?>