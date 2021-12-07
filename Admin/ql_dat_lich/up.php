<?php include_once __DIR__ . "/../admin_layout/hedear.php" ?>
<?php include_once __DIR__ . "/../../class/cls_dich_vu.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kiểu tóc</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>


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
        width: 700px;
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

    input {
        margin-top: 10px;
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
        margin: 0px 220px;
        padding: 10px;


    }

    .check-group {
        display: flex;
        flex-wrap: wrap;
        margin-top: 1%;
        column-gap: 10px;
        margin-bottom: 2%;
    }

    .check-group .check-val {
        display: flex;
        flex-wrap: wrap;
        column-gap: 10px;
        /* border: 1px solid black; */
        width: 178px;
    }

    .check-group .check-val span {
        font-weight: 700;
        line-height: 20px;
        color: #353D40;
        font-family: 'Playfair Display', serif;
    }

    input[type="checkbox"] {
        width: 20px;
        color: hsl(0 0% 20%);
        font-family: Helvetica Neue;
        font-size: 14px;
        margin: 0px 10px;

    }

    

    .date-input {
        width: 270px;
    }

    .date-group {
        display: flex;
        flex-wrap: wrap;
        column-gap: 10px;
    }

    .form-label {
        color: #353D40;
        text-transform: uppercase;
        line-height: 24px;
        height: 24px;
        font-size: 14px;
        font-weight: 700;
        margin-left: 10px;
        margin-top: 10px;
    }

    .check-with {
        width: 560px;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="tel"] {
        width: 550px;
    }

    form {
        margin: 0px 30px;
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
                                <h2> Đặt Lich </h2>
                                <?php
                                $ins = new cls_dich_vu();


                                if (!empty($_POST['dich_vu'])) {
                                    $dich_vu = implode(',', $_POST['dich_vu']);
                                }

                                if (!empty($_GET['id_up'])) {
                                    $_SESSION['id'] = $_GET['id_up'];
                                }
                

                                $lich = $ins->sua_dl_id($_SESSION['id']);



                                if (isset($_POST['sup'])) {
                                    $ten = $_POST['ten_kh'];
                                    $sdt = $_POST['sdt_kh'];
                                    $ngay_hen = $_POST['ngay_hen'];
                                    $ngay_dat = $_POST['ngay_dat'];
                                    $trang_thai = $_POST['trang_thai'];
                                    $result = $ins->sua_lich_ad($ten, $sdt, $dich_vu, $ngay_dat, $ngay_hen, $trang_thai, $_SESSION['id']);
                                }



                                ?> 
                                  <?php if (isset($result)) { echo $result; ?>
                                    <script>
                                        location.replace("dat_lich.php");
                                    </script>
                                <?php } ?>




                                <?php
                                if (!empty($lich)) {
                                    while ($row_date = $lich->fetch_assoc()) {
                                ?>
                                        <form action="" method="POST" enctype="multipart/form-data">


                                            <div class="form-group">
                                                <span class="form-label"> Tên Khách Hàng </span>
                                                <input type="text" name="ten_kh" value="<?php echo $row_date['ten_kh'] ?>" required class="form-control" placeholder="Nhập Tên">
                                            </div>

                                            <div class="form-group">
                                                <span class="form-label"> Tên số điện thoại </span>
                                                <input type="tel" name="sdt_kh" value="<?php echo $row_date['sdt_kh'] ?>" required class="form-control" placeholder="Nhập Số điện thoại">
                                            </div>

                                            <div class="date-group">
                                                <div class="form-group">
                                                    <span class="form-label"> Giờ Hẹn </span>
                                                    <select name="ca_lam" id="ca_lam" class="form-control date-input ">
                                                        <?php
                                                        $result = $ins->gio_lam();
                                                        if (!empty($result)) {
                                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                                <option value="<?php echo $row['ca'] ?>" <?php if ($row_date['gio_hen'] == $row['ca']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>> <?php echo $row['ca'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>



                                                <div class="form-group">
                                                    <span class="form-label"> Nhân viên </span>
                                                    <select name="nhan_vien" id="nhan_vien" class="form-control date-input ">
                                                        <option value="">chon nhan vien</option>
                                                        <?php $result = $ins->nhan_vien();
                                                        if (!empty($result)) {
                                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                                <option value="<?php echo $row['id_nv'] ?>" <?php if ($row_date['id_nv'] == $row['id_nv']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                                    <?php echo $row['ten_tk'] ?>

                                                                </option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>




                                            </div>

                                            <div class="date-group">
                                                <div class="form-group ">
                                                    <span class="form-label">Ngày Đặt:</span>
                                                    <input type="date" name="ngay_dat" value="<?php echo $row_date['ngay_dat'] ?>" required class="form-control date-input" placeholder="Nhập mật khẩu">
                                                </div>
                                                <div class="form-group ">
                                                    <span class="form-label">Ngày Hẹn:</span>
                                                    <input type="date" name="ngay_hen" value="<?php echo $row_date['ngay_hen'] ?>" class="form-control  date-input" required placeholder="Nhập mật khẩu">
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <span class="form-label"> Trạng Thái </span>
                                                <select name="trang_thai"  class="form-control  ">
                                                   
                                                    <option value="1" <?php if ($row_date['trang_thai'] == 1) {echo 'selected';} ?>> Chờ Xác Nhận </option>
                                                    <option value="2" <?php if ($row_date['trang_thai'] == 2) {echo 'selected';} ?>> Xác Nhận </option>
                                                    <option value="3" <?php if ($row_date['trang_thai'] == 3) {echo 'selected';} ?>> Chờ Hoàn Thành </option>
                                                    <option value="4" <?php if ($row_date['trang_thai'] == 4) {echo 'selected';} ?>> Hoàn Thành </option>
                                                    <option value="5" <?php if ($row_date['trang_thai'] == 5) {echo 'selected';} ?>>Bị Hủy</option>

                                                </select>
                                            </div>




                                            <span class="form-label">
                                                dich vụ
                                            </span>
                                            <div class="form-group check-group">
                                                <?php
                                                $result = $ins->hien_dv();
                                                if (!empty($result)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <div class="check-val">
                                                            <input type="checkbox" name="dich_vu[]" value="<?php echo $row['ten_dv'] ?>" <?php $dv1 = $row_date['dich_vu'];
                                                                                                                                            $dv2 = explode(',', $dv1);
                                                                                                                                            foreach ($dv2 as $val) {
                                                                                                                                                if ($row['ten_dv'] == $val) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                }
                                                                                                                                            } ?>>
                                                            <span><?php echo $row['ten_dv'] ?></span>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>






                                            <div class="form-group">
                                                <input type="submit" name="sup" value="Thêm">
                                            </div>

                                            <a href="./dat_lich.php">về danh sách</a>
                                        </form>


                                <?php }
                                } ?>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>

<?php include_once __DIR__ . "/../admin_layout/footer.php" ?>