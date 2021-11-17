<?php
    include_once "../../php/config.php";

    if(isset($_POST['addbtn'])){
        $name = $_POST['addname'];
        $sql = "INSERT INTO `tb_category`( `name`) VALUES ('". $name ."') ";
        if(empty($name)){
            header("location: index.php?error=Nhập tên cần thêm đi nào!");
        }else{
            mysqli_query($conn, $sql);
            header("location: index.php?success=Đã thêm thành công!");
        }
    }
    