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
    <title>Chi Tiết Tin Tức - H Store</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL ?>css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="<?= URL ?>p/collection">Bộ sưu tập</a></li>
                <li><a href="<?= URL ?>p/product">Sản Phẩm</a></li>
                <li><a class="logo" href="<?= URL ?>home">
                    <img src="<?= URL ?>img/Layer1.png" alt="logo">
                </a></li>
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

    <div id="main">
        <div class="main-news">
            <?php
                $this_id = $_GET['this_id'];
                $sql = "SELECT * FROM `tb_post` INNER JOIN `tb_users` ON `tb_users`.id = `tb_post`.user_id
                WHERE `tb_post`.`id` = '$this_id' ";
                $rs = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($rs);
            ?>
            <div class="news-content">
                <h4><?=$row['title']?></h4>
                <img src="<?= URL ?>img/<?= (($row['type'])=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="related">
                <p><?= $row['content'] ?></p>
            </div>
            <div class="bottom-news">
                <div class="auth-news">
                    <p>
                        <?= `tb_users`.$row['fullname']?>
                    </p>     
                </div>
                <div class="type-news">
                    <p>
                        <?=$row['type']?>
                    </p>
                </div>
                <div class="day">
                    <p>
                        
                        <?=  date('d/m/Y',strtotime($row['create'])); ?>                    
                    </p>
                </div>
                <div class="time">
                    <p> 
                        
                        <?php 
                            echo date('H:i:s',strtotime($row['create']));
                         ?>    
                    </p>
                </div>
            </div>
        </div>

        <div class="related">
            <h3>Chủ đề liên quan</h3>
            <div class="div item">
                <?php $sql_related = "SELECT * FROM `tb_post`
                    LIMIT 3 ";
                    $rs_related = mysqli_query($conn, $sql_related);
                    while($row_related = mysqli_fetch_array($rs_related)){
                ?>
                <div class="item">
                    <a href="<?= URL ?>p/news/detail/<?=$row_related['id'];?>">
                        <img src="<?= URL ?>img/<?= (($row['type'])=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="related">
                    </a>
                    <p ><?=$row_related['title']?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div id="footer">
        <div class="footer-content">
            <div class="logo">
                <img src="<?= URL ?>img/Layer1.png" alt="logo">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Deserunt optio in magnam, amet id modi error placeat iusto, dicta fugit iure possimus. 
                Asperiores, perspiciatis. 
                Officia debitis provident est quis esse reiciendis voluptatem omnis sed eaque culpa! Modi fugiat maiores quis?</p>
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
        .related{
            width: 70%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
        .related h3{
            font-size: 1.5rem;
            margin: 10px 0 ;
            padding: 10px;
        }
        .related .div.item{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }
        .div.item .item{
            width: 30%;
        }
        .div.item .item img{
            height: 280px;
            width: 80%;
        }
        .div.item .item p{
            text-align: left !important;
            width: 90%;
            margin: 5px auto;
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
