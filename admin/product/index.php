<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        a.active{
            pointer-events: none;
        }
        img{
            width: 70px;
            height: 80px;
        }
        #container{
            min-height: 900px;
        }
        .content{
            border-radius: 15px;
            margin: 50px auto !important;
            min-height: 600px;
            background-color: whitesmoke;
        }
        .button-add {
            width: 90%;
            margin: 0 auto;
        }
        .button-add button{
            cursor: pointer;
        }
        .up{
            background-color: lightgreen !important;
            color: black !important;
        }
        .down{
            background-color: lightcoral !important;
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
                    <li><a href="../index.php">Thống Kê</a></li>
                    <li><a href="../category/index.php" href="">Danh Sách Danh Mục</a></li>
                    <li><a class="active">Danh Sách Sản Phẩm</a></li>
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
                    <!-- row -->
                    <tr>
                        <!-- column -->
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Kho</th>
                        <th>Hình Ảnh</th>
                        <th>Mô Tả</th>
                        <th>Giá</th>
                        <th>Kích Thước</th>
                        <th>Mã Danh Mục</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Áo Nam</td>
                        <td>99</td>
                        <td><img src="../../img/aothunnam.jpg" alt="logo"></td>
                        <td>Mô tả</td>
                        <td>Giá</td>
                        <td>Size</td>
                        <td>Mã danh mục</td>
                        <td><div class="edit">
                        <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Áo Nam</td>
                        <td>99</td>
                        <td><img src="../../img/aothunnam.jpg" alt="logo"></td>
                        <td>Mô tả</td>
                        <td>Giá</td>
                        <td>Size</td>
                        <td>Mã danh mục</td>
                        <td><div class="edit">
                        <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Áo Nam</td>
                        <td>99</td>
                        <td><img src="../../img/aothunnam.jpg" alt="logo"></td>
                        <td>Mô tả</td>
                        <td>Giá</td>
                        <td>Size</td>
                        <td>Mã danh mục</td>
                        <td><div class="edit">
                        <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Áo Nam</td>
                        <td>99</td>
                        <td><img src="../../img/aothunnam.jpg" alt="logo"></td>
                        <td>Mô tả</td>
                        <td>Giá</td>
                        <td>Size</td>
                        <td>Mã danh mục</td>
                        <td><div class="edit">
                        <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Áo Nam</td>
                        <td>99</td>
                        <td><img src="../../img/aothunnam.jpg" alt="logo"></td>
                        <td>Mô tả</td>
                        <td>Giá</td>
                        <td>Size</td>
                        <td>Mã danh mục</td>
                        <td><div class="edit">
                        <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>
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