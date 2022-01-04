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
    <title>Giới Thiệu - H Store</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL ?>css/about.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>
<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li>
                    <a href="<?= URL ?>p/collection">Bộ sưu tập</a>
                </li>
                <li>
                    <a href="<?= URL ?>p/product">Sản Phẩm</a>
                </li>
                <li>
                    <a class="logo" href="<?= URL ?>home">
                        <img src="<?= URL ?>img/Layer1.png" alt="logo">
                    </a>
                </li>
                <li>
                    <a href="<?= URL ?>p/news">Tin Tức</a>
                </li>
                <li>
                    <a href="<?= URL ?>p/about">Giới Thiệu</a>
                </li>
            </div>
        </ul>
         <ul class="tool-box">

            <?php if(isset($_SESSION['user_mail'])){ ?>
                <a href="<?= URL ?>p/info">
                    <button type="button">
                        <i class="fas fa-user-circle"></i>
                    </button>
                </a>

                <a href="<?= URL ?>p/logout">
                    <button type="submit" name="dangxuat">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </a>
            <?php }else{ ?>
                <a href="<?= URL ?>p/login">
                    <button type="button">
                        <i class="fas fa-user-circle"></i>
                    </button>
                </a>
            <?php } ?>
            <a href="<?= URL ?>p/cart-page">
                <button type="button">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
            <button onclick="openSearch()">
                <i class="fas fa-search"></i>
            </button>
            
            <div class="search" id="modal-search">
               <form action="<?= URL ?>p/search/" method="post">
                    <input name="name_search" type="text">
                    <input type="submit" name="search" value="Tìm Kiếm">
                </form>
            </div>
        </ul>
        <div id="overlay"  onclick="closeSearch()"></div>
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
                        <td> 
                            <span> Quận 5</span> <br> Nguyễn Tri Phương, Q.5
                        </td>
                        <td> 
                            <span>Vĩnh Long</span> <br> Phường 6, Tp.Vĩnh Long, Vĩnh Long
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <span>Quận Gò Vấp</span> <br> Nguyễn Oanh, Gò Vấp
                        </td>
                        <td>
                             <span>Đồng Tháp</span> <br> Tân Khánh Trung, Lấp Vò, Đồng Tháp
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <span>Quận 1</span> <br> Võ Thị Sáu , Q.1
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <span>Quận 3</span> <br> Thành Thái, Q.3</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
        
    <div id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="<?= URL ?>img/Layer1.png" alt="logo">
                <p>H Store rất vinh hạnh khi được phục vụ quý khách. Niềm vui của quý khách tạo nên giá trị của chúng tôi, mang đến cơ hội phát triển của chúng tôi. Cám ơn bạn đã ghé thăm xin cảm ơn.</p>
            </div>
    
            <div class="follow">
                <h4>Theo dõi chúng tôi:</h4>
                <div class="content">
                   <a href="http://www.facebook.com"><i class="fab fa-facebook"></i></a>
                    <a href="http://www.youtube.com"><i class="fab fa-youtube"></i></a>
                    <a href="http://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="http://www.twitter.com"><i class="fab fa-twitter"></i></a>
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
        <script src="<?= URL ?>js/search.js"></script>
</body>
<style>
    .search{
            display: none;position: fixed;left: 0;top: 150px; width: 100%; padding: 10px 0;z-index: 10;
        }
        .search form{
            display: flex; justify-content: center; width: 100%; background-color: #a77349bd; margin: 0 auto; padding: 20px;
        }
        .search form input[type="text"]{
            width: 400px;font-size: 18px;padding: 10px 5px; margin: 0 10px; border-radius: 5px
        }
        .search form input[type="submit"]{
            padding: 10px 5px; margin: 0 10px; border-radius: 5px
        }
        #overlay{
            display:none; position: fixed; background-color: black;opacity: .7; width: 100%; height: 100%; top: 0;pointer-events: all;
        }
        p.error{
            color: red; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightblue; width: 30%;    margin: 10px auto;

        }
        p.success{
            color: green; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightgreen; width: 30%;    margin: 10px auto;
        }</style>
</html>