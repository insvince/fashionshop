<?php

$mail = $_POST['umail'];
$psw = $_POST['upsw'];

$sql = "SELECT * FROM tb_users WHERE `email` = '" . $mail . "' AND `password` = '" . $psw . "' ";

$rs = mysqli_query($conn, $sql);
$row = mysqli_num_rows($rs);
$row = mysqli_fetch_array($rs);

if ($row > 0) {
    if ($row['role'] == "Admin") {
        header("location: http://localhost/fashionshop/p/log-page/log-page.php/error-role");
    }
    if ($row['role'] == "User") {
        $_SESSION['user_mail'] = $mail;
        $_SESSION['id'] = $row['id'];
        header("location: http://localhost/fashionshop/home");
    }
} else {
    header("location: http://localhost/fashionshop/p/log-page/log-page.php/error-account");
}
