<?php require_once __DIR__ . "/../class/cls_tai_khoan.php";
require_once __DIR__ . "/../class/cls_dich_vu.php"; ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng Ký</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <?php $login = new cls_tai_khoan();
  $ins = new cls_dich_vu(); ?>

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <!-- login img left -->
          <div class="col-md-5">
            <img src="img/login.jpg" alt="login" class="login-card-img">
          </div>

          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
              </div>
              <p class="login-card-description">Đăng Ký Tài Khoản </p>

              <?php
              $data = array();
              $error = array();
              if (isset($_POST['dang_nhap'])) {
                $vai_tro = 2; 

                if($_FILES['image']['name']== ''){
                  $image = 'avt_khach_hang.png';
                }else{
                  $image = $_FILES["image"]["name"];
                  $img_tmp = $_FILES["image"]["tmp_name"];
                  move_uploaded_file($img_tmp, '../img/' . $image);
                }

                $data['ten_tk'] = isset($_POST['ten_tk']) ? $_POST['ten_tk'] : '';
                $data['sdt_tk'] = isset($_POST['sdt_tk']) ? $_POST['sdt_tk'] : '';
                $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
                $data['mat_khau'] = isset($_POST['mat_khau']) ? $_POST['mat_khau'] : '';
                

                if (empty($data['ten_tk'])) {
                  $error['ten_tk'] = "<span style='color: red ;'> * Không được để trống </span>";
                }

                if (empty($data['email'])) {
                  $error['email'] = "<span style='color: red ;'> * Không được để trống </span>";
                }else if($data['email']){
                  $error['email'] =  $ins->kt_emai($data['email']);
                }



                if (empty($data['sdt_tk'])) {
                  $error['sdt_tk'] = "<span style='color: red ;'> * Không được để trống </span>";
                } else if ($data['sdt_tk']) {
                  $error['sdt_tk'] =  $ins->kt_sdt_tk($data['sdt_tk']);
                } 

                if (empty($data['mat_khau'])) {
                  $error['mat_khau'] = "<span style='color: red ;'> * Không được để trống </span>";
                }else if($data['mat_khau']){
                  $error['mat_khau'] = $ins->kt_mk($data['mat_khau']);
                }

                /// 



                if(empty($error['ten_tk']) && empty($error['sdt_tk'])){
                   if(empty($error['email']) && empty($error['mat_khau'])){
                    // $result = $login->them_tk($data['ten_tk'],$image,$data['email'],$data['sdt_tk'], $data['mat_khau'], $vai_tro);
                    var_dump($data['ten_tk'],$image,$data['email'],$data['sdt_tk'], $data['mat_khau'], $vai_tro);
                   }
                } 


              }
              ?>





              <form action="" method="POST" enctype="multipart/form-data">
                <?php if(isset($result)){
                  echo "<span style='color: green ;'>".$result."</span>";
                } ?>
                <div class="form-group">
                  <label for="text" class="sr-only">Tên Tài Khoản</label> <?php echo isset($error['ten_tk']) ? $error['ten_tk'] : ''; ?>
                  <input type="text" name="ten_tk" class="form-control" value="<?php echo isset($data['ten_tk']) ? $data['ten_tk'] : ''; ?>" placeholder="nhập tên">
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label> <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                  <input type="text" name="email" id="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" class="form-control" placeholder="nhập email">
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only"> Số Điện Thoại</label> <?php echo isset($error['sdt_tk']) ? $error['sdt_tk'] : ''; ?>
                  <input type="text" name="sdt_tk" class="form-control" value="<?php echo isset($data['sdt_tk']) ? $data['sdt_tk'] : ''; ?>" placeholder="nhập số điện thoại">
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only"> anh đại diẹn</label>
                  <input type="file" name="image" class=""  placeholder="nhập số điện thoại">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Mật Khẩu</label> <?php echo isset($error['mat_khau']) ? $error['mat_khau'] : ''; ?>
                  <input type="password" name="mat_khau" id="password"value="<?php echo isset($data['mat_khau']) ? $data['mat_khau'] : ''; ?>" class="form-control" placeholder="nhập mật Khẩu">
                </div>
                <input name="dang_nhap" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Đăng Nhập">
              </form>
              <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
              <p class="login-card-footer-text">Bạn có tài khoản? <a href="./login.php" class="text-reset">Đăng Nhập ở đây</a></p>
              <!-- <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav> -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>