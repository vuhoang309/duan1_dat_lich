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
                    <h3>Danh sách Đặt Lịch</h3>

                    <!-- <div class="top">
                        <div class="themnguoidung">
                            <a href="./inset.php"></a>
                        </div>
                    </div> -->
                    <h4>

                    </h4>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên</th>
                                    <th>Số Điện thoại</th>
                                    <th>Dich vụ</th>
                                    <th>Gio hẹn</th>
                                    <th>Thời Gian Đặt</th>
                                    <th>Thời Gian Hẹn</th>
                                    <th>Trạng Thái</th>
                                    <th colspan="2">chức năng</th>
                                </tr>
                            </thead>

                            <?php

                            $dich_vu = new cls_dich_vu();


                            if(isset($_GET['id'])){

                               $id = $_GET['id'];
                               $xoa = $dich_vu->xoa_lich($id);
                            }

                             






	

                            
                           
                            $result = $dich_vu->hien_dl();
                            if (!empty($result)) {

                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tbody>
                                        <tr>

                                            <td><?php echo $row["id_dl"] ?></td>
                                            <td><?php echo $row["ten_kh"] ?></td>
                                            <td><?php echo $row["sdt_kh"] ?></td>
                                            <td><?php echo $row["dich_vu"] ?></td>
                                            <td><?php echo $row["gio_hen"] ?></td>
                                            <td>
                                                <?php 
                                                  $thoi_gian = date("d-m-Y", strtotime($row["ngay_dat"]));
                                                   echo $thoi_gian;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $thoi_gian = date("d-m-Y", strtotime($row["ngay_hen"]));
                                                echo $thoi_gian;
                                                 
                                                 ?>
                                            </td>
                                            <td>
                                            <?php
                                                if ($row['trang_thai'] == 1) {
                                                                        echo "<span style='color: blue ;'> Chờ Xác Nhận </span>";
                                                                    } else if ($row['trang_thai'] == 2) {
                                                                        echo "<span style='color: blue ;'> Xác Nhận  thành công </span>";
                                                                    } else if ($row['trang_thai'] == 3) {
                                                                        echo "<span style='color: green ;'>  Chờ Hoàn Thành  </span>";
                                                                    } else if ($row['trang_thai'] == 4) {
                                                                        echo "<span style='color: green ;'>  Hoàn Thành </span>";
                                                                    }
                                                                    if ($row['trang_thai'] == 5) {
                                                                        echo "<span style='color: red ;'>Bị Hủy </span>";
                                                                    }
                                                 
                                                ?>
                                            </td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn xóa không ?');" href="./dat_lich.php?id=<?php echo $row["id_dl"] ?>">Xóa</a></span>

                                            </td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn sửa không ?');" href="./up.php?id_up=<?php echo $row["id_dl"]; ?>">Sửa</a></span>
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

<html> 
    <p style="color: green;"></p>
</html>