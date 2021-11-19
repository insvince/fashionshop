<?php 
 include_once "../../php/config.php";
$this_id = $_GET['this_id'];
$sql = "UPDATE `tb_billing` SET `status` = 'Nhận' WHERE `id_bill` = '$this_id' ";
mysqli_query($conn, $sql);
header("location: index.php?success=Đã nhận");