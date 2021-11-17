<?php 
    session_start();
    include "../php/config.php";
    if(!isset($_SESSION['a_mail'])){
        header("location: ./login/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
    <link rel="shortcut icon" href="../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
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
        a.active{
            pointer-events: none;
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
                    <p>
                       
                    </p>
                </div>
                <div class="list-edit">
                    <li><a class="active">Thống Kê</a></li>
                    <li><a href="./category/index.php" href="">Danh Sách Danh Mục</a></li>
                    <li><a href="./product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="./news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a href="./order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a href="./account/index.php">Danh Sách Tài Khoản</a></li>
                    <li><a href="./logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <h2>Doanh Thu</h2>
                <div class="report-block">
                    <div class="report">
                        <h4>Tổng Số Đã Bán</h4>
                        <p>80
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                    <div class="report">
                        <h4>Tổng sản phẩm còn lại</h4>
                        <p>80
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                    <div class="report">
                        <h4>Số lượng đơn hàng</h4>
                        <p>80
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                    <div class="report">
                        <h4>Người dùng</h4>
                        <p>80
                            <i class="fas fa-chart-line"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>