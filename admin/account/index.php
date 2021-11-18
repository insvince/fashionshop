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
    <title>Quản Lý Tài Khoản</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        table{
            white-space: nowrap;
        }
        .content{
            background-color: whitesmoke;
            overflow-x: scroll;
            margin: 50px auto !important;
            border-radius: 15px;
            width: 90%;
        }
        .up{
            background-color: lightgreen !important;
            color: black !important;
        }
        .down{
            background-color: lightcoral !important;
            color: black !important;
        }
        .button-add button{
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
                <li><a  href="../index.php">Thống Kê</a></li>
                    <li><a href="../category/index.php" href="">Danh Sách Danh Mục</a></li>
                    <li><a href="../product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a class="active">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <?php if(isset($_GET['error'])){  echo "<p style= 'margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;'>". $_GET['error'] . "</p>"; } 
                 if(isset($_GET['success'])){  echo "<p style= 'margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;'>". $_GET['success'] . "</p>"; } ?>
                <table style= "max-width: 50%; margin: 0 auto">
                    <!-- row -->
                    <tr>
                        <!-- column -->
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Ngày Sinh</th>
                        <th>SĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Ngày Tạo</th>
                        <th>Quyền Hạn</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM `tb_users` ORDER BY `id` ASC ";
                        $rs = mysqli_query($conn, $sql);
                        while( $row = mysqli_fetch_array($rs) ){
                            $date = $row['create_at'];
                            $dob = $row['dob'];
                            $formatDate = date('d/m/Y',strtotime($date));
                            $formatDob = date('d/m/Y',strtotime($dob));
                    ?>
                    <tr> 
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['fullname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $dob == NULL ? "" : $formatDob ?></td>
                        <td><?= $row['number_phone'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $formatDate  ?></td>
                        <td><?= $row['role'] ?></td>
                        <td><div class="edit">
                            <button class="up">Promote</button>
                            <button class="down">Demote</button>
                        </div></td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="button-add">
                    <button>Thêm</button>
                </div>
            </div>
           
        </div>
    </div>
</body>
</html>