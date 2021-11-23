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
    <title>Giỏ Hàng - H Store</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    <style>
        .bottom button{
            background-color: black !important;
            color: whitesmoke !important;
        }
        .cash button{
            background-color: black !important;
            color: whitesmoke !important;
        }
    </style>
</head>

<body>

    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li title="Bộ Sưu Tập"><a href="../collection/collection.php">Bộ sưu tập</a></li>
                <li title="Sản Phẩm"><a href="../product/product.php">Sản Phẩm</a></li>
                <li title="Trang Chủ"><a class="logo" href="../../index.php"><img src="../../img/Layer1.png" alt=""></a></li>
                <li title="Tin Tức"><a href="../news/news.php">Tin Tức</a></li>
                <li title="Giới Thiệu"><a href="../about/about.php">Giới Thiệu</a></li>
            </div>
        </ul>

    </div>

    <div id="main">
        <div class="main-cart" style="min-height: 300px">
            <h4>Giỏ Hàng Của Bạn</h4>
            
            <?php if(isset($_GET['error'])){  echo "<p style= 'margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;'>". $_GET['error']  . "</p>"; }

            if(isset($_GET['success'])){  echo "<p style= 'margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;'>". $_GET['success'] . "</p>"; }else{
                echo "<p style='color: red'>Thanh toán khi nhận hàng</p>";
            } ?>
            <div style="width: 50%; margin: 0 auto; display: flex; justify-content: center;">
               
                <form action="pay.php?action=pay" method="post" style="display: flex; flex-direction: column; " enctype="multipart/form-data">
                <?php 
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => $value){
                ?> 
                    <div style="display: flex; flex-direction: column; margin: 10px; width: 400px;align-items: center; ">
                        <input type="hidden" name="this_id[]" value="<?=$value['id']?>">
                        <img style="height: 300px;width: 250px" src="../../img/<?=$value['img']?>" alt="product">
                        <input class="iamount" name="amount[]"  type="number" value="<?=$value['amount']?>" min="1" max="10" style="text-align: center; margin: 10px 0;padding: 5px 10px">
                        <p><?=$value['name']?></p>
                        <p><?=number_format($value['price'])?> đ</p>
                    </div>
                <?php } ?>
                    <div style="width: 400px;display: flex;justify-content: space-around;white-space: nowrap;flex-direction: column">
                        <p style="font-size: 24px; ">Tổng Cộng: </p>
                        <div style="display: flex; justify-content: space-around;">
                            <input type="submit" value="Thanh Toán" style="width: 160px;font-size: 16px; padding:  10px 0 ; background-color: #a7734986;font-weight: bold;margin: 10px 0;border: 1px solid; cursor: pointer">
                            
                            <a href="clearall.php?action=clearall" style="width: 160px; padding:  10px; background-color: #a7734986;margin: 10px 0;border: 1px solid; text-decoration: none;font-weight: bold;text-align: center; ">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="footer">

        <div class="footer-content">
            <div class="logo">
                <img src="../../img/Layer1.png" alt="">
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
<!-- <script src="../../js/total.js"></script> -->
</html>