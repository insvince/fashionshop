<?php
    $name = $_POST['urname'];
    $mail = $_POST['urmail'];
    $password = $_POST['urpsw'];
    $phone = $_POST['phone'];
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $create = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `tb_users`(`fullname`, `email`, `password`, `number_phone`, `create_at`, `role`) VALUES ('$name', '$mail', '$password', '$phone', '$create', 'User')";

    $sql_2 = "SELECT `email` FROM `tb_users` WHERE email = '$mail' ";
    $check = mysqli_query($conn, $sql_2);
    $row = mysqli_num_rows($check);

    if($row > 1){
        header("location: log-page.php?error=Tài khoản đã tồn tại!");
    }else{
        mysqli_query($conn, $sql);
        header("location: log-page.php?success=Đăng ký thành công!");
    }