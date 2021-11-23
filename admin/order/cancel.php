<?php 
    include_once "../../php/config.php";
    
    $this_id = $_GET['this_id'];

    $sql = "UPDATE `tb_billing` SET `status` = 'Hủy' WHERE `id_bill` = '" . $this_id . "' ";

    mysqli_query($conn, $sql);

    header("location: index.php?success=Đã hủy");
