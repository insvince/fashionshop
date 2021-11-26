<?php
    session_start();
    include_once "../../../php/config.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tin Tức - H Store</title>
    <link rel="shortcut icon" href="http://localhost/Exercise/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Exercise/css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="http://localhost/Exercise/p/collection/collection.php">Bộ sưu tập</a></li>
                <li><a href="http://localhost/Exercise/p/product/product.php">Sản Phẩm</a></li>
                <li><a class="logo" href="http://localhost/Exercise/">
                    <img src="http://localhost/Exercise/img/Layer1.png" alt="logo">
                </a></li>
                <li><a href="http://localhost/Exercise/p/news/news.php">Tin Tức</a></li>
                <li><a href="http://localhost/Exercise/p/about/about.php">Giới Thiệu</a></li>
            </div>
        </ul>
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
                <img src="http://localhost/Exercise/img/<?= (($row['type'])=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="related">
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
                    <a href="http://localhost/Exercise/p/news/detail-news/detail-news.php?this_id=<?=$row_related['id'];?>">
                        <img src="http://localhost/Exercise/img/<?= (($row['type'])=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="related">
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
                <img src="../../../img/Layer1.png" alt="">
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

    <script src="../../../js/slideshow.js"></script>
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
    </style>
</html>
