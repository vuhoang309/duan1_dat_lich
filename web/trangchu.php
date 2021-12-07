  <?php include "./layout.php";
    include_once __DIR__ . "/../class/cls_kieu_toc.php";
    include_once __DIR__ . "/../class/cls_tai_khoan.php";
    include_once __DIR__ . "/../class/cls_dich_vu.php";
    $home = new cls_kieu_toc();
    ?>

  <style>
      .wapper {
          width: 3000px;
      }

      main {
          width: 1300px;
          margin: 0px auto;
      }

      main .banner {
          width: 1300px;
          margin-top: 20px;
          margin: 0px auto;
      }

      main .banner img {
          width: 1300px;
          height: 500px;
          margin: 0 auto;
      }



      .kieutoc_nu .post-slider .post-wrapper .post .slider-image {
          width: 100%;
          height: 280px;
          border-top-left-radius: 5px;
          border-top-right-radius: 5px;
      }


      /**** slide */
      .post-slider {
          position: relative;
      }
      
   /*** div_3 */
     .div_3 .post-slider .slider-title {
          text-align: center;
          margin: 0px auto;
      }


     .div_3 .post-slider .post-wrapper {
          width: 84%;
          height: 500px;
          margin: 0px auto;
          padding: 10px 0px 10px 0px;
      }

      .div_3 .post-slider .post-wrapper .post {
          width: 400px;
          height: 400px !important;
          margin: 0px 10px;
          display: inline-block;
          background: white;
          border-radius: 5px;
          box-shadow: 1rem 1rem 1rem 1rem #a0a0a033;
      }

      .post-slider .post-wrapper .post .post-info {
          height: 130px;
          padding: 0px 5px;
      }

      .post-slider .post-wrapper .post .slider-image {
          width: 100%;
          height: 250px;
          border-top-left-radius: 5px;
          border-top-right-radius: 5px;
      }

      .slider-image {
          width: 40%;
          height: 100%;
          float: left;
          border-top-left-radius: 10px;
          border-bottom-left-radius: 10px;
      }

     .div_3 .post .post-info button {
          align-items: flex-start;
          background-color: hsl(0 0% 0%);
          border-color: hsl(0 0% 0%);
          border-radius: 32px;
          border-style: solid;
          border-width: 1.06667px;
          box-shadow: hsl(0 0% 0% / 0.02) 0px 2px 0px 0px;
          color: hsl(0 0% 100%);
          font-weight: 300px;
          line-height: 25.144px;
          margin: 0px 8px 8px;
          padding: 10px;
          margin-left: 110px;

      } 

      .div_3 h4{
          text-align: left;
      }
   /**** end div_3 */
      .post-slider .slider-title {
          text-align: center;
          margin: 30px auto;
      }

      .post-slider .next {
          position: absolute;
          top: 50%;
          right: 10px;
          font-size: 2em;
          color: #006669;
          cursor: pointer;
      }

      .post-slider .prev {
          position: absolute;
          top: 50%;
          left: 30px;
          font-size: 2em;
          color: #006669;
          cursor: pointer;
      }

      .post-slider .post-wrapper {
          width: 84%;
          height: 350px;
          margin: 0px auto;
          overflow: hidden;
          padding: 10px 0px 10px 0px;
      }

      .post-slider .post-wrapper .post {
          width: 300px;
          height: 330px;
          margin: 0px 10px;
          display: inline-block;
          background: white;
          border-radius: 5px;
          box-shadow: 1rem 1rem 1rem -1rem #a0a0a033;
      }

      .post-slider .post-wrapper .post .post-info {
          height: 130px;
          padding: 0px 5px;
      }

      .post-slider .post-wrapper .post .slider-image {
          width: 100%;
          height: 250px;
          border-top-left-radius: 5px;
          border-top-right-radius: 5px;
      }

      .slider-image {
          width: 40%;
          height: 100%;
          float: left;
          border-top-left-radius: 10px;
          border-bottom-left-radius: 10px;
      }

      .post .post-info button {
          align-items: flex-start;
          background-color: hsl(0 0% 0%);
          border-color: hsl(0 0% 0%);
          border-radius: 32px;
          border-style: solid;
          border-width: 1.06667px;
          box-shadow: hsl(0 0% 0% / 0.02) 0px 2px 0px 0px;
          color: hsl(0 0% 100%);
          font-weight: 300px;
          line-height: 25.144px;
          margin: 0px 8px 8px;
          padding: 10px;
          /* margin-left: 110px; */

      }

      h4 a {
          text-decoration: none;
          color: black;
      }

      .post .post-info button a {
          text-decoration: none;
          color: #fff;
      }

      .post .post-info a:hover {
          color: red;
      }

      /*** combo */

      .layout-service {
          background-color: hsl(0 0% 100%);
          color: hsl(0 0% 7%);
          font-weight: 300;
          line-height: 25.144px;
          margin: 0px auto;
          margin-top: 50px;
      }

      .container {
          color: hsl(0 0% 7%);
          font-weight: 300;
          line-height: 25.144px;
          margin: 0px 39px;
          padding: 0px 15px
      }

      .container a {
          text-decoration: none;
      }

      .layout__head {
          align-items: center;
          color: hsl(207 100% 62%);
          display: flex;
          font-weight: 300;
          justify-content: space-between;
          line-height: 25.144px;
          padding: 0px 0px 20px;
      }

      .head__title {
          font-size: 30px;
          color: black;
          line-height: 10px;
          font-weight: 300px;
      }

      .list__item {
          align-items: center;
          color: hsl(207 100% 63%);
          display: flex !important;
          flex-wrap: wrap !important;
          column-gap: 10px;
          font-weight: 300;
          line-height: 25.144px;
          padding: 12px 0px;
      }

      .layout__list .ant-row {
          display: flex !important;
          flex-wrap: wrap !important;
      }

      .item__title {
          color: hsl(0 0% 7%);
          display: -webkit-box;
          font-size: 18px;
          font-weight: 600;
          line-height: 28.287px;
      }

      .home__form-input {
          width: 500px;
          background-color: white;
          border-radius: 8px;
          border: 1px solid black;
          color: #111111;
          font-weight: 300;
          line-height: 25.144px;
          margin: 0px auto;
          padding: 15px 20px;
      }

      .home__form-input .form-input__form {
          display: flex;
          flex-wrap: wrap;
          column-gap: 20px;
          font-weight: 300;
          line-height: 25px;
          margin-top: 20px;
      }

      /* .home__form-input .form-input__form .my-input {
          background-color: hsl(0 0% 100%);
          border-color: hsl(0 0% 0% / 0);
          border-radius: 6px;
          border-style: solid;
          border-width: 1.06667px;
          color: hsl(0 0% 7%);
          display: inline-block;
          font-size: 20px;
          font-weight: 600;
          line-height: 31.43px;
          padding: 0px 0px 0px 15px;
      } */

      .home__form-input  .btn-booking {
          align-items: center;
          background-color: white;
          border-radius: 6px;
          display: flex;
          font-size: 22px;
          font-weight: 600;
          justify-content: center;
          line-height: 31.43px;
          padding: 0px 12px;
          margin-left: 150px;
      }

      .form-input__slogan {
          line-height: 40px;
          text-align: center;
      }

      .slogan__title {
          color: black;
          font-size: 28px;
          font-weight: 300;
          text-transform: uppercase;
      }

      .slogan__text {
          color: black;
          font-size: 18px;
          font-weight: 200;
      } 

      .banne_2{
          width: 1100px;
          margin: 0 auto;
          margin-top: 10px;
          margin-bottom: 20px;
      } 
      .banne_2 img{
          width: 100%;

      }
  </style>



  <div class="wrapper">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" style=" width: 1200px; margin: 0px auto;" >
              <div class="carousel-item active">
                  <img class="d-block w-100" style="width:1200px !important ;" src="../img/banne.1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" style="width:1200px !important ;" src="../img/banner_head.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" style="width:1200px !important ;" src="../img/BANNER_POST.png" alt="Third slide">
              </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true">hi</span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>

      <main>

          
          <div class="div_2" :>
              <div class="layout layout-service">
                  <div class="container">
                      <a href="/dich-vu-khac" rel="noreferrer">
                          <!-- <div class="layout__head">
                              <div>
                                  <div class="head__title">Trải nghiệm dịch vụ</div>
                              </div>
                          </div> -->
                      </a>
                      <div class="layout__banner hover">
                       
                              <div class="media">
                                  <div class="home__form-input" data-metatip="true">
                                      <div class="form-input__slogan">
                                          <div class="slogan__title">Đặt lịch Nhanh Chóng</div>
                                          <div class="slogan__text">Cắt xong trả tiền, hủy lịch không sao</div>
                                      </div>
                                      
                                              <button type="submit" class="btn-booking"> <a href="./dat_lich.php">ĐẶT LỊCH NGAY</a></button>
                                       
                                  </div>
                              </div>
                     
                      </div>

                      <!-- <div class="layout__list">
                          <div class="ant-row" style="margin-left: -15px; margin-right: -15px;">
                              <div class="ant-col " style="padding-left: 15px; padding-right: 15px;">
                                  <a href="/dich-vu-khac#shine-combo,combo-khac" rel="noreferrer">
                                      <div class="list__item pointer border-none list__item-hover">
                                          <div class="item__media"><img src="https://storage.30shine.com/ResourceWeb/data/images/newHome/service/30shine-cat-goi-massage-2.jpg" alt=""></div>
                                          <div class="item__content">
                                              <div class="item__title">Cắt gội massage</div>
                                              <div class="item__subTitle">Bảng giá 2021 (hấp dẫn)</div>
                                          </div>
                                      </div>
                                  </a>
                              </div>

                          </div>
                      </div> -->
                  </div>
              </div>

          </div>

          <hr>
          <!-- dịch vụ -->
          <div class="div_3">

              <div class="main">
                  <div class="post-slider">
                      <h3 class="slider-title">Dịch Vụ Nội Bật</h3>
                     

                      <div class="post-wrapper">
                          <?php
                            $dv = new cls_dich_vu();

                            $result = $dv->hien_dv();
                            if (!empty($result)) {
                                while ($row = $result->fetch_assoc()) {

                            ?>
                                  <div class="post">
                                      <img src="../img/<?php echo $row['anh1'] ?>" alt="" class="slider-image">
                                      <div class="post-info">
                                          <h4>Dịch vụ:<a href="./chi_tiet.php?id_dv=<?php echo $row['id_dv'] ?>"><?php echo $row['ten_dv'] ?></a></h4>
                                          <h4>Giá:<a> <?php echo $row ['gia_dv'].".000" ?> </a></h4>
                                          <!-- <button><a href=""></a></button> -->
                                      </div>
                                  </div>
                          <?php

                                }
                            }
                            ?>
                      </div>
                  </div>
              </div>
          </div>
          <!-- blog -->
          
          <div class="div_4">
              <h2></h2>

              <div class="main">
                  <div class="post-slider">
                      <h2 class="slider-title">NO-HARI BARBER SHOP</h2>
                      <!-- <i class="fas fa-chevron-left prev"></i>
                      <i class="fas fa-chevron-right next"></i> -->

                      <div class="post-wrapper">
                          <?php
                            $result = $home->hien_bv();
                            if (!empty($result)) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                  <div class="post">
                                      <img src="../img/<?php echo $row['anh_bv'] ?>" alt="" class="slider-image">
                                      <div class="post-info">
                                          <h4><a href=""><?php echo $row['ten_bv'] ?> </a></h4>
                                      </div>
                                  </div>
                          <?php
                                }
                            }
                            ?>
                      </div>
                  </div>
              </div>
              <div class="blog_thong_tin">

              </div>
          </div>
             <div class="banne_2">
                 <img src="../img/banne.1.jpg" alt="">
             </div>
          <div class="div_5">


              <div class="kieutoc_thong_tin">
                  <div class="main">
                      <div class="post-slider">
                          <h2 class="slider-title">Tóc Nam</h2>
                          <!-- <i class="fas fa-chevron-left prev"></i>
                          <i class="fas fa-chevron-right next"></i> -->

                          <div class="post-wrapper">

                              <?php
                                $result = $home->show_kt();
                                if (!empty($result)) {
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row['phan_loai'] == "man") {
                                ?>
                                          <div class="post">
                                              <img src="../img/<?php echo $row['anh_kt'] ?>" alt="" class="slider-image">
                                              <div class="post-info">
                                                  <h4><a href="./kieu_toc.php"><?php echo $row['ten_kt'] ?> </a></h4>
                                              </div>
                                          </div>
                              <?php
                                        }
                                    }
                                }
                                ?>

                          </div>
                      </div>
                  </div>
              </div>

              <!-- tóc  Nữ -->
              <div class="kieutoc_nu">
                  <div class="main">
                      <div class="post-slider">
                          <h2 class="slider-title">Tóc Nữ</h2>
                          <div class="post-wrapper">

                              <?php
                                $result = $home->show_kt();
                                if (!empty($result)) {
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row['phan_loai'] == "women") {
                                ?>
                                          <div class="post">
                                              <img src="../img/<?php echo $row['anh_kt'] ?>" alt="" class="slider-image">
                                              <div class="post-info">
                                                  <h4><a href="./kieu_toc.php"><?php echo $row['ten_kt'] ?> </a></h4>
                                              </div>
                                          </div>
                              <?php
                                        }
                                    }
                                }
                                ?>

                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </main>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="../style/scripts.js"></script>
  <?php include "./layout2.php" ?>