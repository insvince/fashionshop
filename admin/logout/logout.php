<?php 
    session_start();
    if(isset($_SESSION['a_mail'])){
        unset($_SESSION['a_mail']);
        header("location: http://localhost/Exercise/admin/login/login.php");
    }