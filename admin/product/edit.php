<?php 
    session_start();
    include_once "../../php/config.php";
    $this_id = $_GET['this_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tài Khoản</title>
    <link rel="shortcut icon" href="http://localhost/Fashion/img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="http://localhost/Fashion/admin/css/style.css">
    <script src="https://kit.fontawesome.com/b1f83b8c89.js" crossorigin="anonymous"></script>
  
</head>
<body>
    <div id="main">
        <div id="header">
            <div class="header-content">
                <h2>Fashion Admin</h2>
                <div class="header-tool">
                    <button>
                        <i class="fas fa-envelope"></i>
                    </button>
                    <button>
                        <i class="fas fa-bell"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="nav-bar">
            <div class="bar-content">
                <div class="avatar">
                    <i class="fas fa-user-tie"></i>
                    <?php
                        $session = $_SESSION['a_mail'];

                        $sql = "SELECT * FROM tb_users WHERE email = '" . $session . "' ";

                        $rs = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($rs);
                    ?>  
                    <p class="fullname">
                        <?=$row['fullname'];?>
                    </p>
                </div>
                <div class="list-edit">
                    <li>
                        <a href="http://localhost/Fashion/admin/">Thống Kê</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/category/" >Danh Sách Danh Mục</a>
                    </li>
                    <li>
                        <a class="active" href="http://localhost/Fashion/admin/product/">Danh Sách Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/news/">Danh Sách Bài Viết</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/order/">Danh Sách Đơn Hàng</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/account/">Danh Sách Tài Khoản</a>
                    </li>
                    <li>
                        <a href="http://localhost/Fashion/admin/logout/logout.php">Đăng Xuất</a>
                    </li>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="content" >
               <form action="edit.php?this_id=<?=$this_id?>" method="post" enctype="multipart/form-data">
                        <?php 

                        $sql = "SELECT * FROM `tb_product` WHERE `id` = '" . $this_id . "' ";

                        $row = mysqli_fetch_array(mysqli_query($conn, $sql));

                        if(isset($_POST['editbtn'])){
                            
                            $name = $_POST['add_name'];
                            $stock = $_POST['add_stock'];
                            $img = $_FILES['add_img']['name'];
                            $description = $_POST['add_description'];
                            $price = $_POST['add_price'];
                            $category = $_POST['add_category'];
                            $img_tmp_name = $_FILES['add_img']['tmp_name'];
                            $img_check = ($img == "") ? $row['img'] : $img ;

                            $sql_edit = "UPDATE `tb_product` SET `name`='" . $name . "',`stock`='" . $stock . "',`img`='" . $img_check . "',`description`='" . $description . "',`price`='" . $price . "',`category_id`='" . $category . "' WHERE `id` = '" . $this_id . "' ";
                            
                            mysqli_query($conn, $sql_edit);
                            
                            move_uploaded_file($img_tmp_name, 'http://localhost/Fashion/img/'. $img );

                            header("location: index.php?success=Đã thay đổi thành công!");
                            }
                        ?>

                        <div class="edit_form" >
                            <label for="add_name" >Tên Sản Phẩm</label>
                            <input type="text" name="add_name"  required value="<?=$row['name'];?>">
                        </div>

                        <div class="edit_form" >
                            <label for="add_stock" >Kho</label>
                            <input class="stock" type="number" name="add_stock" 
                            value="<?=$row['stock'];?>">
                        </div>

                        <div class="edit_form" >
                            <label for="add_img" >Hình Ảnh</label>
                            <input type="file" name="add_img" >
                            <img src="http://localhost/Fashion/img/<?=$row['img']?>" >
                        </div>

                        <div class="edit_form" >
                            <label for="add_description" >Mô Tả</label>
                            <textarea type="date" name="add_description"><?= $row['description'] ?></textarea>
                        </div>

                        <div class="edit_form" >
                            <label for="add_price" >Giá</label>
                            <input class="price" type="number" name="add_price"  value="<?=$row['price']?>">
                        </div>

                        <div class="edit_form" >
                            <label for="add_category" >Danh Mục</label>
                            <select name="add_category" id="" >
                            <?php
                                $sql_category = "SELECT * FROM `tb_category`";
                                $rs = mysqli_query($conn, $sql_category);
                                while ($row = mysqli_fetch_array($rs)) {
                            ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                         
                        <div class="button-add" >
                            <button type="submit" name="editbtn">Sửa</button>
                        </div>
                </form>
            </div>
           
        </div>
    </div>
</body>
<style>
        table{
            white-space: nowrap;
        }
        .content{
            background-color: whitesmoke;
            overflow-x: scroll;
                margin: 20px auto !important;
            border-radius: 15px;
            width: 90%;
            display: flex; flex-direction: column; justify-content: center; width: 80%; overflow: hidden
        }
        .button-add button{
            cursor: pointer;
            text-align: center;
        }
        a{
            text-decoration: none;
        }
       
        .up{
            border: 1px solid;
            border-radius: 5px;
            padding: 10px 10px;
            margin: 10px;
            background-color: lightgreen !important;
            color: black !important;
            font-weight: 600;
        }
        .down{
            border: 1px solid;
            border-radius: 5px;
            padding: 10px 10px;
            margin: 10px;
            background-color: lightcoral !important;
            color: black !important;
            font-weight: 600;
        }
        #container td:last-child{
            height: 50px;
            max-height: auto;
        }
        #container .content form{
            min-height: 200px; width: 50%; margin: 0 auto ; display: flex; flex-direction: column; justify-content: center;
        }
        form .edit_form{
            width: 80%; margin: 0 auto; display: inline-flex; align-items: center
        }
        form .edit_form label{
            width: 120px; margin: 10px 0
        }
        #container .content form .edit_form input[type="text"]{
            width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;
        }#container .content form .edit_form input[type="file"]{
            width: 40%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;
        }
        #container .content form .edit_form input[type="number"].stock{
            width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;
        }
        #container .content form .edit_form input[type="number"].price{
            width: 30%; margin: 10px 0; padding: 5px 0 5px 10px ;border: 1px solid; border-radius: 5px; height: 30px;
        }
        #container .content form .edit_form textarea{
            width: 65%; margin: 10px 0; padding: 5px 0 5px 10px;border: 1px solid; border-radius: 5px; height: 30px;resize: none; height: 100px;
        }
        #container .content form .edit_form select{
            margin: 10px 0; padding: 10px 0 10px 10px;  border: 1px solid; border-radius: 5px 
        }
        #container .content form .edit_form img{
            width: 70px; height: 90px; margin: 0 10px;
        }
        .fullname {
            margin: 10px;
        }
</style>
</html>