<?php require __DIR__ . "/../admin_layout/hedear.php" ?>
<?php require __DIR__ . "/../../class/cls_kieu_toc.php" ?>
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
                    <h3>Danh sách kiểu tóc</h3>

                    <div class="top">
                        <div class="themnguoidung">
                            <a href="./inset.php">Thêm kiểu Tóc</a>
                        </div>

                    </div>
                    <h4>

                    </h4>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>id kiểu tóc</th>
                                    <th>tên kiểu tóc</th>
                                    <th>ảnh kiểu tóc</th>
                                    <th>phân loại</th>
                                    <th>mô tả</th>
                                    <th colspan="2">chức năng</th>
                                </tr>
                            </thead>

                            <?php

                            $kieu_toc = new cls_kieu_toc();

                            if(isset($_GET['id'])){
                               $id = $_GET['id'];
                               $xoa = $kieu_toc->xoa_kt($id);
                            }

                            
                           
                            $result = $kieu_toc->show_kt();
                            if (!empty($result)) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tbody>
                                        <tr>

                                            <td><?php echo $row["id_kt"] ?></td>
                                            <td><?php echo $row["ten_kt"] ?></td>
                                            <td><img src="../../img/<?php echo $row["anh_kt"]?>" alt=""></td>
                                            <td><?php echo $row["phan_loai"] ?></td>
                                            <td class="mota"><?php echo $row["mo_ta_kt"] ?></td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn xóa không ?');" href="./kieu_toc.php?id=<?php echo $row["id_kt"] ?>">Xóa</a></span>
                                            </td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn sửa không ?');" href="./up.php?id_up=<?php echo $row["id_kt"]; ?>">Sửa</a></span>
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