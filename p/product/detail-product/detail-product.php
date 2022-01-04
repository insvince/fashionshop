<?php
    session_start();
    include_once "../../../php/config.php";
    include_once "../../../php/defined.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm - H Store </title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL ?>css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="<?= URL ?>p/collection">Bộ sưu tập</a></li>
                <li><a href="<?= URL ?>p//product">Sản Phẩm</a></li>
                <li>
                    <a class="logo" href="<?= URL ?>home">
                        <img src="<?= URL ?>img/Layer1.png" alt="logo">
                    </a>
                </li>
                <li><a href="<?= URL ?>p/news">Tin Tức</a></li>
                <li><a href="<?= URL ?>p/about">Giới Thiệu</a></li>
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
                <button>
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
        <div style="max-width: 100%; margin: 0 auto; ">
            <?php 
                if(isset($_GET['error'])){  echo "<p class='error' style= ''>". $_GET['error'] . "</p>"; } 
            ?>
            <h4>Thông Tin Chi Tiết Sản Phẩm</h4>

            <div class="main-detail">
                <?php 
                    $this_id = $_GET['this_id'];

                    $sql = "SELECT * FROM `tb_product` WHERE `id` = '" . $this_id . "' ";
                    $rs = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($rs);
                ?>
                <div class="detail-left">
                    <img src="<?= URL ?>img/<?= $row['img'] ?>" alt="">
                </div>
                <div class="detail-right">
                    <h5 class="title">
                        <?= $row['name'] ?>
                    </h5>

                    <div class="bottom">
                        <p class="price">
                            <?= $row['price'] ?> <u>đ</u>
                        </p>
                        <p class="description">
                            <?=substr($row['description'], 0, 120)."..."; ?>
                        </p>
                        <p>
                            Phí vận chuyển: 30.000 <u>đ</u>
                        </p>
                      
                        <div class="multi-bottom">
                             <a href="<?= URL ?>p/product/add-to-cart/<?=$row['id']?>">
                                <button type="button" class="add_to_cart" name="add_to_cart" value="Add To Cart">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </a>
                        </div>  
                       
                    </div>
                </div>
            </div>
            <div class="bottom">
                <h3>Sản phẩm liên quan</h3>
                <div class="div bottom">
                    <?php
                        $sql_related = "SELECT * FROM `tb_product` ORDER BY RAND() LIMIT 3  ";

                        $rs_related = mysqli_query($conn, $sql_related);

                        while($row_related = mysqli_fetch_array($rs_related)){
                    ?>
                    <div class="item">
                        <a href="<?= URL ?>product/detail/<?= $row_related['id'] ?>">
                            <img src="<?= URL ?>img/<?= $row_related['img'] ?>" alt="">
                        </a>
                        <p><?= $row_related['name'] ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
        
    <div id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="<?= URL ?>img/Layer1.png" alt="logo">
                <p>
                    H Store rất vinh hạnh khi được phục vụ quý khách. Niềm vui của quý khách tạo nên giá trị của chúng tôi, mang đến cơ hội phát triển của chúng tôi. Cám ơn bạn đã ghé thăm xin cảm ơn.
                </p>
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
    <script src="<?= URL ?>js/search.js"></script>
</body>
<style>
        .bottom{
            display: flex;
            flex-direction: column;
            width: 90%;
            margin: 10px auto;
        }
        .bottom h3{
            text-align: center;
            margin: 10px 0;
            padding: 10px;
             font-size: 1.4rem;
        }
        .bottom .div.bottom{
            width: 90%;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
            text-align: center;
        }
        .div.bottom .item{
            width: 23%;
        }
        .div.bottom .item img{
            height: 300px;
            width: 100%;
        }
        .div.bottom .item p{
            margin: 10px auto;
            padding: 5px;
            text-align: left !important;
            width: 90%;
        }
        select{
            width: 60px;
            padding: 10px;
            text-align: center;
        }
        select option{
            text-align: left;
        }
        .multi-bottom .number-btn{
            background-color: black !important;
            color: whitesmoke;
        }
        .multi-bottom button.add_to_cart{
            background-color: black !important;
            color: whitesmoke !important;
        }
        p.error{
            margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;
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
        #main .main-detail .detail-right h5.title{
            padding: 5px 25px 0 ;
        }
        #main .main-detail .detail-right .price{
            margin-left: 5px;
        }
    </style>
</html>