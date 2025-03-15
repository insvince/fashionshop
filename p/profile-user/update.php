<?php 
    include_once "../../php/config.php";

    $id = $_GET['account'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "UPDATE `tb_users` SET `fullname` = '" . $name . "', `password` = '" . $password . "', `dob` = '" . $dob . "', `address` = '" . $address . "', `number_phone` = '" . $phone . "' WHERE `id` = '" . $id . "' ";

    mysqli_query($conn, $sql);

    header("location: http://localhost/fashionshop/p/update/suc");