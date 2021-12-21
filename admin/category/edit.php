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
    <link rel="shortcut icon" href="http://localhost/Exercise/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Exercise/admin/css/style.css">
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
            <div class="bar-content" >
                <div class="avatar" >
                    <i class="fas fa-user-tie"></i>
                    <?php
                        $session = $_SESSION['a_mail'];

                        $sql = "SELECT * FROM tb_users WHERE email = '$session' ";

                        $rs = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($rs);
                    ?>  
                    <p >
                        <?=$row['fullname'];?>
                    </p>
                </div>
                <div class="list-edit">
                    <li>
                        <a href="http://localhost/Exercise/admin/">
                            Thống Kê
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/Exercise/admin/category/">
                            Danh Sách Danh Mục
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/Exercise/admin/product/">
                            Danh Sách Sản Phẩm
                        </a>
                     </li>
                    <li>
                        <a href="http://localhost/Exercise/admin/news">
                            Danh Sách Bài Viết
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/Exercise/admin/order">
                            Danh Sách Đơn Hàng
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/Exercise/admin/account">
                            Danh Sách Tài Khoản
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/Exercise/admin/logout/logout.php">
                            Đăng Xuất
                        </a>
                    </li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content" >
                <?php 
                    $this_id = $_GET['this_id'];

                    $sql = "SELECT * FROM tb_category WHERE `id` = '" . $this_id . "' ";

                    $rs = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($rs);
                    
                    if(isset($_POST['editbtn'])){

                        $edit = $_POST['editname'];

                        $sql_edit = "UPDATE `tb_category` SET `name` = '" . $edit . "' WHERE `id` = '" . $this_id . "' ";

                        $sql_2 = "SELECT `name` FROM `tb_category` WHERE `name` = '" . $edit . "' ";

                        $rs_2 = mysqli_query($conn, $sql_2);
                        $row_2 = mysqli_num_rows($rs_2);

                        if($row_2 > 0){
                            header("location: index.php?error=Tên đã tồn tại!");
                        }else{
                            mysqli_query($conn, $sql_edit);
                            header("location: index.php?success=Tên đã thay đổi!");
                        }
                    }
                ?>
                <form action="edit.php?this_id=<?=$this_id?>" method="post">
                    <h3>Chỉnh sửa</h3>
                    <input type="text" name="editname" value= "<?=$row['name']?>">
                    <button type="submit" name="editbtn" >
                        Sửa
                    </button>
                </form>                
            </div>
        </div>
    </div>
</body>
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
        display: flex;
        flex-direction: column;
        min-height: 200px;
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
    #nav-bar .bar-content .avatar{
        text-align: center;
    }
    #nav-bar .bar-content .avatar p{
        margin: 10px;
    }
    .content form{
        text-align: center;
    }
    .content form input[type="text"]{
        padding: 10px 5px; 
        border-radius: 5px; 
        border: 1px solid;
        text-align: center;
        width: 30%;
    }
    .content form button{
        padding: 10px 5px ; 
        background-color: lightgreen;
        border: 1px solid; 
        border-radius: 5px;
    }
</style>
</html>