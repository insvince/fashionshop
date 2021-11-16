<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Danh Mục</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
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
                    <li><a class="active">Danh Sách Danh Mục</a></li>
                    <li><a href="../product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a href="../news/index.php">Danh Sách Bài Viết</a></li>
                    <li><a href="../order/index.php">Danh Sách Đơn Hàng</a></li>
                    <li><a href="../account/index.php">Danh Sách Tài Khoản</a></li>
                    <li><a href="../logout/logout.php">Đăng Xuất</a></li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tên Loại</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Áo Nam</td>
                        <td>Đang Bán</td>
                        <td>
                            <div class="edit">
                                <button>Sửa</button>
                                <button>Xóa</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Áo Nữ</td>
                        <td>Đang Bán</td>
                        <td>
                            <div class="edit">
                                <button>Sửa</button>
                                <button>Xóa</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Quần Nữ</td>
                        <td>Đang Bán</td>
                        <td>
                            <div class="edit">
                                <button>Sửa</button>
                                <button>Xóa</button>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="button-add">
                    <button>Thêm</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>