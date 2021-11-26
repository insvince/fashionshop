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
    <title>Giới Thiệu - H Store</title>
    <link rel="shortcut icon" href="http://localhost/Exercise/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Exercise/css/about.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>
<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="http://localhost/Exercise/p/collection/collection.php">Bộ sưu tập</a></li>
                <li><a href="http://localhost/Exercise/p/product/product.php">Sản Phẩm</a></li>
                <li><a class="logo" href="http://localhost/Exercise/index.php"><img src="http://localhost/Exercise/img/Layer1.png" alt=""></a></li>
                <li><a href="http://localhost/Exercise/p/news/news.php">Tin Tức</a></li>
                <li><a href="http://localhost/Exercise/p/about/about.php">Giới Thiệu</a></li>
            </div>
        </ul>
    </div>

    <div id="main">
        <h2>Thông Tin Chi Tiết & Liên Hệ</h2>
        <div class="content">
            <div class="infomation">
                <h4>1. Cửa Hàng Chính: </h4>
                <p>
                    123 Hai Bà Trưng, Quận 1, Tp.Hồ Chí Minh <br>
                    Hotline: 1900 XXX 678 <br>
                    Nhân Sự: 090 XXX 6789
                </p>
            </div>
            <div class="infomation">
                <h4>2. Hỗ Trợ Khách Hàng Mua Online</h4>
                <p>
                    Hotline 1900 XXX 456 <br>
                    Inbox Fanpage : Thỏ Store <br>
                    Email: hstore.online@triple.com
                </p>
            </div>
            <div class="infomation">
                <h4>3. Chăm Sóc Khách Hàng</h4>
                <p>
                    Hotline 1900 XXX 456 <br>
                    Email: hstore.cskh@triple.com
                </p>
            </div>
            <div class="infomation">
                <h4>4. Trở Thành Đối Tác Với Chúng Tôi</h4>
                <p>
                    Email: hstore.online@triple.com
                </p>
            </div>
            <div class="infomation">
                <h4>5. Tuyển Dụng</h4>
                <p>
                    Phone: 090 XXX 456<br>
                    Email: hstore.tuyendung@triple.com
                </p>
            </div>
            <div class="infomation">
                <h4>6. Hệ Thống Cửa Hàng</h4>
                <table>
                    <tr>
                        <th>HCM</th>
                        <th>Tỉnh Thành</th>
                    </tr>
                    <tr>
                        <td> <span> Quận 5</span> <br> Nguyễn Tri Phương, Q.5
                        </td>
                        <td> <span>Vĩnh Long</span> <br> Phường 6, Tp.Vĩnh Long, Vĩnh Long
                        </td>
                    </tr>
                    <tr>
                        <td> <span>Quận Gò Vấp</span> <br> Nguyễn Oanh, Gò Vấp
                        </td>
                        <td> <span>Đồng Tháp</span> <br> Tân Khánh Trung, Lấp Vò, Đồng Tháp
                        </td>
                    </tr>
                    <tr>
                        <td> <span>Quận 1</span> <br> Võ Thị Sáu , Q.1
                        </td>
                    </tr>
                    <tr>
                        <td> <span>Quận 3</span> <br> Thành Thái, Q.3</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
        
    <div id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="../../img/Layer1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Deserunt optio in magnam, amet id modi error placeat iusto, dicta fugit iure possimus. 
                Asperiores, perspiciatis. 
                Officia debitis provident est quis esse reiciendis voluptatem omnis sed eaque culpa! Modi fugiat maiores quis?</p>
            </div>
    
            <div class="follow">
                <h4>Theo dõi chúng tôi:</h4>
                <div class="content">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fas fa-blog"></i></a>
                </div>
            </div>
    
            <div class="contact">
                <h4> Thông tin liên lạc:</h4>
                <div class="content">
                    <p>hstore@store.mail.com</p>
                    <p>Nguyễn Tri Phương, P.12, Quận 10</p>
                    <p>0563.406.XXX</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>