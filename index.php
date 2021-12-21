<?php
    session_start();
    include_once "./php/config.php";    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - H Store</title>
    <link rel="shortcut icon" href="http://localhost/Exercise/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Exercise/css/style.css">
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
                    <a class="logo" href="./index.php">
                        <img src="./img/Layer1.png" alt="logo">
                    </a>
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
            <?php if(isset($_SESSION['user_mail'])) { ?>
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
            <button type="button" onclick="openSearch()">
                <i class="fas fa-search"></i>
            </button>
             <div class="search" id="modal-search">
                <form action="http://localhost/Exercise/p/search/search_item.php" method="get">
                    <input name="name_search" type="text">
                    <input type="submit" name="search" value="Tìm kiếm">
                </form>
            </div>
        </ul>
        <div id="overlay" onclick="closeSearch()"></div>
    </div>

    <div id="slideshow">
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="btn1" />
                <input type="radio" name="radio-btn" id="btn2" />
                <input type="radio" name="radio-btn" id="btn3" />
                <input type="radio" name="radio-btn" id="btn4" />

                <div class="slide first">
                    <img src="./img/slide1.jpg" alt="slide1" />
                </div>
                <div class="slide">
                    <img src="./img/slide2.jpg" alt="slide2" />
                </div>
                <div class="slide">
                    <img src="./img/slide3.jpg" alt="slide3" />
                </div>
                <div class="slide">
                    <img src="./img/slide4.jpg" alt="slide4" />
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

    <div id="navagation">
        <h4>Best Seller</h4>
        <div class="best-seller" style="max-width: 1200px; margin: 50px auto; min-height: 700px;" >
            <?php
                $sql = "SELECT * FROM `tb_product` ";
                $rs = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($rs)) {
            ?>
            <div class="product" >
                <div class="product-select">
                    <a href="http://localhost/Exercise/p/product/detail-product/detail-product.php?this_id=<?=$row['id']?>">
                        <img src="http://localhost/Exercise/img/<?=$row['img']?>" alt="product" style="width: 300px">
                    </a>
                    <div class="button-menu"  >
                        <a href="http://localhost/Exercise/p/product/add_to_cart.php?this_id=<?=$row['id']?>">
                            <button>
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <h5>
                    <?=$row['name']?>
                </h5>
                <p>
                    <?=$row['price']?> <b>đ</b>
                </p>
            </div>
            <?php } ?>
        </div>
        
        <h4>Sản Phẩm Mới</h4>
        <div class="new-product" style="max-width: 1200px; margin: 50px auto; min-height: 700px;">
            <?php
                $sql = "SELECT * FROM `tb_product` ORDER BY RAND () ";
                $rs = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($rs)) {
            ?>
            <div class="product">
                <div class="product-select">
                    <a href="http://localhost/Exercise/p/product/detail-product/detail-product.php?this_id=<?=$row['id']?>">
                    <img src="./img/<?=$row['img']?>" alt="product" style="width: 300px">
                    </a>
                    <div  class="button-menu"  >
                        <a href="http://localhost/Exercise/p/product/add_to_cart.php?this_id=<?=$row['id']?>">
                            <button>
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <h5>
                    <?=$row['name']?>
                </h5>
                <p>
                    <?=$row['price']?> <b>đ</b>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>

    <div id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="http://localhost/Exercise/img/Layer1.png" alt="">
                <p>
                    H Store rất vinh hạnh khi được phục vụ quý khách. Niềm vui của quý khách tạo nên giá trị của chúng tôi, mang đến cơ hội phát triển của chúng tôi. Cám ơn bạn đã ghé thăm xin cảm ơn.
                </p>
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
    <script src="http://localhost/Exercise/js/showhide.js"></script>
    <script src="http://localhost/Exercise/js/slideshow.js"></script>
    <script src="http://localhost/Exercise/js/search.js"></script>
</body>
<style>
    .product{
        width: 33%; display: inline-flex; justify-content: center; flex-direction: column; text-align: center
    }
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
