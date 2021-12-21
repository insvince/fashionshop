<?php 
    session_start();
    include_once "../../php/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân - H Store</title>
    <link rel="shortcut icon" href="http://localhost/Exercise/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Exercise/css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li title="Bộ Sưu Tập">
                    <a href="http://localhost/Exercise/p/collection/collection.php">Bộ sưu tập</a>
                </li>
                <li title="Sản Phẩm">
                    <a href="http://localhost/Exercise/p/product/product.php">Sản Phẩm</a>
                </li>
                <li title="Trang Chủ">
                    <a class="logo" href="http://localhost/Exercise/"><img src="http://localhost/Exercise/img/Layer1.png" alt=""></a>
                </li>
                <li title="Tin Tức">
                    <a href="http://localhost/Exercise/p/news/news.php">Tin Tức</a>
                </li>
                <li title="Giới Thiệu">
                    <a href="http://localhost/Exercise/p/about/about.php">Giới Thiệu</a>
                </li>
            </div>
        </ul>
        <ul class="tool-box">
            <?php if(isset($_SESSION['user_mail'])){ ?>
            <a href="http://localhost/Exercise/p/profile-user/info.php">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <a href="http://localhost/Exercise/p/log-page/logout.php">
                <button type="submit" name="dangxuat">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </a>
            <?php }else{ ?>
            <a href="http://localhost/Exercise/p/log-page/log-page.php">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <?php } ?>
            <a href="http://localhost/Exercise/p/cart-page/cart-page.php">
                <button>
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
            <button onclick="openSearch()">
                <i class="fas fa-search"></i>
            </button>
            
            <div class="search" id="modal-search">
                <form action="http://localhost/Exercise/p/search/search_item.php" method="get" >
                    <input name="name_search" type="text" >
                    <input type="submit" name="search" value="Tìm kiếm" >
                </form>
            </div>
        </ul>
        <div id="overlay"  onclick="closeSearch()"></div>
    </div>
        
    <div id="main">
        <div class="info-content">
            <h4>Hồ Sơ Của Bạn</h4>
            <?php 
                    if(isset($_GET['error'])){  echo "<p class='error'>". $_GET['error'] . "</p>"; }
                    
                    if(isset($_GET['success'])){  echo "<p class='success'>". $_GET['success'] . "</p>"; } 
                ?>
           <div class="form-content">
               <?php 
                    $mail = $_SESSION['user_mail'];
                    $sql = "SELECT * FROM `tb_users` WHERE `email` = '$mail' ";
                    $rs = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($rs);
               ?>
            <form action="http://localhost/Exercise/p/profile-user/edit.php?action" method="post">
                <div class="contain">
                    <div class="left">
                        <label for="">Tên</label>
                    </div>

                    <div class="right">
                        <?=$row['fullname']?>
                    </div>
                </div>

                <div class="contain">
                    <div class="left">
                        <label for="">Mật Khẩu</label>
                    </div>

                    <div class="right">
                        <input class="password" type="password"  value="<?= strlen($row['password']) < 8 ? "****************" : "****************" ?>" disabled >
                    </div>
                </div>

                <div class="contain">
                    <div class="left">
                        <label for="">Ngày Sinh</label>
                    </div>

                    <div class="right">
                        <?=$row['dob'] == NULL ? "Chưa nhập" : $row['dob'] ?>
                    </div>
                </div>

                <div class="contain">
                    <div class="left">
                        <label for="">Địa Chỉ</label>
                    </div>

                    <div class="right">
                        <?=$row['address'] == NULL ? "Chưa nhập" : $row['address'] ?>
                    </div>
                </div>

                <div class="contain">
                    <div class="left">
                        <label for="">Email</label>
                    </div>

                    <div class="right">
                        <?=$row['email']?>
                    </div>
                </div>

                <div class="contain">
                    <div class="left">
                        <label for="">Số Điện Thoại</label>
                    </div>

                    <div class="right">
                        <?=$row['number_phone']?>
                    </div>
                </div>

                <div class="contain">
                    <div class="left">
                        <label for="">Ngày tạo </label>
                    </div>

                    <div class="right">
                        <?= $formatDate = date('d/m/Y',strtotime($row['create_at']));?>
                    </div>
                </div>

                <div class="contain">
                    <button class="edit" name="edit">Sửa</button>
                </div>
            </form>
           </div>
        </div>
    </div>

    <div id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="http://localhost/Exercise/img/Layer1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Deserunt optio in magnam, amet id modi error placeat iusto, dicta fugit iure possimus.
                    Asperiores, perspiciatis.
                    Officia debitis provident est quis esse reiciendis voluptatem omnis sed eaque culpa! Modi fugiat
                    maiores quis?</p>
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
      
</body>
<script src="http://localhost/Exercise/js/search.js"></script>
<style>
    .password{
        background: none; border: none; font-size: 24px; color: black;}
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
            margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;
        }
        p.success{
            margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;
        }  
</style>
</html>