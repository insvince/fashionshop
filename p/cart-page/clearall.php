<?php 
session_start();
    if(isset($_GET['action'])){

        if(isset($_GET['action']) == "clearall"){
            unset($_SESSION['cart']);
            header("location: cart-page.php?clearall");
        }
        
    }