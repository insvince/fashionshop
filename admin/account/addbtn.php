<?php
    include_once "../../php/config.php";

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $fullname = $_POST['add_fname'];
    $mail = $_POST['add_mail'];
    $psw = $_POST['add_password'];
    $dob = $_POST['add_dob'];
    $phone = $_POST['add_phone'];
    $address = $_POST['add_address'];
    $role = $_POST['add_role'];
    $create = date("Y-m-d H:i:s");

    $sql_2 = "INSERT INTO `tb_users` (`fullname`, `email`, `password`, `dob`, `number_phone`, `address`, `role`, `create_at`) VALUES ('" . $fullname . "', '" . $mail . "', '" . $psw . "', '" . $dob . "', '" . $phone . "', '" . $address . "', '" . $role . "', '" . $create . "') ";

    $sql_check = "SELECT `email` FROM `tb_users` WHERE `email` = '" . $mail . "' ";
    $rs_2 = mysqli_query($conn, $sql_check);
    $row_2 = mysqli_num_rows($rs_2);

    if($row_2 > 0 ){
        header("location: add.php?error=" . $mail . " đã tồn tại!");
    }else{
        mysqli_query($conn, $sql_2);
        header("location: add.php?success=Thêm thành công!");
    }