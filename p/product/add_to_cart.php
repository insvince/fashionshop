<?php
    session_start();
    include_once "../../php/config.php";

    $this_id = $_GET['this_id'];
    $id = $row['id'];
    $name = $row['name'];
    $img = $row['img'];
    $price = $row['price'];

    $sql = "SELECT * FROM `tb_product` WHERE `id` = '" . $this_id . "' ";

    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    
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
                if($session_array_id['id'] = $_GET['this_id']){
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if($_GET['this_id'] == $value['id']){
                            unset($_SESSION['cart'][$key]);
                        }
                       
                    }
                }

                $session_array = array(
                    'id' => $id,
                    "name" => $name,
                    "price" => $price,
                    "amount" => $_POST['amount'],
                    "img" => $img,
                );

                $_SESSION['cart'][] = $session_array;
                header("location: product.php?success=Them thanh cong");
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
            header("location: product.php?this_id=". $this_id );
        }   
    }else{
        header("location: product.php?error?error=chua dang nhap");
    }
