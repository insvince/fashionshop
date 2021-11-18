<?php 
    include_once "../../php/config.php";
    $this_id = $_GET['this_id'];
    
    $sql = "SELECT `role` FROM `tb_users` WHERE `id` = '". $this_id ."' ";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);
    if($row['role'] == "Admin"){
        header("location: index.php?error=Không thể thăng chức cho Admin!");
    }else{
        $sql_promote = "UPDATE `tb_users` SET `role` = 'Admin' WHERE `id` = '". $this_id ."' ";
        mysqli_query($conn, $sql_promote);
        header("location: index.php?success=Thăng chức thành công ?.?");
    }