<?php
    session_start();
    include "./php/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - H Store</title>
    <link rel="shortcut icon" href="./img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>

<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li title="Bộ Sưu Tập"><a href="./p/collection/collection.php">Bộ sưu tập</a></li>
                <li title="Sản Phẩm"><a href="./p/product/product.php">Sản Phẩm</a></li>
                <li title="Trang Chủ"><a class="logo" href="./index.php"><img src="./img/Layer1.png" alt=""></a></li>
                <li title="Tin Tức"><a href="./p/news/news.php">Tin Tức</a></li>
                <li title="Giới Thiệu"><a href="./p/about/about.php">Giới Thiệu</a></li>
            </div>
        </ul>

        <ul class="tool-box">
            <?php if(isset($_SESSION['user_mail'])) { ?>
                <a href="./p/profile-user/info.php">
                    <button type="button">
                        <i class="fas fa-user-circle"></i>
                    </button>
                </a>
                <a href="./p/log-page/logout.php">
                    <button type="submit" name="dangxuat">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </a>
            <?php }else{ ?>
            <a href="./p/log-page/log-page.php">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <?php } ?>

            <a href="./p/cart-page/cart-page.php">
                <button>                    
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
            <button type="button" onclick="openSearch()">
                <i class="fas fa-search"></i>
            </button>
            <div style="display: none;position: fixed;left: 0;top: 150px; width: 100%; padding: 10px 0;z-index: 10;" id="modal-search">
                
                <form action="../search/search_item.php" method="get" style="display: flex; justify-content: center; width: 100%; background-color: #a77349bd; margin: 0 auto; padding: 20px;">
                    <input name="name_search" type="text" style="width: 400px;font-size: 18px;padding: 10px 5px; margin: 0 10px; border-radius: 5px">
                    <input type="submit" name="search" value="Tìm kiếm" style="padding: 10px 5px; margin: 0 10px; border-radius: 5px">
                </form>

            </div>
                
        <div id="overlay" style="display:none; position: fixed; background-color: black;opacity: .7; width: 100%; height: 100%; top: 0;pointer-events: all;" onclick="closeSearch()"></div>
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

    <div id="navagation">
        <h4>Best Seller</h4>
        <div class="best-seller" style="max-width: 1200px; margin: 50px auto; min-height: 700px;" >
            <?php
                $sql = "SELECT * FROM `tb_product` ";
                $rs = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($rs)) {
            ?>
            <div class="product" style="width: 33%; display: inline-flex; justify-content: center; flex-direction: column; text-align: center">
                <div class="product-select">
                    <a href="./p/product/detail-product/detail-product.php?this_id=<?=$row['id']?>"><img
                        src="./img/<?=$row['img']?>" alt="product" style="width: 300px">
                    </a>
                    <div class="button-menu"  >
                        <a href="./p/product/detail-product/detail-product.php?this_id=<?=$row['id']?>">
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
                $sql = "SELECT * FROM `tb_product` ";
                $rs = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($rs)) {
            ?>
            <div class="product" style="width: 33%; display: inline-flex; justify-content: center; flex-direction: column; text-align: center">
                <div class="product-select">
                    <a href="./p/product/detail-product/detail-product.php?this_id=<?=$row['id']?>"><img
                        src="./img/<?=$row['img']?>" alt="product" style="width: 300px">
                    </a>
                    <div  class="button-menu"  >
                        <a href="./p/product/detail-product/detail-product.php?this_id=<?=$row['id']?>">
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
                <img src="./img/Layer1.png" alt="">
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
    <script src="./js/showhide.js"></script>
    <script src="./js/slideshow.js"></script>
    <script src="./js/search.js"></script>
   
</body>

</html>