<?php require __DIR__ . "/../admin_layout/hedear.php" ?>
<?php require __DIR__ . "/../../class/cls_dich_vu.php" ?>
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
                    <h3>Danh sách Tài khoản</h3>

                    <div class="top">
                        <div class="themnguoidung">
                            <a href="./inset.php">Thêm dịch vụ</a>
                        </div>
                    </div>
                    <h4>

                    </h4>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Giảm Giá</th>
                                    <th>Mô tả</th>
                                    <th>Ảnh</th>
                                    <th colspan="2">chức năng</th>
                                </tr>
                            </thead>

                            <?php

                            $dich_vu = new cls_dich_vu();


                            if(isset($_GET['id'])){

                               $id = $_GET['id'];
                               $xoa = $dich_vu->xoa_dv($id);
                            }

                             
                            
                           
                            $result = $dich_vu->hien_dv();
                            if (!empty($result)) {

                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tbody>
                                        <tr>

                                            <td><?php echo $row["id_dv"] ?></td>
                                            <td><?php echo $row["ten_dv"] ?></td>
                                            <td><?php echo $row["gia_dv"].".000" ?></td>
                                            <td><?php echo $row["giam_gia"]."%" ?></td>
                                            <td><?php echo $row["mo_ta"]?></td>
                                            <td><img src="../../img/<?php echo $row["anh1"]?>" alt=""></td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn xóa không ?');" href="./dich_vu.php?id=<?php echo $row["id_dv"] ?>">Xóa</a></span>

                                            </td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn sửa không ?');" href="./up.php?id_up=<?php echo $row["id_dv"]; ?>">Sửa</a></span>
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