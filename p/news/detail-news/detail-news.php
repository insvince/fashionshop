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
    <link rel="shortcut icon" href="../../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
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
</head>

<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="../../collection/collection.html">Bộ sưu tập</a></li>
                <li><a href="../../product/product.php">Sản Phẩm</a></li>
                <li><a class="logo" href="../../../index.html"><img src="../../../img/Layer1.png" alt=""></a></li>
                <li><a href="../../news/news.html">Tin Tức</a></li>
                <li><a href="../../about/about.html">Giới Thiệu</a></li>
            </div>
        </ul>
        <!-- <ul class="tool-box">
            <a href="../../log-page/log-page.html">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <a href="../../log-page/#">
                <button type="submit" name="dangxuat">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </a>
            <a href="../../profile-user/info.html">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <a href="../../cart-page/cart-page.html">
                <button>
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
            <button><i class="fas fa-search"></i>
                <div class="modal-search">
                    
                </div>
            </button>
        </ul> -->
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
                <img src="../../../img/<?= (($row['type'])=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="related">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, provident quae ipsa nesciunt at esse necessitatibus expedita dolore sit quas in pariatur harum atque commodi aut explicabo ipsum ducimus porro molestiae. Harum doloremque fugiat veritatis sequi hic eum autem, voluptates laborum sapiente, iure nostrum alias eius tenetur aliquam nobis nisi tempore dignissimos sunt expedita. Voluptatem, ipsam vel dolores, fuga deserunt hic doloremque, debitis ad at non culpa? Temporibus voluptatum sequi qui, delectus debitis libero? Id temporibus distinctio ipsam accusamus iste porro expedita quae voluptatibus, maxime aspernatur sunt, impedit qui numquam nulla! Placeat sequi exercitationem iusto? Ut maiores voluptas fuga! Explicabo totam assumenda laudantium eos. Laudantium qui deserunt tempore, iusto magni nisi maiores vel vero molestiae, dolores delectus mollitia aperiam quidem. Voluptatibus totam voluptatum fuga voluptatem error porro libero tenetur eaque quis cum repellat magnam vitae aliquid praesentium, quia, possimus quas saepe at impedit ab, quos sapiente. Molestiae accusantium ipsum assumenda. Illo, dolor. Cupiditate porro earum mollitia vel. Natus quisquam eveniet assumenda illum nam maxime, quibusdam sint error amet velit saepe dicta distinctio officia placeat eos consectetur, esse cupiditate dignissimos! Optio, veritatis. Aspernatur illo magnam ratione, nam sed ducimus iste. Voluptatem dolores odio, architecto pariatur aliquam modi sint error et quis.<?=$row['content']?></p>
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
                    <a href="detail-news.php?this_id=<?=$row_related['id'];?>">
                        <img src="../../../img/<?= (($row['type'])=="Sale" ? "thumnail-sale.jpg" : "thumnail-trend.jpg") ?>" alt="related">
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

</html>