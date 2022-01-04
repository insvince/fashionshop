<?php
    session_start();
    include_once '../../php/config.php';
    include_once '../../php/defined.php';

    if(isset($_SESSION['user_mail'])){
        header("location: ../../home");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài Khoản - H Store</title>
    <link rel="shortcut icon" href="http://localhost/Fashion/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Fashion/admin/css/admin.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        if(isset($_POST['login'])){
           include "./login.php";
        }
    ?>
    <div id="form-user">
        <form id="form-login" action="p/login" method="post" >
            <h2>Đăng Nhập</h2>

            <?php 
                if(isset($_GET['error'])){  echo "<p class='error' >" . $_GET['error'] . "</p>"; } 
            ?>
            <?php 
                if(isset($_GET['success'])){  echo "<p class='success' >" . $_GET['success'] . "</p>"; } 
            ?>

            <input class="username" name="umail" type="email" placeholder="Nhập email">
            <input class="psw" name="upsw" type="password" placeholder="Nhập mật khẩu">

            <div class="btn-form">
                <button type="submit" name="login" >
                    Xác Nhận
                </button>

                <button type="button" onclick="openRegister()">
                    Tạo Tài Khoản
                </button>

                <button>
                    <a href="http://localhost/Fashion/home">Quay Lại Trang Chủ</a>
                </button>
            </div>
        </form>

        <?php 
            if(isset($_POST['create'])){
               include "./register.php";
            }
        ?>

        <form id="form-register" action="log-page.php?register" method="post">
            <h2>Đăng Ký</h2>

            <input class="name" name="urname" type="text" placeholder="Nhập họ tên">
            <input class="username" name="urmail" type="email" placeholder="Nhập email">
            <input class="psw" name="urpsw" type="password" placeholder="Nhập mật khẩu">
            <input class="psw" name="r-urpsw" type="password" placeholder="Xác nhận lại mật khẩu">
            <input class="phone" name="phone" type="text" placeholder="Nhập số điện thoại">

            <div class="btn-form">
                <button type="submit" name="create">Tạo ngay</button>
                <button type="button" onclick="openLogin()" >Quay lại đăng nhập</button>
                <button>
                    <a href="http://localhost/Fashion/">Quay Lại Trang Chủ</a>
                </button>
            </div>
        </form>
    </div>
    <script src="http://localhost/Fashion/js/showhide-form.js"></script>
</body>
<style>
    input{
        margin: 10px 0;
    }
    input[type="email"]{
        padding: 10px;
        width: 80%;
        border-radius: 10px;
        border: none;
    }
    p.error{
        color: red; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightblue; width: 70%;
    }
    p.success{
        color: green; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightgreen; width: 70%;
    }
</style>
</html>