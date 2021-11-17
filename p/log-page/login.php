<?php 

    $mail = $_POST['umail'];
    $psw = $_POST['upsw'];

    $sql = "SELECT * FROM tb_users WHERE email = '$mail' AND password = '$psw' ";
    $rs = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($rs);
    $row = mysqli_fetch_array($rs);

    if($row > 0){
        $_SESSION['user_mail'] = $mail;
        if($row['role'] == "User"){
            header("location: .../../index.php");
        }
    }else{
        header("location: log-page.php?error=Sai thông tin hoặc không tồn tại!");
    }   