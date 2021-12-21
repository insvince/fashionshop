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
                    <a href="http://localhost/Exercise/p/collection/collection.html">Bộ sưu tập</a>
                </li>
                <li title="Sản Phẩm">
                    <a href="http://localhost/Exercise/p/product/product.php">Sản Phẩm</a>
                </li>
                <li title="Trang Chủ">
                    <a class="logo" href="http://localhost/Exercise/"><img src="../../img/Layer1.png" alt=""></a>
                </li>
                <li title="Tin Tức">
                    <a href="http://localhost/Exercise/p/news/news.html">Tin Tức</a>
                </li>
                <li title="Giới Thiệu">
                    <a href="http://localhost/Exercise/p/about/about.html">Giới Thiệu</a>
                </li>
            </div>
        </ul>
    </div>

    <div id="main">
        <div class="info-content">
            <h4>Hồ Sơ Của Bạn</h4>
           <div class="form-content">
               <?php 
                    $mail = $_SESSION['user_mail'];

                    $sql = "SELECT * FROM `tb_users` WHERE `email` = '" . $mail . "' ";
                    $rs = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($rs);
                    $dob = date('Y-m-d',strtotime($row['dob']));
               ?>
                <form action="http://localhost/Exercise/p/profile-user/update.php?account=<?= $row['id'] ?>" method="post">
                    <div class="contain">
                        <div class="left">
                            <label for="">Tên</label>
                        </div>
                        <div class="right">
                            <input class="name" name="name" type="text" value="<?=$row['fullname']?>" >
                        </div>
                    </div>
                    <div class="contain">
                        <div class="left">
                            <label for="">Mật Khẩu</label>
                        </div>
                        <div class="right">
                            <input class="password" name="password"  type="password"  value="<?= $row['password']?>"  >
                        </div>
                    </div>
                    
                    <div class="contain">
                        <div class="left">
                            <label for="address">Địa Chỉ</label>
                        </div>
                        <div class="right">
                            <textarea class="address" name="address"  ><?=$row['address'] == NULL ? "Chưa nhập" : $row['address'] ?></textarea>
                        </div>
                    </div>
                    <div class="contain">
                        <div class="left">
                            <label for="">Số Điện Thoại</label>
                        </div>
                        <div class="right">
                            <input class="phone" name="phone" type="text" value="<?=$row['number_phone']?>"  >
                        </div>
                    </div>
                    <div class="contain">
                        <div class="left">
                            <label for="">Ngày Sinh</label>
                        </div>
                        <div class="right">
                            <input class="dob" name="dob" type="date" value="<?=$dob?>"  >
                        </div>
                    </div>
                    <div class="contain">
                        <button class="save">Lưu</button>
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
<style>
    .name{
        font-size: 18px;padding: 10px 5px; width: 250px; border-radius: 5px
    }
    .password{
        padding: 10px 5px ;width: 250px; font-size: 18px; border-radius: 5px; 
    }
    .address{
        padding: 10px 5px ;width: 150px; resize: none; font-size: 18px; height: 100px; width: 250px; border-radius: 5px
    }
    .phone{
        padding: 10px 5px ;width: 150px; font-size: 18px; border-radius: 5px;
    }
    .dob{
        padding: 10px 5px ;width: 200px; font-size: 18px; border-radius: 5px;
    }
</style>
</html>