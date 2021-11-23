<?php 
    include_once "../../php/config.php";

    $this_id = $_GET['this_id'];
    
    $sql = "SELECT `role` FROM `tb_users` WHERE `id` = '" . $this_id . "' ";

    $rs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($rs);

    if($row['role'] == "Admin"){
        
        $sql_demote = "UPDATE `tb_users` SET `role` = 'User' WHERE `id` = '" . $this_id . "' ";

        mysqli_query($conn, $sql_demote);
        
        header("location: index.php?success=Giáng chức thành công ?.?");
    }else{
        header("location: index.php?error=Không thể giáng chức cho User!");
    }