
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm - H Store</title>
    <link rel="shortcut icon" href="../../img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/primary.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="header">
        <ul class="menu">
            <div class="menu-content">
                <li><a href="../collection/collection.html">Bộ sưu tập</a></li>
                <li><a href="../product/product.php">Sản Phẩm</a></li>
                <li><a class="logo" href="../../index.html"><img src="../../img/Layer1.png" alt=""></a></li>
                <li><a href="../news/news.html">Tin Tức</a></li>
                <li><a href="../about/about.html">Giới Thiệu</a></li>
            </div>
        </ul>
        <ul class="tool-box">
            <a href="../profile-user/info.html">
            <button type="button">
                <i class="fas fa-user-circle"></i>
            </button>
            </a>
            <a href="../log-page/#">
                <button type="submit" name="dangxuat">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </a>
            <a href="../log-page/log-page.php">
                <button type="button">
                    <i class="fas fa-user-circle"></i>
                </button>
            </a>
            <a href="../cart-page/cart-page.html">
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
    
    <div id="main">
        <div class="main-product">
            <div class="list-type">
                <p style="font-size: 2rem;">Menu</p>
                <div class="tab">
                    <button class="tab-link" onclick="openType(event, 'nam')" id="defaultOpen">Đồ Nam</a></button>
                    <button class="tab-link" onclick="openType(event, 'nu')">
                        <a href="./">Đồ Nữ</a>
                    </button>
                </div>
                <ul class="type-select">
                    <div class="tab-content" id="nam">
                        <h4>Đồ Nam</h4>
                      
                        <div class="item-div">
                            <div class="product">
                                <div class="product-select">
                                    <a href="../product/detail-product/detail-product.html">
                                        <img
                                        src="../../img/aothunnam.jpg" alt="product">
                                    </a>
                                        
                                    <div  class="button-menu"  >
                                        <button type="button" name="addcart" onclick="addCart()">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                        <button type="button" name="addfavourite">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <h5>
                                    Tên
                                </h5>
                                <p>
                                    100000 <u>đ</u>
                                </p> 
                            </div>
                        </div>
                    </div>
                </ul>
                <ul class="type-select">
                    <div class="tab-content" id="nu">
                        <h4>Đồ Nữ</h4>
                        <div class="item-div">
                            <div class="product">
                                <div class="product-select">
                                    <a href="../product/detail-product/detail-product.html"><img
                                        src="../../img/aothunnu.jpg"
                                        alt="product"></a>
                                    <div  class="button-menu"  >
                                        <button type="submit" name="addcart" onclick="addcart()">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                        <button type="button" name="addfavourite">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <h5>
                                    Tên
                                </h5>
                                <p>
                                    100000 <u>đ</u>
                                </p> 
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="btn-next" >
                <button>Xem Thêm</button>
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
<script src="../../js/showhide.js"></script>
<script src="../../js/slideshow.js"></script>
<script src="../../js/tabview.js"></script>
<script>
    function addCart(id){
        
    }   
</script>
</body>

</html>