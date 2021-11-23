<?php
    $user_id = $_SESSION['id'];
    if(isset($_GET['insert'])){
        $sql = "INSERT INTO `tb_billing`(`user_id`, `product_id`, `amount`, `create_at`) 
        VALUES('" . $user_id . "', '') ";
    }
