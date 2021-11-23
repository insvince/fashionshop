<?php 
    session_start();
    if(isset($_GET['action'])){
        if(isset($_GET['action']) == "remove"){
            foreach ($_SESSION['cart'] as $key => $value) {
                if($_GET['this_id'] == $value['id']){
                    unset($_SESSION['cart'][$key]);
                    header("location: cart-page.php");
                }
            }
        }
        
    }   
