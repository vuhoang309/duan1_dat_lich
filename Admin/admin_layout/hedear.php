<?php
session_start();
if(!isset($_SESSION['vai_tro'])==1){
    header("location: ../../login/login.php ");

}
if(isset($_SESSION['vai_tro'])){
    if($_SESSION['vai_tro']==2){
        session_destroy();
        header("location: ../../login/login.php ");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">

</head>


<body>

    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar" style="background-color:black;">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="ti-unlink"></span>
                <h3><?php if (isset($_SESSION['use_name'])) {
                            echo $_SESSION["use_name"];
                        } ?></h3>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../index.php">
                        <span class="ti-user"></span>
                        <span>tài Khoản</span>
                    </a>
                </li>

                <li>
                    <a href="../ql_bai_viet/bai_viet.php">
                        <span class="ti-book"></span>
                        <span>Bài Viết</span>
                    </a>
                </li>

                <li>
                    <a href="../ql_kieu_toc/kieu_toc.php">
                        <span class="ti-clipboard"></span>
                        <span>Kiểu Tóc</span>
                    </a>
                </li>
                 
             
                
                <li>
                    <a href="../ql_danh_gia/danh_gia.php">
                        <span class="ti-thumb-up"></span>
                        <span>Đánh Giá</span>
                    </a>
                </li>

                
                <li>
                    <a href="../ql_dich_vu/dich_vu.php">
                        <span class="ti-headphone-alt"></span>
                        <span>Dịch vụ</span>
                    </a>
                </li>
                <li>
                    <a href="../ql_dat_lich/dat_lich.php">
                        <span class="ti-calendar"></span>
                        <span>Đặt Lịch</span>
                    </a>
                </li>

                <li>
                    <a href="../../web/trangchu.php">
                        <span class="ti-home"></span>
                        <span>web</span>
                    </a>
                </li>




                <?php
                if (isset($_GET["action"]) && $_GET["action"] == "dang_xuat") {
                    session_destroy();
                    header("Location: ../../login/login.php");
                }

                ?>
                <li>
                    <a href="?action=dang_xuat">
                        <span class="ti-share-alt"></span>
                        <span>Đăng Xuất </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>