<?php 
    session_start();
    include_once "../../php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        a.active{
            pointer-events: none;
        }
        .content{
            background-color: whitesmoke;
            border-radius: 15px;
            margin: 50px auto !important;
        }
        .accept{
            background-color: lightgreen !important;
            color: black !important;
        }
        .cancel{
            background-color: lightcoral !important;
            color: black !important;
        }
        button, a{
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="header">
            <div class="header-content">
                <h2>Fashion Admin</h2>
                <div class="header-tool">
                    <button><i class="fas fa-envelope"></i></button>
                    <button><i class="fas fa-bell"></i></button>
                </div>
            </div>
        </div>
        <div id="nav-bar">
            <div class="bar-content">
                <div class="avatar">
                    <!-- <img src="/img/logo.png" alt=""> -->
                    <i class="fas fa-user-tie"></i>
                    <?php
                        $session = $_SESSION['a_mail'];

                        $sql = "SELECT * FROM tb_users WHERE email = '$session' ";
                        $rs = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($rs);
                    ?>  
                    <p style="margin: 10px;">
                        <?=$row['fullname'];?>
                    </p>
                </div>
                <div class="list-edit">
                    <li><a href="../index.php" href="">Thống Kê</a></li>
                    <li><a href="../category/index.php" href="">Danh Sách Danh Mục</a></li>
                    <li><a href="../product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a class="active" href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a href="../account/index.php">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <table>
                    <!-- row -->
                    <tr>
                        <!-- column -->
                        <th>ID</th>
                        <th>Mã Tài Khoản</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Ngày Đặt</th>
                        <th>Giờ Đặt</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM `tb_billing`
                        INNER JOIN `tb_users` ON `tb_users`.id = `tb_billing`.user_id
                        INNER JOIN `tb_product` ON `tb_product`.id = `tb_billing`.product_id
                        ORDER BY `tb_billing`.id_bill ASC " ;
                        $rs = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($rs)){
                            $create = $row['create_at'];
                            $formatDate = date('d/m/Y',strtotime($create));
                            $formatTime = date('H:i:s',strtotime($create));
                    ?>
                    <tr>
                        <td><?= $row['id_bill'] ?></td>
                        <td><?= `tb_users`.$row['email'] ?></td>
                        <td><?= `tb_product`.$row['name'] ?></td>
                        <td><?= `tb_billing`.$row['amout'] ?></td>
                        <td><?= $formatDate ?></td>
                        <td><?= $formatTime ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><div class="edit">
                            <?php if($row['status'] != ""){
                                echo "<p style= 'text-align: center'>Đã ".$row['status']. "</p>";                                
                            ?>
                            <?php }else{ ?>
                                <a href="./accept.php?this_id=<?=$row['id_bill']?>">
                                <button class="accept">Nhận</button>
                                </a>
                                <a href="./cancel.php?this_id=<?=$row['id_bill']?>">
                                    <button class="cancel">Hủy</button>
                                </a>
                            <?php } ?>
                        </div></td>
                    </tr>
                 <?php } ?>
                </table>
            </div>
            
        </div>
    </div>
</body>
</html>