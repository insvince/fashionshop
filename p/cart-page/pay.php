<?php 
    session_start();
    include_once "../../php/config.php";
    include_once "../../mail/sendmail.php";

 


    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $user_id = $_SESSION['id'];
    $this_id = $_POST['this_id'];
    $amount = $_POST['amount'];
    $sizes = $_POST['size'];
    $code_order = rand(99,99999);
    $create = date("Y-m-d H:i:s");
   
    foreach ($this_id as $id => $key) {
        $result[$key] = array(
            'amount'  => $amount[$id],
            'size' => $sizes[$id],
        );
    }

    //add cart id
    $add_id = "INSERT INTO `tb_cart`(`user_id`, `code_cart`) VALUES ('" . $user_id . "', '" . $code_order . "') ";

    $query_add_id = mysqli_query($conn, $add_id);

    if($query_add_id){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($this_id == $value['id']){
                unset($_SESSION['cart'][$key]);
            }

            $quanlity = $amount[$key];
            $id_product = $value['id'];
            $size = $result[$value['id']]['amount'];

            // add detail item
            $detail_product = "INSERT INTO `tb_cart_item`(`product_id`, `code_cart`, `amout`, `size_id`) VALUES ('" . $id_product . "', '" . $code_order . "', '" . $quanlity . "', '" . $size . "') ";

            $detail = mysqli_query($conn, $detail_product);
           


            //add billing
            $billing = "INSERT INTO `tb_billing`(`code_cart`, `create_at`) 
            VALUES('" . $code_order . "', '" . $create . "') ";

            $add_billing = mysqli_query($conn, $billing);
           
        }
        $tieude = "Đặt hàng website hstore.store.com thành công";
        $noidung = "<p>Cám ơn quý khách đã đặt hàng của H Store, mã đơn hàng : " . $code_order . "</p>  ";
        $maildathang = $_SESSION['user_mail'];
        $mail = new Mailer();
        $mail->send_mail($tieude , $noidung, $maildathang);
        
    }  
    
    unset($_SESSION['cart']);
    header("location: http://localhost/fashionshop/p/cart-page/pay-succ");
    



