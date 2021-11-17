<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Bài Viết</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        a.active{
            pointer-events: none;
        }
        table{
            white-space: nowrap;
        }
        #container{
            min-height: 900px;
        }
        .content{
            overflow-x: scroll;
            background-color: whitesmoke;
            margin: 50px auto !important;
            border-radius: 15px;
            min-height: 650px;
        }
        .scroll{
            white-space: normal;
            overflow-y: scroll;
            height: 80px !important;
            width: 400px;
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
                    <li><a href="../index.php" href="">Thống Kê</a></li>
                    <li><a href="../category/index.php" href="">Danh Sách Danh Mục</a></li>
                    <li><a href="../product/index.php">Danh Sách Sản Phẩm</a></li>
                    <li><a class="active">Danh Sách Bài Viết</a></li>
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
                        <th>Tiều Đề</th>
                        <th>Loại</th>
                        <th>Văn Bản</th>
                        <th>Người Tạo</th>
                        <th>Ngày Tạo</th>
                        <th>Giờ</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>News</td>
                        <td>Thời Trang</td>
                        <td >
                            <p class="scroll">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed ex exercitationem consequuntur reiciendis laborum dolor quasi delectus nulla ipsam voluptates. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aperiam repudiandae ex voluptas inventore id assumenda numquam qui, laborum eum?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe eveniet culpa libero consequatur harum! Eius perferendis, sed necessitatibus adipisci eos eveniet, modi amet atque sapiente nihil aut itaque alias quod!
                            </p>
                        </td>
                        <td>Admin</td>
                        <td>13/02/2021</td>
                        <td>13:08:21</td>
                        <td><div class="edit">
                            <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>News</td>
                        <td>Thời Trang</td>
                        <td >
                            <p class="scroll">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed ex exercitationem consequuntur reiciendis laborum dolor quasi delectus nulla ipsam voluptates. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aperiam repudiandae ex voluptas inventore id assumenda numquam qui, laborum eum?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe eveniet culpa libero consequatur harum! Eius perferendis, sed necessitatibus adipisci eos eveniet, modi amet atque sapiente nihil aut itaque alias quod!
                            </p>
                        </td>
                        <td>Admin</td>
                        <td>13/02/2021</td>
                        <td>13:08:21</td>
                        <td><div class="edit">
                            <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td>News</td>
                        <td>Thời Trang</td>
                        <td >
                            <p class="scroll">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed ex exercitationem consequuntur reiciendis laborum dolor quasi delectus nulla ipsam voluptates. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aperiam repudiandae ex voluptas inventore id assumenda numquam qui, laborum eum?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe eveniet culpa libero consequatur harum! Eius perferendis, sed necessitatibus adipisci eos eveniet, modi amet atque sapiente nihil aut itaque alias quod!
                            </p>
                        </td>
                        <td>Admin</td>
                        <td>13/02/2021</td>
                        <td>13:08:21</td>
                        <td><div class="edit">
                            <button class="up">Sửa</button>
                            <button class="down">Xóa</button>
                        </div></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>News</td>
                        <td>Thời Trang</td>
                        <td >
                            <p class="scroll">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed ex exercitationem consequuntur reiciendis laborum dolor quasi delectus nulla ipsam voluptates. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aperiam repudiandae ex voluptas inventore id assumenda numquam qui, laborum eum?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe eveniet culpa libero consequatur harum! Eius perferendis, sed necessitatibus adipisci eos eveniet, modi amet atque sapiente nihil aut itaque alias quod!
                            </p>
                        </td>
                        <td>Admin</td>
                        <td>13/02/2021</td>
                        <td>13:08:21</td>
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