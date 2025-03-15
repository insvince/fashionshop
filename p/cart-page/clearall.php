<?php 
    session_start();
    if(isset($_GET['action'])){
        if(isset($_GET['action']) == "clearall"){
            unset($_SESSION['cart']);
            header("location: http://localhost/fashionshop/p/cart-page/");
        }
    }