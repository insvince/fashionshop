<?php
    session_start();
    include "../../php/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Danh Mục</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        a.active{
            pointer-events: none;
        }
        #container{
            height: 900px;
        }
        #container .content{
            padding: 50px 30px;
            width: 85%;
            margin: 20px auto;
            background-color: whitesmoke;
            border-radius: 15px;
        }
        a{
            text-decoration: none;
        }
       
        .up{
            border: 1px solid;
            border-radius: 5px;
            padding: 10px 10px;
            margin: 10px;
            background-color: lightgreen !important;
            color: black !important;
            font-weight: 600;
        }
        .down{
            border: 1px solid;
            border-radius: 5px;
            padding: 10px 10px;
            margin: 10px;
            background-color: lightcoral !important;
            color: black !important;
            font-weight: 600;
        }
        #container td:last-child{
            height: 50px;
            max-height: auto;
        }
        th,td  {
            white-space: nowrap;
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
            <div class="bar-content" >
                <div class="avatar" style="text-align: center;">
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
                    <li><a class="active">Danh Sách Danh Mục</a></li>
                    <li><a href="../product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a href="../account/index.php">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content" style= "display: flex; flex-direction: column;">
                <div class="add" style="text-align: center; margin: 10px 0;">

                    <form action="add.php" method="post">
                        <input type="text" name="addname" style="padding: 10px 5px; border-radius: 5px; border: 1px solid;text-align: center;width: 30%">
                        <button type="submit" name="addbtn" style="padding: 10px 5px ; background-color: lightgreen;border: 1px solid; border-radius: 5px;">Thêm</button>
                    </form>
                    
                </div>
                <?php if(isset($_GET['error'])){  echo "<p style= 'margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;'>". $_GET['error'] . "</p>"; } 
                 if(isset($_GET['success'])){  echo "<p style= 'margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;'>". $_GET['success'] . "</p>"; } ?>
                <table style= "max-width: 50%; margin: 0 auto">
                    <tr>
                        <th>ID</th>
                        <th>Tên Loại</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM tb_category ORDER BY id ASC ";
                        $rs = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($rs)){
                                
                    ?>
                    <tr>
                        <td><?=$row['id'];?></td>
                        <td><?=$row['name'];?></td>
                        <td><?= ( ($row['name'] == "Bộ Sưu Tập" || $row['name'] == "Mới") ? "Nổi Bật" : "Đang Bán") ?></td>
                        <td>
                            <div class="edit">
                                <a class="up" href="./edit.php?this_id=<?=$row['id']?>">
                                    Sửa
                                </a>
                                <a class="down" href="./delete.php?this_id=<?=$row['id']?>">
                                    Xóa
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
</html>