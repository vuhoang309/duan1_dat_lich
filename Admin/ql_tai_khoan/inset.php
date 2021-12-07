<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kiểu tóc</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<?php require __DIR__ . "/../admin_layout/hedear.php"; ?>
<?php require __DIR__ . "/../../class/cls_tai_khoan.php"; ?>

<style>
    .signup-page {
        float: left;
        width: 100%;
        height: 100%;
        background-color: #f9f9f9;
        padding: 20px 0px 20px;
    }

    .form-bg {
        background-color: #fff;
        border: 1px solid #e5e5e5;
        padding: 20px 40px 30px;
    }

    .logo {
        width: 200px;
        margin: 20px auto 40px;
        display: block;
    }

    .signup-page h2 {
        font-size: 17px;
        color: black;
        text-align: center;
        margin: 15px 5px;
    }


    .signup-btn {
        background-color: #d93025;
        border: none;
        width: 100%;
        color: #fff;
        font-size: 14px;
        text-align: center;
        padding: 8px 15px;
        border-radius: 4px;
        font-weight: 600;
        margin: 10px 0px 10px;
    }

    .signup-btn:hover,
    .login-with-fb:hover {
        opacity: 0.9;
    }

    .term-policy {
        color: #999;
        text-align: center;
        font-size: 14px;
        width: 61%;
        float: none;
        margin: 0 auto;
        line-height: 25px;
    }

    .term-policy a {
        color: #d93026;
        text-decoration: none;
        font-size: 14px;
    }

    input[type="submit"] {
        width: 100px;
        align-items: flex-start;
        background-color: hsl(0 0% 0%);
        border-color: hsl(0 0% 0%);
        border-radius: 32px;
        border-style: solid;
        border-width: 1.06667px;
        box-shadow: hsl(0 0% 0% / 0.02) 0px 2px 0px 0px;
        color: hsl(0 0% 100%);
        font-family: be vietnam pro;
        font-weight: 300px;
        line-height: 25.144px;
        margin: 0px 8px 8px;
        padding: 10px;
        text-align: center;

    }
</style>

<body>
    <main>
        <div class="main-content">
            <div class="signup-page">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">
                            <div class="form-bg">
                                <h2> Thêm Tài khoản </h2>
                                <?php
                                $ins = new cls_tai_khoan();

                                if (isset($_POST['sup'])) {
                                    $ten = $_POST['ten_tk'];

                                    $email = $_POST['email'];

                                    $sdt = $_POST['sdt_tk'];

                                    $mat_khau = $_POST['mat_khau'];

                                    $vai_tro = $_POST['vai_tro']; 
                                    
                                    if($_FILES["image"]["name"] == ""){
                                        $image = "avt_khach_hang.png";
                                    }else{
                                        $image = $_FILES["image"]["name"];
                                        $img_tmp = $_FILES["image"]["tmp_name"];
                                        move_uploaded_file($img_tmp, '../../img/' . $image);
                                    }

                                     $result  = $ins->them_tk($ten,$image,$email, $sdt, $mat_khau, $vai_tro);

                                    
                                } 



                                ?>

                                <?php

                                if (isset($result)) {
                                    echo $result;
                                ?>
                                 <script> location.replace("tai_khoan.php"); </script>
                                <?php
                                }

                                ?>

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" name="ten_tk" class="form-control" placeholder="Nhập Tên">
                                    </div>

                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control" placeholder="Nhập Tên">
                                    </div>

                                    <div class="form-group">
                                        <input type="email"  name="email" class="form-control" placeholder="Nhập Email">
                                    </div>

                                    <div class="form-group">
                                        <input type="tel" name="sdt_tk" class="form-control" placeholder="Nhập Số điện thoại">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu">
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="vai_tro" value="1"> Quản Lý
                                        <input type="radio" name="vai_tro" value="2"> Khách Hàng
                                        <input type="radio" name="vai_tro" value="3"> Nhân viên
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="sup" value="Thêm" >
                                    </div>

                                    <a href="./tai_khoan.php">về danh sách</a>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php require __DIR__ . "/../admin_layout/footer.php" ?>
</body>

</html>