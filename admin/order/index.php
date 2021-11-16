<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        a.active{
            pointer-events: none;
        }
        .content{
            background-color: whitesmoke;
            border-radius: 15px;
            margin: 50px auto !important;
        }
        button.accept{
            background-color: #03ff00 !important;
            color: black !important;
        }
        button.cancel{
            background-color: #ff4040 !important;
            color: black !important;
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
                    <p >Admin</p>
                </div>
                <div class="list-edit">
                    <li><a href="../index.php" href="">Thống Kê</a></li>
                    <li><a href="../category/index.php" href="">Danh Sách Danh Mục</a></li>
                    <li><a href="../product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a class="active" href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a href="../account/index.php">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <table>
                    <!-- row -->
                    <tr>
                        <!-- column -->
                        <th>ID</th>
                        <th>Mã Tài Khoản</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Ngày Đặt</th>
                        <th>Giờ Đặt</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>10/11/2021</td>
                        <td>21:32:22</td>
                        <td><div class="edit">
                            <button class="accept">Nhận</button>
                            <button class="cancel">Hủy</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>10/11/2021</td>
                        <td>21:32:22</td>
                        <td><div class="edit">
                            <button class="accept">Nhận</button>
                            <button class="cancel">Hủy</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>10/11/2021</td>
                        <td>21:32:22</td>
                        <td><div class="edit">
                            <button class="accept">Nhận</button>
                            <button class="cancel">Hủy</button>
                        </div></td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
</body>
</html>