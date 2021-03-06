<?php include __DIR__ . "/layout.php" ?>
<?php
include_once __DIR__ . "/../class/cls_tai_khoan.php";
include_once __DIR__ . "/../class/cls_dich_vu.php";
$acc = new cls_tai_khoan();
?>


<style>
    .table {
        width: 1200px !important;

    }

    .btn button {
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
        margin: 0px 8px 8px;
        padding: 10px;
        text-align: center;

    }

    .title {
        text-align: center;
    }

    .btn-edit {
        color: #ffff !important;
        background-color: black !important;
        border-color: white !important;
    }

    tr {
        text-align: center;
    }

    td button a {
        font-size: 15px;
        text-decoration: none;
        color: black;
    }

    .dv {
        width: 200px;
    }
</style>
<div class="container">
    <div class="main-body">

        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <?php
            if (isset($_SESSION['id_tk'])) {
                $id = $_SESSION['id_tk'];
            } else {
                $id = 1;
            }

            $kq = $acc->tai_khoan($id);

            if (isset($kq)) {
                while ($row = $kq->fetch_assoc()) {
            ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                                    <img src="../img/<?php echo $row['avt_tk'] ?>" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?php echo $row['ten_tk'] ?></h4>
                                        <p class="text-secondary mb-1"> <?php
                                                                        if ($row['vai_tro'] == 1) {
                                                                            echo "Qu???n L?? Nh??n vi??n";
                                                                        } else if ($row['vai_tro'] == 2) {
                                                                            echo "kh??ch H??ng";
                                                                        } else if ($row['vai_tro'] == 3) {
                                                                            echo "Nh??n Vi??n Shop ";
                                                                        }

                                                                        ?></p>
                                        <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                        <!-- <button class="btn btn-primary">Follow</button>
                                <button class="btn btn-outline-primary">Message</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="card mb-3">



                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> T??n </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['ten_tk'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['email'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">S??? ??i???n tho???i</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['sdt_tk'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vai tr??</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php
                                        if ($row['vai_tro'] == 1) {
                                            echo "Qu???n L??";
                                        } else if ($row['vai_tro'] == 2) {
                                            echo "kh??ch H??ng";
                                        } else if ($row['vai_tro'] == 3) {
                                            echo "Nh??n Vi??n";
                                        }

                                        ?>
                                    </div>
                                </div>
                                <!-- <hr> -->
                                <!-- <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Bay Area, San Francisco, CA
                                    </div>
                                </div> -->
                                <hr>
                                <!-- <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-info btn-edit" href="">Edit</a>
                                    </div>
                                </div> -->
                            </div>




                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <div class="col-md-8">

                <div class="title">
                    <h3> l???ch H???n tr?????c </h3>
                </div>
                <table class="table">
                    <!-- <div class="btn">
                                <button class="btn_a">C???p Nh???t</button>
                            </div> -->
                    <thead>
                        <tr>
                            <th scope="col">T??n</th>
                            <th scope="col">S??? ??i???n tho???i</th>
                            <th scope="col">D???ch V???</th>
                            <th scope="col">gi??? H???n</th>
                            <th scope="col">Ngay ?????t</th>
                            <th scope="col">Ng??y H???n</th>

                            <?php if($_SESSION['vai_tro']== 1){ ?>
                                <th scope="col">Nh??n vi??n</th>
                            <?php } ?>

                          
                            <th scope="col">trang Th??i</th>

                            <th colspan="3">ch???c N??ng</th>
                        </tr>
                    </thead>

                    <?php
                    if (isset($_SESSION['vai_tro'])) {
                        if ($_SESSION['vai_tro'] == 3) {
                            $nv = $acc->nhan_vien_id($_SESSION['id_tk']);


                            if ($nv) {
                                while ($id_nv = $nv->fetch_assoc()) {

                    ?>

                                    <tbody>
                                        <?php
                                        $lich = new cls_dich_vu();



                                        if (isset($_GET['id_kh'])) {
                                            $id = $_GET['id_kh'];
                                        }
                                        $tt = $lich->sua_trang_thai(5,$id);

        
                                  

                                        $lich_dat = $lich->hien_dl_id($id_nv['id_nv']);
                                        if ($lich_dat) {
                                              
                                            while ($date = $lich_dat->fetch_assoc()) {
                                                if($date['trang_thai'] != 5){
                                        ?>
                                                <tr>
                                                    <td><?php echo $date['ten_kh'] ?> </td>
                                                    <td><?php echo $date['sdt_kh'] ?> </td>
                                                    <td><?php echo $date['dich_vu'] ?> </td>
                                                    <td><?php echo $date['gio_hen'] ?> </td>
                                                    <td><?php echo $date['ngay_dat'] ?> </td>
                                                    <td><?php echo $date['ngay_hen'] ?> </td>
                                                    <td> <?php
                                                            if ($date['trang_thai'] == 1) {
                                                                echo "<span style='color: blue ;'> Ch??? X??c Nh???n </span>";
                                                            } else if ($date['trang_thai'] == 2) {
                                                                echo "<span style='color: blue ;'> X??c Nh???n  th??nh c??ng </span>";
                                                            } else if ($date['trang_thai'] == 3) {
                                                                echo "<span style='color: green ;'> ??ang Ch??? l??m </span>";
                                                            } else if ($date['trang_thai'] == 4) {
                                                                echo "<span style='color: greed ;'>  Ho??n Th??nh </span>";
                                                            } else
                                                            
                                                            if ($date['trang_thai'] == 5) {
                                                                echo "<span style='color: red ;'> ???? B??? H???y </span>";
                                                            }

                                                            ?></td>
                                                    <?php if ($date['trang_thai'] == 1) {
                                                    ?>
                                                        <td>
                                                            <button class="badge success"><a onclick="return confirm('B???n c?? mu???n h???y l???ch ko kh??ng ?');" href="./acc.php?id_kh=<?php echo $date["id_dl"] ?>">H???y L???ch</a></button>
                                                        </td>
                                                    <?php
                                                    } else if($date['trang_thai']){

                                                    ?>
                                                        <td>
                                                            <button class="badge success"><a onclick="return confirm('m???i b???n li??n h??? ????? ?????i l???ch ?');" href="./acc.php?id_ht=<?php echo $date["id_dl"] ?>">Ho??n Th??nh</a></button>
                                                        </td>
                                                    <?php
                                                    }

                                                    ?>

                                                </tr>
                                        <?php
                                            }}
                                        }

                                        ?>

                                    </tbody>
                    <?php
                                }
                            }
                        }
                    } ?>


                    <?php
                    if (isset($_SESSION['vai_tro'])) {
                        if ($_SESSION['vai_tro'] == 2) {
                    ?>

                            <tbody>
                                <?php
                                $lich = new cls_dich_vu();
                                if (isset($_GET['id_kh'])) {
                                    $id = $_GET['id_kh'];
                                }

                                $trang_thai = 5;

                                $tt = $lich->sua_trang_thai($trang_thai, $id);

                                $lich_dat = $lich->hien_dl_id2($_SESSION['id_tk']);
                                if ($lich_dat) {
                                    while ($date = $lich_dat->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $date['ten_kh'] ?> </td>
                                            <td><?php echo $date['sdt_kh'] ?> </td>
                                            <td><?php echo $date['dich_vu'] ?> </td>
                                            <td><?php echo $date['gio_hen'] ?> </td>
                                            <td><?php echo $date['ngay_dat'] ?> </td>
                                            <td><?php echo $date['ngay_hen'] ?> </td>
                                           

                                            <td> <?php
                                                    if ($date['trang_thai'] == 1) {
                                                        echo "<span style='color: blue ;'> Ch??? X??c Nh???n </span>";
                                                    } else if ($date['trang_thai'] == 2) {
                                                        echo "<span style='color: blue ;'> X??c Nh???n  </span>";
                                                    } else if ($date['trang_thai'] == 3) {
                                                        echo "<span style='color: green ;'> ??ang Ch??? l??m </span>";
                                                    } else if ($date['trang_thai'] == 4) {
                                                        echo "<span style='color: blue ;'>  Ho??n Th??nh </span>";
                                                    }
                                                    if ($date['trang_thai'] == 5) {
                                                        echo "<span style='color: red ;'>B??? H???y </span>";
                                                    }

                                                    ?></td>


                                            <?php if ($date['trang_thai'] == 1) {
                                            ?>
                                                <td>
                                                    <button class="badge success"><a onclick="return confirm('B???n c?? mu???n h???y l???ch ko kh??ng ?');" href="./acc.php?id_kh=<?php echo $date["id_dl"] ?>">H???y L???ch</a></button>
                                                </td>
                                            <?php
                                            } else {

                                            ?>
                                                <td>
                                                    <button class="badge success"><a onclick="return confirm('m???i b???n li??n h??? ????? ?????i l???ch ?');" href="./thong_tin_lien_he.php">?????i l???ch</a></button>
                                                </td>
                                            <?php
                                            }

                                            ?>

                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                    <?php
                        }
                    }

                    ?>


                    <?php
                    if (isset($_SESSION['vai_tro'])) {
                        if ($_SESSION['vai_tro'] == 1) {
                    ?>

                            <tbody>
                                <?php
                                $lich = new cls_dich_vu();

                                $lich_dat = $lich->hien_dl();

                                if (isset($_POST['sua_tt'])) {
                                    $sua = $lich->sua_trang_thai($_POST['trang_thai'], $_POST['id_dv']);
                                    echo " <script> location.replace('acc.php'); </script>";
                                }



                                if ($lich_dat) {
                                    while ($date = $lich_dat->fetch_assoc()) {
                                     if($date['trang_thai'] !=4){
                                ?> 
                                         
                                        <tr>
                                            <td><?php echo $date['ten_kh'] ?> </td>
                                            <td><?php echo $date['sdt_kh'] ?> </td>
                                            <td class="dv"><?php echo $date['dich_vu'] ?> </td>
                                            <td><?php echo $date['gio_hen'] ?> </td>
                                            <td><?php echo $date['ngay_dat'] ?> </td>
                                            <td><?php echo $date['ngay_hen'] ?> </td> <td><?php echo $date['ten_tk'] ?> </td>
                                            <td> 
                                                <?php
                                                    if ($date['trang_thai'] == 1) {
                                                        echo "<span style='color: blue ;'> Ch??? X??c Nh???n </span>";
                                                    } else if ($date['trang_thai'] == 2) {
                                                        echo "<span style='color: blue ;'> X??c Nh???n  th??nh c??ng </span>";
                                                    } else if ($date['trang_thai'] == 3) {
                                                        echo "<span style='color: green ;'> ??ang Ch??? l??m </span>";
                                                    } else if ($date['trang_thai'] == 4) {
                                                        echo "<span style='color: green ;'>  Ho??n Th??nh </span>";
                                                    }
                                                    if ($date['trang_thai'] == 5) {
                                                        echo "<span style='color: red ;'>B??? H???y </span>";
                                                    }

                                                ?>
                                            </td> 

                                            <?php 
                                              if($date['trang_thai']==4){

                                            ?>
                                              <td><span style='color: green ;'>  Ho??n Th??nh </span></td>  
                                            <?php

                                              }else{
                                            ?> 
                                            
                                            <form action="" method="post">
                                                <td>
                                                    <select name="trang_thai" id="">
                                                        <option value="">ch???n</option>
                                                        <option value="1" <?php if ($date['trang_thai'] == 1) {
                                                                                echo "selected";
                                                                            } ?>>Ch??? x??c nh???n</option>
                                                        <option value="2" <?php if ($date['trang_thai'] == 2) {
                                                                                echo "selected";
                                                                            } ?>>x??c Nh???n</a></option>
                                                        <option value="3" <?php if ($date['trang_thai'] == 3) {
                                                                                echo "selected";
                                                                            } ?>>??ang Ch??? l??m</option>
                                                        <option value="4" <?php if ($date['trang_thai'] == 4) {
                                                                                echo "selected";
                                                                            } ?>>Ho??n Th??nh</option>
                                                        <option value="5" <?php if ($date['trang_thai'] == 5) {
                                                                                echo "selected";
                                                                            } ?>>B??? H???y</option>

                                                    </select>

                                                    <input type="hidden" name="id_dv" value="<?php echo $date['id_dl']  ?>">
                                                </td>

                                                <td>
                                                    <button type="submit" name="sua_tt" class=""> <a onclick="return confirm('b???n c?? mu???m  thay ?????i tr???ng th??i l???ch ?');">Save</a></button>
                                                </td>
                                            </form>
                                            <?php
                                              }
                                            
                                            
                                            ?>



                                        </tr>
                                <?php } }
                                } ?>

                            </tbody>
                    <?php
                        }
                    }

                    ?>



                </table>
            </div>

        </div>

    </div>
</div>

<?php include __DIR__ . "/layout2.php" ?>