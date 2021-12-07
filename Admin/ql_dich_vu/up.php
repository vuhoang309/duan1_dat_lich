
<?php require __DIR__ . "/../admin_layout/hedear.php"; ?>
<?php require __DIR__ . "/../../class/cls_dich_vu.php"; ?>

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
                                <h2> Sữa Kiểu Tóc </h2>
                                <?php
                                $ins = new cls_dich_vu();

                                if (isset($_GET['id_up'])) {
                                    $_SESSION['id']  = $_GET['id_up'];
                                } 

                                $result = $ins->hien_dv_id($_SESSION['id']);

                                if (isset($_POST['sup'])) {
                                    $ten = $_POST["ten_dv"];
                                    $gia = $_POST["gia"];
                                    $giam_gia = $_POST['giam_gia'];
                                    $mo_ta = $_POST["mo_ta"];
                                    if (isset($_GET["id_up"])) {
                                        while ($row = $result->fetch_assoc()) {
                                            if ($_FILES["image"]["name"] == "") {
                                                $image = $row["anh1"];
                                            } else {
                                                $image = $_FILES["image"]["name"];
                                                $img_tmp = $_FILES["image"]["tmp_name"];
                                                move_uploaded_file($img_tmp, '../../img/' . $image);
                                            }
                                        }
                                       $kq = $ins->sua_dv($ten,$gia,$giam_gia,$mo_ta,$image,$_SESSION['id']);
                                        
                                    }
                                }
                                ?>

                                 <?php if (isset($kq)) { echo $kq; ?>
                                    <script>
                                        location.replace("dich_vu.php");
                                    </script>
                                <?php } ?> 



                                <?php
                                   if(!empty($result)){
                                    while ($row = $result->fetch_assoc()) {
                                ?>

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="text" name="ten_dv" class="form-control" value="<?php echo $row['ten_dv'] ?>" placeholder="Nhập Tên">
                                            </div>

                                            <div class="form-group">
                                                <input type="number" name="gia" class="form-control" value="<?php echo $row['gia_dv'] ?>" placeholder="Nhập Email">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="number" name="giam_gia" value="<?php echo $row['giam_gia'] ?>"  class="form-control" placeholder="nhập Giảm Giá" >
                                            </div> 

                                            <div class="form-group">
                                                <input type="text" name="mo_ta" class="form-control" value="<?php echo $row['mo_ta'] ?>" placeholder="Nhập mô Tả thoại">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="image" class="form-control" >
                                            </div>


                                            <div class="form-group">
                                                <input type="submit" name="sup">
                                            </div>

                                            <a href="./dich_vu.php">về danh sách</a>
                                        </form>
                                <?php
                                    }
                                   }
                                ?>
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