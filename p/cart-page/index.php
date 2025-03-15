<?php 
    session_start();
    include_once "../../php/config.php";
    include_once "../../php/defined.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng - H Store</title>
    <link rel="shortcut icon" href="<?= URL ?>img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL ?>css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li title="Bộ Sưu Tập">
                    <a href="<?= URL ?>p/collection">Bộ sưu tập</a>
                </li>
                <li title="Sản Phẩm">
                    <a href="<?= URL ?>p/product">Sản Phẩm</a>
                </li>
                <li title="Trang Chủ">
                    <a class="logo" href="<?= URL ?>home">
                        <img src="<?= URL ?>img/Layer1.png" alt="logo">
                    </a>
                </li>
                <li title="Tin Tức">
                    <a href="<?= URL ?>p/news">Tin Tức</a>
                </li>
                <li title="Giới Thiệu">
                    <a href="<?= URL ?>p/about">Giới Thiệu</a>
                </li>
            </div>
        </ul>
           <ul class="tool-box">
            <?php if(isset($_SESSION['user_mail'])) { ?>
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
                 <a href="<?= URL ?>p/cart-page">
                    <button>                    
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </a>
                 
            <?php }else{ ?>
                <a href="<?= URL ?>p/log-page/log-page.php">
                    <button type="button">
                        <i class="fas fa-user-circle"></i>
                    </button>
                </a>
               
            <?php } ?>
            <button type="button" onclick="openSearch()">
                <i class="fas fa-search"></i>
            </button>
           
             <div class="search" id="modal-search">
                 
                <form action="<?= URL ?>p/search/" method="post">
                    <input name="name_search" type="text">
                    <input type="submit" name="search" value="Tìm Kiếm">
                </form>
            </div>
        </ul>
        <div id="overlay" onclick="closeSearch()"></div>

    </div>

    <div id="main">
        <div class="main-cart" >
            <h4>Giỏ Hàng Của Bạn</h4>
            <?php 
                if(isset($_GET['error'])){  echo "<p class='error' >". $_GET['error']  . "</p>"; }

                if(isset($_GET['success'])){  echo "<p class='success' >". $_GET['success'] . "</p>"; }
            ?>
            
            <div class="cart__form">
               
                <form action="pay.php?action=pay" method="post" enctype="multipart/form-data">
                <?php 
                    if(isset($_SESSION['cart'])){
                         echo "<p style='color: red'>Thanh toán khi nhận hàng</p>";
                        foreach($_SESSION['cart'] as $key => $value){
                ?> 
                    <div class="form_number" >
                        <img src="<?= URL ?>/img/<?= $value['img'] ?>" alt="product_cart">
                        <input type="hidden" name="this_id[]" value="<?=$value['id']?>">
                        <input class="iamount" name="amount[]"  type="number" value="<?=$value['amount']?>" min="1" max="10" required onChange="iTotal()">
                        <input type="hidden" class="price" value="<?= $value['price'] ?>">
                        <input type="hidden" class="itotal">
                        <p>
                            <?=$value['name']?>
                        </p>
                        <p>
                            <?=number_format($value['price'])?> đ
                        </p>
                        <select class="size" name="size[]" >
                            <?php
                                $sql_size = "SELECT * FROM `tb_size` ORDER BY id ";
                                $rs_size = mysqli_query($conn, $sql_size);
                                while($row_size = mysqli_fetch_array($rs_size)){
                            ?>
                                <option value="<?= $row_size['id'] ?>" ><?= $row_size['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                   
                <?php } ?>
                    <div class="form_pay">
                        <div class="total">
                            <p>Tổng Cộng: </p><p id="itotal2"></p>
                        </div>
                        <div class="pay_button" >
                            <input type="submit" value="Thanh Toán" >
                            <a href="<?= URL ?>p/cart-page/clearall">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </form>
                <?php }else{
                    echo "<p style='font-size: 26px'>Trống</p>";
                } ?>
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
    <script src="<?= URL ?>js/search.js"></script>
    <script src="<?= URL ?>js/total.js"></script>
</body>
    <style>
        .total{
            display: flex;
            justify-content: center;
        }
        .bottom button{
            background-color: black !important;
            color: whitesmoke !important;
        }
        .cash button{
            background-color: black !important;
            color: whitesmoke !important;
        }
        #main .main-cart{
            min-height: 300px
        }
        #main .main-cart p.error{
            margin: 10px auto;color: red; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightblue; width: 30%; text-align: center;
        }
        #main .main-cart p.success{
            margin: 10px auto;color: green; font-weight: 600; font-size: 16px; border: 1px solid; border-radius: 5px; padding: 10px; background-color: lightgreen; width: 30%; text-align: center;
        }
        #main .main-cart .cart__form{
            width: 50%; margin: 0 auto; display: flex; justify-content: center;
        }
        #main .main-cart form{
            display: flex; flex-direction: column;
        }
        form .form_number{
            display: flex; flex-direction: column; margin: 10px; width: 400px;align-items: center;
        }
        form .form_number img{
            height: 300px;width: 250px
        }
        form .form_number input[type="number"]{
            text-align: center; margin: 10px 0;padding: 5px 10px
        }
        form .form_pay{
            width: 400px;display: flex;justify-content: space-around;white-space: nowrap;flex-direction: column
        }
        form .form_pay .pay_button{
            display: flex; justify-content: space-around;
        }
        form .form_pay .pay_button input{
            width: 160px;font-size: 16px; padding:  10px 0 ; background-color: #a7734986;font-weight: bold;margin: 10px 0;border: 1px solid; cursor: pointer
        }
        form .form_pay .pay_button a{
            width: 160px; padding:  10px; background-color: #a7734986;margin: 10px 0;border: 1px solid; text-decoration: none;font-weight: bold;text-align: center;
        }
        form .form_pay p{
            font-size: 24px; 
        }
        form select{
            padding: 10px 20px
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
        p.error{
            color: red; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightblue; width: 30%;    margin: 10px auto;

        }
        p.success{
            color: green; font-weight: 600; font-size: 16px; border: 1px solid; padding: 5px 10px; background-color: lightgreen; width: 30%;    margin: 10px auto;
        }
        
    </style>
</html>