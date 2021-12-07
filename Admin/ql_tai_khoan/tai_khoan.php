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
                    <h3>Danh sách Tài khoản</h3>

                    <div class="top">
                        <div class="themnguoidung">
                            <a href="./inset.php">Thêm Tài khoản</a>
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
                                    <th>Email</th>
                                    <th>Số Điện thoại</th>
                                    <th>ảnh</th>
                                    <th>vai trò</th>
                                    <th colspan="2">chức năng</th>
                                </tr>
                            </thead>

                            <?php

                            $tai_khoan = new cls_tai_khoan();

                            if(isset($_GET['id'])){
                               $id = $_GET['id'];
                               $xoa = $tai_khoan->xoa_tk($id);
                            }

                            
                           
                            $result = $tai_khoan->danh_sach_tk();
                            if (!empty($result)) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tbody>
                                        <tr>

                                            <td><?php echo $row["id_tk"] ?></td>
                                            <td><?php echo $row["ten_tk"] ?></td>
                                            <td><?php echo $row["email"] ?></td>
                                            <td><?php echo $row["sdt_tk"] ?></td>
                                         
                                            <td> <img src="../../img/<?php echo $row["avt_tk"] ?>" alt=""></td>
                                            <td>
                                                <?php
                                                if($row['vai_tro']==1){
                                                    echo "Quản Lý";
                                                }else if($row['vai_tro']==2){
                                                    echo "khách Hàng";
                                                }else if($row['vai_tro']==3){
                                                    echo "Nhân Viên";
                                                }
                                                 
                                                ?>
                                            </td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn xóa không ?');" href="./tai_khoan.php?id=<?php echo $row["id_tk"] ?>">Xóa</a></span>
                                            </td>
                                            <td>
                                                <span class="badge success"><a onclick="return confirm('Bạn có muốn sửa không ?');" href="./up.php?id_up=<?php echo $row["id_tk"]; ?>">Sửa</a></span>
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