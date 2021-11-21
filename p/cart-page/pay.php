<?php 
    session_start();
    include_once "../../php/config.php";

    $user_id = $_SESSION['id'];
    $this_id = $_POST['this_id'];
    $amount = $_POST['amount'];
    $code_order = rand(99,99999);
    $this_amount = array_combine($this_id, $amount);

    //time Ho chi minh city 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $create = date("Y-m-d H:i:s");

    //add cart id
    $add_id = "INSERT INTO `tb_cart`(`user_id`, `code_cart`) VALUES ('".$user_id."', '".$code_order."') ";
    $query_add_id = mysqli_query($conn, $add_id);
    
    if($query_add_id){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($this_id == $value['id']){
                unset($_SESSION['cart'][$key]);
            }
            $quanlity = $amount[$key];
            $id_product = $value['id'];

            // add detail item
            $detail_product = "INSERT INTO `tb_cart_item`(`product_id`, `code_cart`, `amout`) VALUES ('$id_product', '$code_order', '$quanlity') ";
            $detail = mysqli_query($conn, $detail_product);

            //add billing
            $billing = "INSERT INTO `tb_billing`(`code_cart`, `create_at`) 
            VALUES('$code_order', '$create') ";
            $add_billing = mysqli_query($conn, $billing);
        }
        unset($_SESSION['cart']);
        header("location: cart-page.php?success=Thanh toán thành công!");
    }
    

