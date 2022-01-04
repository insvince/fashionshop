<?php 
    session_start();
    include_once "../php/config.php";
    include_once "../php/defined.php";
    if(!isset($_SESSION['a_mail'])){
        header("location: http://localhost/Fashion/admin/login/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= ADMIN ?>css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="main">
        <div id="header">
            <div class="header-content">
                <h2>Admin</h2>
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
                <div class="avatar" >
                    <i class="fas fa-user-tie"></i>
                    <?php
                        $session = $_SESSION['a_mail'];

                        $sql = "SELECT * FROM tb_users WHERE email = '" . $session . "' ";

                        $rs = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($rs);
                    ?>  
                    <p class="fullname">
                        <?=$row['fullname'];?>
                    </p>
                </div>
                <div class="list-edit">
                      <li>
                        <a class="active" href="<?= ADMIN ?>" >Thống Kê</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>cate/">Danh Sách Danh Mục</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>pro/">Danh Sách Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>ns/">Danh Sách Bài Viết</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>or/">Danh Sách Đơn Hàng</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>acc/">Danh Sách Tài Khoản</a>
                    </li>
                    <li>
                        <a href="<?= ADMIN ?>out">Đăng Xuất</a>
                    </li>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="content">
                <h2>Doanh Thu</h2>
                <div class="report-block">
                    <div class="report">
                        <h4>Tổng số đã nhận</h4>
                        <p>
                            <?php 
                                $sql = "SELECT * FROM `tb_billing` WHERE `status` = 'Nhận' ";
                                $rs = mysqli_query($conn, $sql);
                                
                                $row = mysqli_num_rows($rs);
                                echo $row;
                            ?>
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                    <div class="report">
                        <h4>Tổng sản phẩm còn lại</h4>
                        <p>
                            <?php 
                                $sql = "SELECT `stock` FROM `tb_product` ";
                                $rs = mysqli_query($conn, $sql);

                                $row = mysqli_num_rows($rs);
                                echo $row;
                            ?>
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                    <div class="report">
                        <h4>Số lượng đơn hàng</h4>
                        <p>
                            <?php 
                                $sql = "SELECT * FROM `tb_billing` ";
                                $rs = mysqli_query($conn, $sql);
                                
                                $row = mysqli_num_rows($rs);
                                echo $row;
                            ?>
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                    <div class="report">
                        <h4>Người dùng</h4>
                        <p>
                            <?php 
                                $sql = "SELECT * FROM `tb_users` WHERE `role` = 'User' ";
                                $rs = mysqli_query($conn, $sql);
                                
                                $row = mysqli_num_rows($rs);
                                echo $row;
                            ?>
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    .avatar{
        text-align: center;
    }
    .fullname{
        margin: 10px;
    }
    #container{
        background-color: whitesmoke;
        height: 400px;
    }
    .report-block{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        width: 100%;
        margin: 0 auto;
    }
    .report-block .report{
        width: 22%;
        background-color: #40E0D0;
        border-radius: 50px 10px 50px 10px;
        box-shadow: 5px 10px #9CFFD9;
    }
    .report-block .report h4{
        text-align: center;
        font-size: 1.3rem;
    }
    .report-block .report p{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        font-size: 1.5rem;            
    }
    .report-block .report p i{
        font-size: 2rem;
        color: #333;
    }
</style>
</html>