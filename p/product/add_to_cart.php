<?php
    session_start();
    include_once "../../php/config.php";
    
    $page = $_GET['page'];
    
    $this_id = $_GET['this_id'];
    
    $sql = "SELECT * FROM `tb_product` WHERE `id` = '" . $this_id . "' ";

    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);

    echo $id = $row['id'];
    echo $name = $row['name'];
    echo $img = $row['img'];
    echo $price = $row['price'];

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
                    "size" => 1,
                );
                $_SESSION['cart'][] = $session_array;
                if($page == 'index'){
                    header("location: http://localhost/fashionshop/success");
                }else{
                    header("location: http://localhost/fashionshop/p/product/p-success");
                }
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
                    "size" => 1,
                );

                $_SESSION['cart'][] = $session_array;
                if($page == 'index'){
                    header("location: http://localhost/fashionshop/warning-cart");
                }else{
                    header("location: http://localhost/fashionshop/p/product/p-warning-cart");
                }
            }
        }else{
            $session_array = array(
                'id' => $id,
                "name" => $name,
                "price" => $price,
                "amount" => 1,
                "img" => $img,
                "size" => 1,
            );
    
            $_SESSION['cart'][] = $session_array;
            if($page == 'index'){
                header("location: http://localhost/fashionshop/success");
            }else{
                header("location: http://localhost/fashionshop/p/product/p-success");
            }
        }   
    }else{
        if($page == 'index'){
            header("location: http://localhost/fashionshop/failure");
        }else{
            header("location: http://localhost/fashionshop/p/product/p-failure");
        }
    }
