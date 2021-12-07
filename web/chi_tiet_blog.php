    <?php include_once __DIR__ . "/layout.php";
    include_once __DIR__ . '/../class/cls_kieu_toc.php';
    include_once __DIR__ . '/../class/cls_dich_vu.php' ?>

    <head>

        <link href="../style/chi_tiet_blog.css" rel="stylesheet" />

    </head>

    <style>
        .img-fluid {
            height: 400px;
            width: 500px;
            margin: 0px 130px;
        }
    </style>
    <?php

    if (isset($_GET['id_bv'])) {
        $_SESSION['id_bv'] = $_GET['id_bv'];
    }
    $blog = new cls_kieu_toc();
    $bv = $blog->hien_bv_id($_SESSION['id_bv']);
    if (!empty($bv)) {
        while ($row = $bv->fetch_assoc()) {
    ?>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1"> <?php echo $row['ten_bv'] ?> </h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2"></div>
                                <!-- Post categories-->
                                <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid " src="../img/<?php echo $row['anh_bv'] ?>" alt="..." /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4"> <?php echo $row['mo_ta_bv'] ?> </p>
                                <p class="fs-5 mb-4"> <?php echo $row['mo_ta_bv'] ?> </p>
                                <p class="fs-5 mb-4"> <?php echo $row['mo_ta_bv'] ?> </p>

                            </section>
                        </article>



                        <!-- Comments section-->

                    </div>
                    <!-- Side widgets-->


                    <div class="col-lg-4">
                        <!-- Search widget-->
                        <!-- <div class="card mb-4">
                            <div class="card-header">Search</div>
                            <div class="card-body">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                                </div>
                            </div>
                        </div> -->
                        <!-- Categories widget-->
                        <div class="card mb-4">
                            <div class="card-header">Dịch Vụ</div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <?php
                                        $dv = new cls_dich_vu();
                                        $result = $dv->hien_dv();
                                        if (!empty($result)) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <li><a href="./chi_tiet.php?id_dv=<?php echo $row['id_dv'] ?>"><?php echo $row['ten_dv'] ?></a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Side widget-->
                        <div class="card mb-4">
                            <div class="card-header">Side Widget</div>
                            <div class="card-body">
                                <div class="main">
                                    <div class="container">
                                        <div class="left1">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863855881391!2d105.74459841415757!3d21.038132792835867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1636827771188!5m2!1svi!2s" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                                        <div class="right1">
                                            <p>THONG TIN LIEN HE: <br>
                                                Gmail: nohairbarbershop@gmail.com<br>
                                                Hotline: 0967 789 999<br>
                                                Dia chi: so 8, Trinh Van Bo, Nam Tu Liem, Ha Noi. </p>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="left">
                                            <img src="true.png" alt="">
                                        </div>
                                        <div class="right">
                                            <textarea name="" id="" cols="30" rows="3" placeholder="Moi ban dang nhap de danh gia"></textarea><br>
                                            <button>Gui</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>


    <?php include_once __DIR__ . "/layout2.php" ?>