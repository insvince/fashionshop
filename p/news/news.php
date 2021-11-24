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
    <title>Tin Tức - H Store</title>
    <link rel="shortcut icon" href="http://localhost/Exercise/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Exercise/css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li>
                    <a href="http://localhost/Exercise/p/collection/collection.php">Bộ sưu tập</a>
                </li>
                <li>
                    <a href="http://localhost/Exercise/p/product/product.php">Sản Phẩm</a>
                </li>
                <li>
                    <a class="logo" href="http://localhost/Exercise/"><img src="http://localhost/Exercise/img/Layer1.png" alt=""></a>
                </li>
                <li>
                    <a href="http://localhost/Exercise/p/news/news.php">Tin Tức</a>
                </li>
                <li>
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
            
            <button><i class="fas fa-search"></i>
                <div class="modal-search">
                    
                </div>
            </button>
        </ul>
    </div>

    <div id="slideshow">
        <div class="slideshow-img">
            <img src="https://gotrangtri.vn/wp-content/uploads/2020/06/mau-shop-thoi-trang-dep6.jpg" class="slideshow"
            alt="">
            <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" class="slideshow" alt="">
            <img src="https://www.w3schools.com/howto/img_nature_wide.jpg"  class="slideshow" alt="">
        </div>
        <div class="bottom-slideshow">
            <span class="dot" onclick="currentSlide(0)"></span> 
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
        </div>
    </div>
    
    <div id="main">
        <div class="main-news">
            <h4>Tin Tức Nổi Bật Tuần Qua</h4>
            <div class="list-news">
                <ul>
                <?php 
                    $sql = "SELECT * FROM `tb_users` RIGHT JOIN `tb_post` ON `tb_users`.id = `tb_post`.user_id ORDER BY `tb_post`.create DESC" ;
                    
                    $rs = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($rs)){
                        $date = $row['create'];
                        $formatDate = date('d/m/Y',strtotime($date));
                        $formatTime = date('H:i:s',strtotime($date));
                ?>
                    <li class="news">
                        <div class="left-news">
                            <a href="./detail-news/detail-news.php?this_id=<?= $row['id'] ?>">
                                <img src="http://localhost/Exercise/img/<?= (( $row['type'] )=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="">
                            </a>
                        </div>
                        <div class="right-news">
                            <h3>
                                <a href="http://localhost/Exercise/p/product/detail-news/detail-news.php?this_id=<?= $row['id']?>"><?= $row['title'] ?></a>
                            </h3>

                            <div class="short-detail">
                                <?=substr($row['content'], 0, 120)."..."; ?>
                            </div>

                            <div class="date">
                                <p class="author"><?= $row['fullname'] ?></p>
                                <p class="type-news"> <?= (($row['type'])=="Sale" ? "Khuyến mãi" : "Mới") ?> </p>
                                <p class="day"><?= $formatDate ?></p>
                                <p class="time"><?= $formatTime ?></p>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="btn-next">
            <button>Xem Thêm</button>
        </div>
    </div>
        
    <div id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="http://localhost/Exercise/img/Layer1.png" alt="">
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
    <script src="http://localhost/Exercise/js/showhide.js"></script>
    <script src="http://localhost/Exercise/js/slideshow.js"></script>
</html>