<?php require __DIR__ . "/../admin_layout/hedear.php" ?>
<?php require __DIR__ . "/../../class/cls_tai_khoan.php" ?>
<style>
    .top {
        display: flex;
    }

    .themnguoidung {
        height: 40px;
        width: 160px;
        background-color: #027581;
        line-height: 40px;
        text-align: center;
        margin-top: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        margin-left: 15px;
    }

    .themnguoidung a {
        color: white;
    }

    .dangxuat {
        height: 40px;
        width: 160px;
        background-color: #027581;
        line-height: 40px;
        text-align: center;
        margin-top: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        margin-left: 15px;
    }

    .dangxuat a {
        color: white;
    }

    table {
        margin-top: 10px;
    }

    h4 p {
        margin-left: 18px;
    }
    table th,td{
        text-align: center;
    }

    tbody img{
        height: 110px;
        width: 98px;
        border-radius: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    tbody .mota{
        width: 300px;
    }
</style>
<div class="main-content">
    <main>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Danh sách đánh giá</h3>

                    <div class="top">
                        <div class="themnguoidung">
                            <a href="../../web/cmt.php">đánh giá</a>
                        </div>

                    </div>
                    <h4>

                    </h4>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>id bài viết</th>
                                    <th>Nội Dung bài</th>
                                    <th>tài Khoản</th>
                                    <th colspan="2">chức năng</th>
                                </tr>
                            </thead>

                            <?php

                            $danh_gia = new cls_tai_khoan();

                            if(isset($_GET['id'])){
                               $id = $_GET['id'];
                               $xoa = $danh_gia->xoa_dg($id);
                            }

                            
                           
                            $result = $danh_gia->ds_danh_gia();
                            if (!empty($result)) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tbody>
                                        <tr>

                                            <td><?php echo $row["id_dg"] ?></td>
                                            <td><?php echo $row["noi_dung"] ?></td>
                                            <td><?php echo $row["id_tk"] ?></td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn xóa không ?');" href="./danh_gia.php?id=<?php echo $row["id_dg"] ?>">Xóa</a></span>
                                            </td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn sửa không ?');" href="./up.php?id_up=<?php echo $row["id_dg"]; ?>">Sửa</a></span>
                                            </td>
                                        </tr>
                                    </tbody>
                            <?php
                                }
                            }
                            ?>

                        </table>
                    </div>
                </div>

            </div>
        </section>

    </main>

</div>
<?php require __DIR__ . "/../admin_layout/footer.php" ?>