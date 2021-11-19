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
        .button-add button{
            cursor: pointer;
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
                    <li><a class="active" href="./index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a href="../account/index.php">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content" style="display: flex; flex-direction: column; justify-content: center; width: 80%; overflow: hidden">
                <?php 

                    if(isset($_POST['addbtn'])){
                        $title = $_POST['add_title'];
                        $content = $_POST['add_content'];
                        $type = $_POST['add_type'];

                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $create = date("Y-m-d H:i:s");
                        
                        $session_fname = $_SESSION['a_fullname'];

                        $sql_add = "INSERT INTO `tb_post`(`title`, `content`, `type`, `create_at`, `user_id`) VALUES ('$title', '$content', '$type', '$create', '$session_fname')";

                        $sql_check = "SELECT * FROM `tb_post` WHERE `title` = '$title' ";
                        $rs_check = mysqli_query($conn, $sql_check);
                        $row_check = mysqli_num_rows($rs_check);
                        
                        if($row_check > 0){
                            header("location: index.php?error=Sản phẩm đã tồn tại!");
                        }else{
                            mysqli_query($conn, $sql_add);
                            header("location: index.php?success=Đã thêm thành công!");
                        }
                    }
                ?>
                <?php if(isset($_GET['error'])){  echo "<p style= 'margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;'>". $_GET['error'] . "</p>"; } 
                if(isset($_GET['success'])){  echo "<p style= 'margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;'>". $_GET['success'] . "</p>"; } ?>

               <form action="add.php?" method="post" style="min-height: 200px; width: 50%; margin: 0 auto ; display: flex; flex-direction: column; justify-content: center;" enctype="multipart/form-data">

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_title" style="width: 120px; margin: 10px 0">Tiêu Đề</label>
                            <input type="text" name="add_title" style="width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;" required>
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_content" style="width: 120px; margin: 10px 0;">Nội Dung</label>
                            <textarea type="date" name="add_content" style="width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;resize: none; height: 100px;"></textarea>
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center;">
                            <label for="add_type" style="width: 120px; margin: 10px 0;">Danh Mục</label>
                            <select name="add_type" id="" style="margin: 10px 0; padding: 10px 0 10px 10px;  border: 1px solid; border-radius: 5px ">
                                <option value="Sale">Sale</option>
                                <option value="Mới">Mới</option>
                            </select>
                        </div>
                         
                        <div class="button-add" style="text-align: center;" >
                                <button type="submit" name="addbtn">Thêm</button>
                        </div>
                </form>
            </div>
           
        </div>
    </div>
</body>
</html>