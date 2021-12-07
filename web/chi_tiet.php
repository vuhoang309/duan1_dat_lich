<?php include_once __DIR__ . "/layout.php" ?>
<?php include_once __DIR__ . "/../class/cls_dich_vu.php";
$chi_tiet = new cls_dich_vu(); 
?>

<style>
  

    .card {
        margin-bottom: 30px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 0;
    }

    .card .card-subtitle {
        font-weight: 300;
        margin-bottom: 10px;
        color: #8898aa;
    }

    .table-product.table-striped tbody tr:nth-of-type(odd) {
        background-color: #f3f8fa !important
    }

    .table-product td {
        border-top: 0px solid #dee2e6 !important;
        color: #728299 !important;
    } 
    .card .card-body .row{
      display: flex;
      /* column-gap: 140px; */
      /* margin: 0px auto !important; */

    }  
   .card .card-body .row .image-dv .white-box img {
       height: 500px;
       width: 500px;

    } 
    a{
        text-decoration: none;
        color: white;
    } 
    .card .card-body .row button{
        background-color: black;
    }
    /* .card .card-body .row {} */
</style>

<main>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <div class="container">
        <?php 
           if(isset($_GET['id_dv'])){
                $_SESSION['id'] = $_GET["id_dv"];
           }
           $result = $chi_tiet->hien_dv_id($_SESSION['id']);

             if (!empty($result)) {
              while ($row = $result->fetch_assoc()) {
             ?>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> <?php echo $row['ten_dv'] ?></h3>
                        <h6 class="card-subtitle"></h6>
                        <div class="row">
                            <div class=" image-dv col-lg-5 col-md-5 col-sm-6">
                                <div class="white-box"><img src="../img/<?php echo $row['anh1']; ?>" class="img-dv"></div>
                            </div> 

                            <div class="col-lg-5 col-md-5 col-sm-4">
                                <h4 class="box-title mt-5">Mô Tả Dịch Vụ</h4>
                                <p> <?php echo $row['mo_ta'] ?></p>
                                <h2 class="mt-5">
                                   <?php echo $row['gia_dv'].".000"; ?> <small class="text-success"><?php if($row['giam_gia']>0){ echo"(".$row['giam_gia']."%off".")"; } ?> </small>
                                </h2>
                                <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary btn-rounded"><a href="./dat_lich.php?id_dv=<?php echo $row['ten_dv'] ?>">Đặt Lịch</a></button>
                                <h3 class="box-title mt-5">Điểm Nổi Bật</h3>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-check text-success"></i>Nhân viên có kỹ năng cao</li>
                                    <li><i class="fa fa-check text-success"></i>với kinh nghiệm đi đầu so với hiện tại</li>
                                    <li><i class="fa fa-check text-success"></i>Trang thiết bị hiện đại và an toàn</li>
                                </ul>
                            </div>
                         
                        </div>
                    </div>
                </div>
        <?php }
             } ?>
    </div>
</main>
<?php include_once __DIR__ . "/layout2.php" ?>