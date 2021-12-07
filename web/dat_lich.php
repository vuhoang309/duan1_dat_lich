
<?php include_once __DIR__ . "/layout.php" ?>
<?php include_once __DIR__ . "/../class/cls_dich_vu.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kiểu tóc</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    form {
        margin: 0px 30px;
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
</style>

<div class="main-content">
    <div class="signup-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">
                    <div class="form-bg">
                        <h2> Đặt Lich </h2>
                        <?php
                        $ins = new cls_dich_vu();



                        $date =  date("Y-m-d", time());

                        $error = array();
                        $data = array();
                        

                        if (!empty($_POST['dich_vu'])) {
                            $dich_vu = implode(',', $_POST['dich_vu']);
                            $data['dich_vu'] = isset($dich_vu) ? $dich_vu : '';
                        } else {
                            $dich_vu = null;
                            $data['dich_vu'] = isset($dich_vu) ? $dich_vu : '';
                        }






                        if (isset($_POST['sup'])) {



                            if (isset($_SESSION['id_tk'])) {
                                $id_tk = $_SESSION['id_tk'];
                            } else {
                                $id_tk = 0;
                            }

                            $ngay_dat = $_POST['ngay_dat'];
                            $trang_thai = 1;



                            $data['ten_kh'] = isset($_POST['ten_kh']) ? $_POST['ten_kh'] : '';
                            $data['sdt_kh'] = isset($_POST['sdt_kh']) ? $_POST['sdt_kh'] : '';
                            $data['ca_lam'] = isset($_POST['ca_lam']) ? $_POST['ca_lam'] : '';
                            $data['ngay_hen'] = isset($_POST['ngay_hen']) ? $_POST['ngay_hen'] : '';
                            $data['nhan_vien'] = isset($_POST['nhan_vien']) ? $_POST['nhan_vien'] : '';

                            if (empty($data['ten_kh'])) {
                                $error['ten_kh'] = "<span style='color: red ;'> * Không được để trống </span>";
                            }



                            if (empty($data['sdt_kh'])) {
                                $error['sdt_kh'] = "<span style='color: red ;'> * Không được để trống </span>";
                            } else if ($data['sdt_kh']) {
                                $error['sdt_kh'] =  $ins->kt_sdt($data['sdt_kh']);
                            }

                            ///

                            if (empty($data['ca_lam'])) {
                                $error['ca_lam'] = "<span style='color: red ;'> * Không được để trống </span>";
                            } else if ($data['ca_lam']) {
                                $error['ca_lam'] =  $ins->kt_ca($data['ca_lam']);
                            }

                            if (empty($data['nhan_vien'])) {
                                $error['nhan_vien'] = "<span style='color: red ;'> * Không được để trống </span>";
                            }
                            /// 
                            if (empty($data['dich_vu'])) {
                                $error['dich_vu'] = "<span style='color: red ;'> * Không được để trống </span>";
                            }
                            ///


                            if (empty($data['ngay_hen'])) {
                                $error['ngay_hen'] = "<span style='color: red ;'> * Không được để trống </span>";
                            } else if ($data['ngay_hen']) {
                                $error['ngay_hen'] =  $ins->kt_ngay($date, $data['ngay_hen']);
                            }



                            if (empty($error['ten_kh']) && empty($error['sdt_kh'])) {
                                if (empty($error['ca_lam'])) {
                                    if (empty($error['ngay_hen'])) {
                                        if (empty($error['nhan_vien']) && empty($error['dich_vu'])) {
                                             $result = $ins->them_lich($data['ten_kh'], $data['sdt_kh'], $data['dich_vu'], $data['ca_lam'], $ngay_dat, $data['ngay_hen'], $trang_thai, $data['nhan_vien'], $id_tk);
                                        } else {
                                            $result =  "<span style='color:  ;'> * chú ý ko để trống nhân viên  và dịch vụ . </span>";
                                        }
                                    } else {
                                        $result =  "<span style='color:  ;'> * chú ý không để trống lịch và đúng ngày hẹn . </span>";
                                    }
                                } else {
                                    $result =  "<span style='color:  ;'> * chú ý vẫn trống một số mục  </span>";
                                }
                            } else {
                                $result =  "<span style='color:  ;'> * chú ý thành phần trống của lịch. </span>";
                            }
                        }

                        ?>










                        <form action="" method="POST" enctype="multipart/form-data">

                            <?php if (isset($result)) {
                                echo $result;
                            } ?>
                            <div class="form-group">
                                <span class="form-label"> Tên Khách Hàng </span>
                                <input type="text" value="<?php if (isset($data['ten_kh']) ? $data['ten_kh'] : '') {
                                                                echo $data['ten_kh'];
                                                            } else if (isset($_SESSION['id_tk'])) {
                                                                echo $_SESSION['use_name'];
                                                            } ?>" name="ten_kh" class="form-control" placeholder="Nhập Tên">
                                <?php echo isset($error['ten_kh']) ? $error['ten_kh'] : ''; ?>

                            </div>

                            <div class="form-group">
                                <span class="form-label"> Tên số điện thoại </span>
                                <input type="text" value="<?php if (isset($data['sdt_kh']) ? $data['sdt_kh'] : '') {
                                                                echo $data['sdt_kh'];
                                                            } else if (isset($_SESSION['id_tk'])) {
                                                                echo $_SESSION['sdt_tk'];
                                                            } ?>" name="sdt_kh" class="form-control" placeholder="Nhập Số điện thoại">
                                <?php echo isset($error['sdt_kh']) ? $error['sdt_kh'] : ''; ?>
                            </div>




                            <div class="date-group">
                                <div class="form-group">
                                    <span class="form-label"> Giờ Hẹn </span>
                                    <select name="ca_lam" id="ca_lam" class="form-control date-input ">
                                        <option value="">chon h hẹn</option>
                                        <?php
                                        $result = $ins->gio_lam();
                                        if (!empty($result)) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row['ca'] ?>" <?php if (isset($data['ca_lam']) ? $data['ca_lam'] : '') {
                                                                                                if ($data['ca_lam'] == $row['ca']) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>> <?php echo $row['ca'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>


                                    </select>
                                    <?php echo isset($error['ca_lam']) ? $error['ca_lam'] : ''; ?>


                                </div>



                                <div class="form-group">
                                    <span class="form-label"> Nhân viên </span>
                                    <select name="nhan_vien" id="nhan_vien" class="form-control date-input ">
                                        <option value="">chon nhan vien</option>
                                        <?php $result = $ins->nhan_vien();
                                        if (!empty($result)) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $row['id_nv'] ?>" <?php if (isset($data['nhan_vien']) ? $data['nhan_vien'] : '') {
                                                                                                if ($data['nhan_vien'] == $row['id_nv']) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>> <?php echo $row['ten_tk'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo isset($error['nhan_vien']) ? $error['nhan_vien'] : ''; ?>

                                </div>



                            </div>




                            <div class="date-group">

                                <div class="form-group ">
                                    <span class="form-label">Ngày Đặt</span>
                                    <input type="date" name="ngay_dat" value="<?php echo $date; ?>" class="form-control date-input" placeholder="Nhập mật khẩu">
                                </div>

                                <div class="form-group ">
                                    <span class="form-label">Ngày Hẹn</span>
                                    <input type="date" value="<?php echo isset($data['ngay_hen']) ? $data['ngay_hen'] : ''; ?>" name="ngay_hen" class="form-control  date-input" placeholder="Nhập mật khẩu">
                                    <?php echo isset($error['ngay_hen']) ? $error['ngay_hen'] : ''; ?>

                                </div>
                            </div>





                            <span class="form-label">
                                dich vụ
                            </span>
                            <?php echo isset($error['dich_vu']) ? $error['dich_vu'] : ''; ?>


                            <div class="form-group check-group">
                                <?php
                                $result = $ins->hien_dv();
                                if (!empty($result)) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <div class="check-val">
                                            <input type="checkbox" name="dich_vu[]" value="<?php echo $row['ten_dv'] ?>" <?php
                                                                                                                            if (isset($_GET['id_dv'])) {
                                                                                                                                if ($row['ten_dv'] == $_GET['id_dv']) {
                                                                                                                                    echo 'checked';
                                                                                                                                }
                                                                                                                            } else if (isset($data['dich_vu']) ? $data['dich_vu'] : '') {
                                                                                                                                $arr_data = explode(',', $data['dich_vu']);
                                                                                                                                foreach ($arr_data as $val) {
                                                                                                                                    if ($val == $row['ten_dv']) {
                                                                                                                                        echo "checked";
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            } ?>> <span><?php echo $row['ten_dv'] ?></span>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>


                            <div class="form-group">
                                <input type="submit" name="sup" value="Đặt Lịch">
                            </div>

                            <a href="./trangchu.php">về Trang chủ</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</main>




</scrip> -->


<?php include_once __DIR__ . "/layout2.php" ?>