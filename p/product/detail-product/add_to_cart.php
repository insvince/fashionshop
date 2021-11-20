<?php
    session_start();
    $this_id = $_GET['this_id'];
    if(isset($_SESSION['user_mail'])){
        if(isset($_SESSION['cart'])){
            // $session_array_id = array_column($_SESSION['cart'], 'id');
    
            // if(!in_array($_GET['this_id'], $session_array_id)){
            //     $session_array = array(
            //         'id' => $_GET['this_id'],
            //         "name" => $_POST['name'],
            //         "price" => $_POST['price'],
            //         "amount" => $_POST['amount'],
            //     );
    
            //     $_SESSION['cart'][] = $session_array;
            // }else{
            //     header("location: product.php?error=san pham da co trong gio hang!!");
            // }
        }else{
            // $session_array = array(
            //     'id' => $_GET['this_id'],
            //     "name" => $_POST['name'],
            //     "price" => $_POST['price'],
            //     "amount" => $_POST['amount'],
            // );
    
            // $_SESSION['cart'][] = $session_array;
            // header("location: product.php?this_id=".$_GET['this_id']);
        }   
    }else{
        header("location: detail-product.php?this_id=".$this_id."&error=Chưa đăng nhập,đăng nhập ngay");
    }
