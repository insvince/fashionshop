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
    <title>Tin Tức - H Store</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL ?>css/primary.css">
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
                <a href="<?= URL ?>p/log-page/log-page.php">
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

    <div id="slideshow">
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="btn1" />
                <input type="radio" name="radio-btn" id="btn2" />
                <input type="radio" name="radio-btn" id="btn3" />
                <input type="radio" name="radio-btn" id="btn4" />

                <div class="slide first">
                    <img src="<?= URL ?>img/slide1.jpg" alt="slide1" />
                </div>
                <div class="slide">
                    <img src="<?= URL ?>img/slide2.jpg" alt="slide2" />
                </div>
                <div class="slide">
                    <img src="<?= URL ?>img/slide3.jpg" alt="slide3" />
                </div>
                <div class="slide">
                    <img src="<?= URL ?>img/slide4.jpg" alt="slide4" />
                </div>

                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>

            <div class="navigation-manual">
                <label for="btn1" class="manual-btn"></label>
                <label for="btn2" class="manual-btn"></label>
                <label for="btn3" class="manual-btn"></label>
                <label for="btn4" class="manual-btn"></label>
            </div>
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
                            <a href="<?= URL ?>p/news/detail/<?= $row['id'] ?>">
                                <img src="<?= URL ?>img/<?= (( $row['type'] )=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="">
                            </a>
                        </div>
                        <div class="right-news">
                            <h3>
                                <a href="<?= URL ?>p/news/detail/<?= $row['id']?>"><?= $row['title'] ?></a>
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
    <script src="<?= URL ?>js/slideshow.js"></script>
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
    </style>
</html>