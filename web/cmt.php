<?php include "./layout.php" ?>
<?php require_once __DIR__ . "/../class/cls_tai_khoan.php" ?>

<style>
    .pull-left .img-circle {
        border-radius: 50%;
        color:
            hsl(210 11% 15%);
        line-height:
            24px;
        text-align: left;
        width: 200px;
    }

    .media-list {
        display: flex;
        flex-wrap: wrap;
        column-gap: 70px;
        margin: 0px 200px;
    }

    .media-list  li {
        list-style: none;
    } 

    form{
        width: 500px;
    }
</style>
<main>

    <div class="container">
        <div class="row bootstrap snippets bootdeys">
            <div class=" col-sm-12">
                <div class="comment-wrapper">
                    <div class="panel panel-info">
                        <!-- <div class="panel-heading">
                            Bảng Đánh giá
                        </div> -->

                        <?php
                        $danh_gia = new cls_tai_khoan();
                        if (isset($_POST['sup_post'])) {
                            $noi_dung = $_POST['danh_gia'];
                            $id = $_SESSION['id_tk'];
                            $date = date('Y/m/d h:i:s a', time());

                            $kq = $danh_gia->them_dg($noi_dung, $id, $date);
                        }

                        ?>

                        <div class="panel-body">

                            <ul class="media-list">
                                <?php
                                $result = $danh_gia->ds_chitiet(1);
                                if (!empty($result)) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <li class="media">
                                            <a href="#" class="pull-left">
                                                <img src="../img/<?php echo $row['avt_tk'] ?>" alt="" class="img-circle">
                                            </a>
                                            <div class="media-body">
                                                <!-- <span class="text-muted pull-right">
                                                    <small class="text-muted"><?php echo $row['ten_tk']; ?> </small>
                                                </span> -->
                                                <strong class="text-success"><?php echo $row['ten_tk']; ?> </strong>
                                                <p>
                                                    <?php echo $row['noi_dung']; ?>
                                                </p>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>


                            <div class="clearfix"></div>
                            <hr>
                            <form action="" method="POST">
                                <textarea class="form-control" name="danh_gia" placeholder="đánh giá ở đây..." rows="3"></textarea>
                                <br>
                                <button type="submit" name="sup_post" class="btn btn-info pull-right">Post</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>

<?php include "./layout2.php" ?>