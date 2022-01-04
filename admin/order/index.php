<?php 
    session_start();
    include_once "../../php/config.php";
    include_once "../../php/defined.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= ADMIN ?>css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
  
</head>
<body>
    <div id="main">
        <div id="header">
            <div class="header-content">
                <h2>Fashion Admin</h2>
                <div class="header-tool">
                    <button>
                        <i class="fas fa-envelope"></i>
                    </button>
                    <button>
                        <i class="fas fa-bell"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="nav-bar">
            <div class="bar-content">
                <div class="avatar">
                    <i class="fas fa-user-tie"></i>
                    <?php
                        $session = $_SESSION['a_mail'];

                        $sql = "SELECT * FROM tb_users WHERE email = '" . $session . "' ";

                        $rs = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($rs);
                    ?>  
                    <p style="margin: 10px;">
                        <?=$row['fullname'];?>
                    </p>
                </div>
                <div class="list-edit">
                    <li>
                        <a href="<?= ADMIN ?>" >Thống Kê</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>cate/">Danh Sách Danh Mục</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>pro/">Danh Sách Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>ns/">Danh Sách Bài Viết</a>
                    </li>
                    <li>
                        <a class="active" href="<?= ADMIN ?>or/">Danh Sách Đơn Hàng</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>acc/">Danh Sách Tài Khoản</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>out/">Đăng Xuất</a>
                    </li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày Đặt</th>
                        <th>Giờ Đặt</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM `tb_billing`
                        ORDER BY `tb_billing`.id_bill ASC " ;
                        
                        $rs = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($rs)){
                            $create = $row['create_at'];
                            $formatDate = date('d/m/Y',strtotime($create));
                            $formatTime = date('H:i:s',strtotime($create));
                    ?>
                    <tr>
                        <td><?= $row['id_bill'] ?></td>
                        <td><?= `tb_users`.$row['code_cart'] ?></td>
                        <td><?= $formatDate ?></td>
                        <td><?= $formatTime ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <div class="edit">
                                <a href="./accept.php?this_id=<?=$row['id_bill']?>">
                                    <button class="accept">Nhận</button>
                                </a>
                                <a href="./cancel.php?this_id=<?=$row['id_bill']?>">
                                    <button class="cancel">Hủy</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                 <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
<style>
    .content{
        background-color: whitesmoke;
        border-radius: 15px;
        margin: 20px auto !important;
        min-height: 500px;
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
        p.error{
        margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;
    }
        p.success{
        margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;
    }
</style>
</html>