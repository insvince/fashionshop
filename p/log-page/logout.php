<?php 
    session_start();
    
    if(isset($_SESSION['user_mail'])){
        unset($_SESSION['user_mail']);
        header("location: http://localhost/fashionshop/");
    }