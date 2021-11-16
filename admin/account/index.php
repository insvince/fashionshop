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
        .up{
            background-color: #03ff00 !important;
            color: black !important;
        }
        .down{
            background-color: #ff4040 !important;
            color: black !important;
        }
        .button-add button{
            cursor: pointer;
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
            <div class="content">
                <table>
                    <!-- row -->
                    <tr>
                        <!-- column -->
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Ngày Sinh</th>
                        <th>SĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Ngày Tạo</th>
                        <th>Quyền Hạn</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Phước Huy</td>
                        <td>phuochuy13@gmail.com</td>
                        <td>15/05/1999</td>
                        <td>0909123321</td>
                        <td>Hậu Giang, P.12, Quận 6</td>
                        <td>21/09/2021</td>
                        <td>Admin</td>
                        <td><div class="edit">
                            <button class="up">Thăng</button>
                            <button class="down">Giáng</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Phước Huy</td>
                        <td>phuochuy13@gmail.com</td>
                        <td>15/05/1999</td>
                        <td>0909123321</td>
                        <td>Hậu Giang, P.12, Quận 6</td>
                        <td>21/09/2021</td>
                        <td>Admin</td>
                        <td><div class="edit">
                            <button class="up">Thăng</button>
                            <button class="down">Giáng</button>
                        </div></td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Phước Huy</td>
                        <td>phuochuy13@gmail.com</td>
                        <td>15/05/1999</td>
                        <td>0909123321</td>
                        <td>Hậu Giang, P.12, Quận 6</td>
                        <td>21/09/2021</td>
                        <td>Admin</td>
                        <td><div class="edit">
                            <button class="up">Thăng</button>
                            <button class="down">Giáng</button>
                        </div></td>
                    </tr>
                    
                </table><div class="button-add">
                <button>Thêm</button>
            </div>
            </div>
           
        </div>
    </div>
</body>
</html>