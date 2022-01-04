<?php
    include_once "../../php/config.php";

    $this_id = $_GET['this_id'];
    
    $sql = "DELETE FROM `tb_category` WHERE `id` = '" . $this_id . "'  ";

    mysqli_query($conn, $sql);

    header("location: http://localhost/Fashion/admin/c/error");