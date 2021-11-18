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
                    <li><a href="../product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a class="active">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content" style="display: flex; flex-direction: column; justify-content: center; width: 80%; overflow: hidden">
                <?php 
                    if(isset($_POST['addbtn'])){
                        include_once "addbtn.php";
                    }
                ?>
                <?php if(isset($_GET['error'])){  echo "<p style= 'margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;'>". $_GET['error'] . "</p>"; } 
                if(isset($_GET['success'])){  echo "<p style= 'margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;'>". $_GET['success'] . "</p>"; } ?>
               <form action="add.php?" method="post" style="min-height: 200px; width: 50%; margin: 0 auto ; display: flex; flex-direction: column; justify-content: center;">

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_fname" style="width: 120px; margin: 10px 0">Họ Tên</label>
                            <input type="text" name="add_fname" style="width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;">
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_mail" style="width: 120px; margin: 10px 0">Email</label>
                            <input type="email" name="add_mail" style="width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;">
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_password" style="width: 120px; margin: 10px 0">Mật Khẩu</label>
                            <input type="password" name="add_password" style="width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;">
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_dob" style="width: 120px; margin: 10px 0;">Ngày Sinh</label>
                            <input type="date" name="add_dob" style="width: 35%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;">
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_phone" style="width: 120px; margin: 10px 0;">SĐT</label>
                            <input type="text" name="add_phone" style="width: 65%; margin: 10px 0; padding: 5px 0 5px 10px ;border: 1px solid; border-radius: 5px; height: 30px;">
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center">
                            <label for="add_addresss" style="width: 120px; margin: 10px 0">Địa Chỉ</label>
                            <textarea type="text" name="add_address" style="width: 65%; margin: 10px 0; padding: 10px 0 10px 10px;border: 1px solid; border-radius: 5px; height: 100px; resize: none;"></textarea>
                        </div>

                        <div style="width: 80%; margin: 0 auto; display: inline-flex; align-items: center;">
                            <label for="add_role" style="width: 120px; margin: 10px 0;">Quyền Hạn</label>
                            <select name="add_role" id="" style="margin: 10px 0; padding: 10px 0 10px 10px;  border: 1px solid; border-radius: 5px ">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
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