<?php
    session_start();
    include '../../php/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài Khoản - H Store</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../../admin/css/admin.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
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
    </style>
</head>
<body>
    
    <?php
        if(isset($_POST['login'])){

            $mail = $_POST['umail'];
            $psw = $_POST['upsw'];
            
            $sql = "SELECT * FROM tb_users WHERE email = '$mail' AND password = '$psw' ";
            $rs = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($rs);
            $row = mysqli_fetch_array($rs);

            if($row > 0){
                if($row['role'] == "User"){
                    header("location: ../../index.html");
                }
            }else{
                if(empty($mail) || empty($psw)){
                    header("location: log-page.php?error=Không được để trống!");
                }else{
                    header("location: log-page.php?error=Tài khoản mật khẩu sai hoặc không tồn tại!");
                }
            }
        }
    ?>
    <div id="form-user">
        <form id="form-login" action="log-page.php?" method="post" >
            <h2>Đăng Nhập</h2>
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
                    <a href="../../index.html">Quay Lại Trang Chủ</a>
                </button>
                <?php if(isset($_GET['error'])){  echo "<p style= 'color: red; font-weight: 600; font-size: 16px;'>". $_GET['error'] . "</p>"; } ?>
                <?php if(isset($_GET['success'])){  echo "<p style= 'color: green; font-weight: 600; font-size: 16px;'>". $_GET['success'] . "</p>"; } ?>
            </div>
        </form>
        
        <?php 
            if(isset($_POST['create'])){

                $name = $_POST['urname'];
                $mail = $_POST['urmail'];
                $password = $_POST['urpsw'];
                $phone = $_POST['phone'];
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $create = date("Y-m-d H:i:s");
                
                $sql = "INSERT INTO `tb_users`(`fullname`, `email`, `password`, `number_phone`, `create_at`, `role`) VALUES ('$name', '$mail', '$password', '$phone', '$create', 'User')";
                
                $sql_2 = "SELECT `email` FROM `tb_users` WHERE email = '$mail' ";
                $check = mysqli_query($conn, $sql_2);
                $row = mysqli_num_rows($check);
    
                if($row > 1){
                    header("location: log-page.php?error=Tài khoản đã tồn tại!");
                }else{
                    mysqli_query($conn, $sql);
                    header("location: log-page.php?success=Đăng ký thành công!");
                }
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
                    <a href="../../index.html">Quay Lại Trang Chủ</a>
                </button>
            </div>
        </form>
    </div>
    <script src="../../js/showhide-form.js"></script>
</body>
</html>