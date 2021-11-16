<?php 
    session_start();
     
    if(isset($_SESSION['a_userSession'])){
        unset($_SESSION['a_userSession']);
    }      
    header('Location: loginadmin.php');
?>