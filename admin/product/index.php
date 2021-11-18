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
    <title>Quản Lý Sản Phẩm</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        a.active{
            pointer-events: none;
        }
        img{
            width: 70px;
            height: 80px;
        }
        #container{
            min-height: 900px;
        }
        .content{
            border-radius: 15px;
            margin: 50px auto !important;
            min-height: 600px;
            background-color: whitesmoke;
            overflow-x: scroll;
        }
        .button-add {
            width: 90%;
            margin: 0 auto;
        }
        .button-add button{
            cursor: pointer;
        }
        .up{
            background-color: lightgreen !important;
            color: black !important;
        }
        .down{
            background-color: lightcoral !important;
            color: black !important;
        }   
        table{
            text-align: center;
        }
        #container th,td, td:last-child {
            height: 50px;
            white-space: nowrap;
        }
        button,a{
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
                    <p >Admin</p>
                </div>
                <div class="list-edit">
                    <li><a href="../index.php">Thống Kê</a></li>
                    <li><a href="../category/index.php" href="">Danh Sách Danh Mục</a></li>
                    <li><a class="active">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a href="../account/index.php">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <?php if(isset($_GET['error'])){  echo "<p style= 'margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;'>". $_GET['error'] . "</p>"; } 
                if(isset($_GET['success'])){  echo "<p style= 'margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;'>". $_GET['success'] . "</p>"; } ?>
                <table>
                    <!-- row -->
                    <tr>
                        <!-- column -->
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Kho</th>
                        <th>Hình Ảnh</th>
                        <th>Mô Tả</th>
                        <th>Giá</th>
                        <th>Mã Danh Mục</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM `tb_product` ORDER BY id ASC ";
                        $rs = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($rs)){
                                
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['stock'] ?></td>
                        <td><img src="../../img/<?= $row['img'] ?>" alt="product"></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['category_id'] ?></td>
                        <td><div class="edit">
                            <a href="./edit.php?this_id=<?=$row['id']; ?>">
                                <button class="up">Sửa</button>
                            </a>
                            <a href="./delete.php?this_id=<?=$row['id']; ?>">
                                <button class="down">Xóa</button>
                            </a>
                        </div></td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="button-add">
                    <a href="./add.php">
                        <button>Thêm</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>