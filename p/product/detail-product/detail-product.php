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
    <title>Chi Tiết Sản Phẩm - H Store </title>
    <link rel="shortcut icon" href="../../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
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
    </style>
</head>
<body>
    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="../../../p/collection/collection.html">Bộ sưu tập</a></li>
                <li><a href="../../../p/product/product.php">Sản Phẩm</a></li>
                <li><a class="logo" href="../../../index.html"><img src="../../../img/Layer1.png" alt=""></a></li>
                <li><a href="../../../p/news/news.html">Tin Tức</a></li>
                <li><a href="../../../p/about/about.html">Giới Thiệu</a></li>
            </div>
        </ul>
        <ul class="tool-box">
            <a href="../../log-page/log-page.php">
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
        </ul>
    </div>
    
    <div id="main">
        <div style="max-width: 100%; margin: 0 auto; ">
        <?php if(isset($_GET['error'])){  echo "<p style= 'margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;'>". $_GET['error'] . "</p>"; } ?>

        <h4>Thông Tin Chi Tiết Sản Phẩm</h4>
        
        <div class="main-detail">
                
            <?php 
                $this_id = $_GET['this_id'];
                $sql = "SELECT * FROM `tb_product` WHERE `id` = '$this_id' ";
                $rs = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($rs);

            ?>
            <div class="detail-left">
                <img src="../../../img/<?=$row['img']?>" alt="">
            </div>
            <div class="detail-right">
                <h5 class="title">
                    <?= $row['name']?>
                </h5>
                <div class="bottom">
                    <p class="price"><?= $row['price']?> <u>đ</u></p>
                    <p>
                        Phí vận chuyển: 30.000 <u>đ</u>
                    </p>
                    <p style="padding: 0 5px;">Kích thước</p>
                    <select >
                        <option value="volvo">S</option>
                        <option value="saab">M</option>
                        <option value="mercedes">L</option>
                      </select>
                    <div class="multi-bottom">
                        <p>Số Lượng 
                            <button class="number-btn">-</button>
                            <input type="number" value="1">
                            <button class="number-btn">+</button>
                        </p>
                        <a href="./add_to_cart.php?this_id=<?=$row['id']?>">
                            <button class="add_to_cart">Thêm Vào Giỏ Hàng</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <h3>Sản phẩm liên quan</h3>
            <div class="div bottom">
                <?php
                    $sql_related = "SELECT * FROM `tb_product`
                    LIMIT 3; ";
                    $rs_related = mysqli_query($conn, $sql_related);
                    while($row_related = mysqli_fetch_array($rs_related)){
                        
                ?>
                <div class="item">
                    <a href="../../product/detail-product/detail-product.php?this_id=<?=$row_related['id']?>">
                        <img src="../../../img/<?=$row_related['img']?>" alt="">
                    </a>
                    <p><?=$row_related['name']?></p>
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
</body>
</html>