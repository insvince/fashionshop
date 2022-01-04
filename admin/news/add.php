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
    <link rel="shortcut icon" href="http://localhost/Fashion/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Fashion/admin/css/style.css">
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
                        <a  href="http://localhost/Fashion/admin/">Thống Kê</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/category/">Danh Sách Danh Mục</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/product/">Danh Sách Sản Phẩm</a>
                    </li>
                    <li>
                        <a class="active" href="http://localhost/Fashion/admin/news/">Danh Sách Bài Viết</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/order/">Danh Sách Đơn Hàng</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/account/">Danh Sách Tài Khoản</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/logout/logout.php">Đăng Xuất</a>
                    </li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <?php 
                    if(isset($_POST['addbtn'])){

                        $title = $_POST['add_title'];
                        $content = $_POST['add_content'];
                        $type = $_POST['add_type'];

                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $create = date("Y-m-d H:i:s");
                        
                        $session_fname = $_SESSION['a_fullname'];

                        $sql_add = "INSERT INTO `tb_post`(`title`, `content`, `type`, `create`, `user_id`) VALUES ('" . $title . "', '" . $content . "', '" . $type . "', '" . $create . "', '" . $session_fname . "')";

                        $sql_check = "SELECT * FROM `tb_post` WHERE `title` = '" . $title . "' ";

                        $rs_check = mysqli_query($conn, $sql_check);
                        $row_check = mysqli_num_rows($rs_check);
                        if($row_check > 0){
                            header("location: add.php?this_id=" . $this_id . "&error=Tiêu đề \"" . $title . "\" đã tồn tại!");
                        }else{
                            mysqli_query($conn, $sql_add);
                            header("location: index.php?success=Đã thêm thành công!");
                        }
                    }
                ?>
                <?php if(isset($_GET['error'])){  echo "<p class='error'>". $_GET['error'] . "</p>"; } 
                if(isset($_GET['success'])){  echo "<p class='success'>". $_GET['success'] . "</p>"; } ?>

               <form action="add.php?" method="post" enctype="multipart/form-data">
                        <div class="add" >
                            <label for="add_title">Tiêu Đề</label>
                            <input type="text" name="add_title" required>
                        </div>

                        <div class="add" >
                            <label for="add_content" >Nội Dung</label>
                            <textarea type="date" name="add_content" required></textarea>
                        </div>

                        <div class="add">
                            <label for="add_type" >Danh Mục</label>
                            <select name="add_type" >
                                <option value="Sale">Sale</option>
                                <option value="Mới">Mới</option>
                            </select>
                        </div>
                         
                        <div class="button-add">
                            <button type="submit" name="addbtn">Thêm</button>
                        </div>
                </form>
            </div>
           
        </div>
    </div>
</body>
<style>
    table{
        white-space: nowrap;
    }
    .content{
        background-color: whitesmoke;
        overflow-x: scroll;
            margin: 20px auto !important;
        border-radius: 15px;
        width: 90%;
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
        width: 80%;
        overflow: hidden;
    }
    .button-add button{
        cursor: pointer;text-align: center;
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
    #nav-bar .bar-content .avatar p{
        margin: 10px;
    }
    .content p.error{
        margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;
    }
    .content p.success{
        margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;
    }
    .content form{
        min-height: 200px; width: 50%; margin: 0 auto ; display: flex; flex-direction: column; justify-content: center;
    }
    .content form .add{
        width: 80%; margin: 0 auto; display: inline-flex; align-items: center
    }
    form .add label{
        width: 120px; margin: 10px 0
    }
    form .add input[type="text"], textarea{
        width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;
    }
    form .add select{
        margin: 10px 0; padding: 10px 0 10px 10px;  border: 1px solid; border-radius: 5px
    }
    form 
</style>
</html>