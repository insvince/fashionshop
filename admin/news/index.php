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
    <title>Quản Lý Bài Viết</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL ?>admin/css/style.css">
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
                    <p >
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
                        <a class="active" href="<?= ADMIN ?>ns/">Danh Sách Bài Viết</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>or/">Danh Sách Đơn Hàng</a>
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
                <?php if(isset($_GET['error'])){  echo "<p class='error' >". $_GET['error'] . "</p>"; } 
                 if(isset($_GET['success'])){  echo "<p class='success' >". $_GET['success'] . "</p>"; } ?>
                <table>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tiều Đề</th>
                        <th>Loại</th>
                        <th>Văn Bản</th>
                        <th>Người Tạo</th>
                        <th>Ngày Tạo</th>
                        <th>Giờ</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <?php 

                        $sql = "SELECT * FROM `tb_users` RIGHT JOIN tb_post ON `tb_users`.id = `tb_post`.user_id ORDER BY `tb_post`.id ASC" ;

                        $rs = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($rs)){
                        $create = $row['create'];

                        $formatDate = date('d/m/Y',strtotime($create));
                        $formatTime = date('H:i:s',strtotime($create));
                    ?>
                    <tr>
                        <td><?= $row['id']?> </td>
                        <td><?= $row['title']?> </td>
                        <td><?= $row['type']?> </td>
                        <td>
                             <div class="content__post">
                                <?= $row['content']?>
                            </div> 
                        </td>
                        <td><?= $row['fullname']?> </td>
                        <td><?= $formatDate?> </td>
                        <td><?= $formatTime?> </td>
                        <td>
                            <div class="edit">
                                <a href="<?= URL ?>news/edit.php?this_id=<?=$row['id']?>">
                                    <button class="up">Sửa</button>
                                </a>
                                <a href="<?= URL ?>news/delete.php?this_id=<?=$row['id']?>">
                                    <button class="down">Xóa</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="button-add">
                    <a href="<?= URL ?>news/add.php">
                        <button>Thêm</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
        .button-add{
            text-align: left !important;
        }
        table{
            white-space: nowrap;
            max-width: 50%; 
            margin: 0 auto;
        }
        #container{
            min-height: 900px;
        }
        .content{
            overflow-x: scroll;
            background-color: whitesmoke;
               margin: 20px auto !important;
            border-radius: 15px;
            min-height: 650px;
        }
        .scroll{
            white-space: normal;
            overflow-y: scroll;
            height: 80px !important;
            width: 400px;
        }
        .up{
            background-color: lightgreen !important;
            color: black !important;
        }
        .down{
            background-color: lightcoral !important;
            color: black !important;
        }
        button, a{
            text-decoration: none;
            cursor: pointer;
        }
        #nav-bar .bar-content .avatar p{
            margin: 10px;
        }
        #container .content p.error{
            margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;
        }
        #container .content p.success{
            margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;
        }
        .content__post{
            height: 150px;
            width: 340px;
            white-space: pre-line;
            overflow-y: scroll;
        }
</style>
</html>