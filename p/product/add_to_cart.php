<?php
    session_start();
    include_once "../../php/config.php";

    $this_id = $_GET['this_id'];
    $sql = "SELECT * FROM `tb_product` WHERE `id` = '$this_id' ";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    
    $id = $row['id'];
    $name = $row['name'];
    $img = $row['img'];
    $price = $row['price'];

    if(isset($_SESSION['user_mail'])){
        if(isset($_SESSION['cart'])){
            
            $session_array_id = array_column($_SESSION['cart'], 'id');
    
            if(!in_array($this_id, $session_array_id)){
                $session_array = array(
                    'id' => $id,
                    "name" => $name,
                    "price" => $price,
                    "amount" => 1,
                    "img" => $img,
                );
    
                $_SESSION['cart'][] = $session_array;
                header("location: product.php?success=Them thanh cong");
            }else{
                header("location: product.php?error=san pham da co trong gio hang!!");
            }
        }else{
            $session_array = array(
                'id' => $id,
                "name" => $name,
                "price" => $price,
                "amount" => 1,
                "img" => $img,
            );
    
            $_SESSION['cart'][] = $session_array;
            header("location: product.php?this_id=".$this_id);
        }   
    }
