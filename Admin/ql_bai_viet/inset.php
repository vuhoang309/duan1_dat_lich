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
<?php require __DIR__ . "/../../class/cls_kieu_toc.php"; ?>

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
                                <h2> Thêm bài viết </h2>
                                <?php
                                $ins = new cls_kieu_toc();

                                if (isset($_POST['sup'])) {
                                    $ten = $_POST['ten_bv'];
                                    $mo_ta = $_POST['mo_ta'];

                                    $image = $_FILES["image"]["name"];
                                    $img_tmp = $_FILES["image"]["tmp_name"];
                                    move_uploaded_file($img_tmp, '../../img/' . $image);

                                  $result = $ins->them_bv($ten, $image, $mo_ta);
                                }



                                ?>
                                <?php

                                if (isset($result)) {
                                    echo $result;
                                ?>
                                    <script>
                                        location.replace("bai_viet.php");
                                    </script>
                                <?php
                                }

                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" name="ten_bv" class="form-control" placeholder="Tiêu đề Bài viết">
                                    </div>

                                    <div class="form-group">
                                        <input type="file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mo_ta" class="form-control" placeholder=" mô tả bài biết">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="sup">
                                    </div>

                                    <a href="./bai_viet.php">về danh sách</a>
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