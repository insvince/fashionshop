<?php
    include_once "../../php/config.php";

    if(isset($_POST['addbtn'])){
        
        $name = $_POST['addname'];
        $sql = "INSERT INTO `tb_category`( `name`) VALUES ('" . $name . "') ";

        if(empty($name)){
            header("location: http://localhost/fashionshop/admin/c/err-input/");
        }else{
            mysqli_query($conn, $sql);
            header("location: http://localhost/fashionshop/admin/c/success");
        }
    }
    