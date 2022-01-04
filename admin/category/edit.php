<?php
    session_start();
    include "../../php/config.php";
    include "../../php/defined.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Danh Mục</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= ADMIN ?>css/style.css">
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
                        <a  href="<?= ADMIN ?>">
                            Thống Kê
                        </a>
                    </li>
                    <li>
                        <a class="active" href="<?= ADMIN ?>cate/">
                            Danh Sách Danh Mục
                        </a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>pro/">
                            Danh Sách Sản Phẩm
                        </a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>ns/">
                            Danh Sách Bài Viết
                        </a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>or/">
                            Danh Sách Đơn Hàng
                        </a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>acc/">
                            Danh Sách Tài Khoản
                        </a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>out">
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

                        if(empty($_POST['editname'])){
                            echo "wdqd";
                        }

                        if($row_2 > 0){
                            if($edit == $row['name']){
                                header("location: " . ADMIN . "c/err-change/" . $this_id);
                            }else{
                                header("location: " . ADMIN . "c/n-change");
                            }
                        }else{
                            mysqli_query($conn, $sql_edit);
                            header("location:" . ADMIN . "c/change");
                        }
                    }
                ?>
                <form action="<?= ADMIN ?>c/edit/<?=$this_id?>" method="post">
                    <h2>Chỉnh sửa</h2>
                    <?php  if(isset($_GET['error'])){  echo "<p class='error'>". $_GET['error'] . "</p>"; }  ?>
                    <input type="text" name="editname" value= "<?=$row['name']?>" autocomplete="off" required>
                    <button type="submit" name="editbtn" >
                        Sửa
                    </button>
                </form>                
            </div>
        </div>
    </div>
</body>
<style>
    .error{
        margin: 10px auto;
        color: red;
        font-weight: 600;
        font-size: 16px;
        border: 1px solid;
        border-radius: 5px;
        padding: 10px;
        background-color: lightblue;
        width: 30%;
        text-align: center;
    }
    a.active{
        text-decoration: none;
        color: whitesmoke;
        display: block;
        padding: 15px;
        border-radius: 10px;

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
         padding: 10px 5px ; background-color: black;border: 1px solid; border-radius: 5px;color: whitesmoke;font-size: 15px;cursor: pointer;
    }
</style>
</html>