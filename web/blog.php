 <?php include_once __DIR__ . "/../web/layout.php";
  include_once __DIR__ . "/../class/cls_kieu_toc.php"; ?>
 <header>
   <!-- Intro settings -->
   <style>
     #intro {
       /* Margin to fix overlapping fixed navbar */
       margin-top: 58px;
     }

     @media (max-width: 991px) {
       #intro {
         /* Margin to fix overlapping fixed navbar */
         margin-top: 45px;
       }
     } 

      .img-fluid{
       height: 400px;
     }
   </style>


 </header>
 <!--Main Navigation-->

 <!--Main layout-->
 <main class="my-5">
   <div class="container">
     <!--Section: Content-->
     <section class="text-center">
       <h4 class="mb-5"><strong>Latest posts</strong></h4>

       <div class="row">

         <?php
          $blog = new cls_kieu_toc();
            $bv = $blog->hien_bv();
          if (!empty($bv)) {
            while ($row = $bv->fetch_assoc()) {
          ?>
           
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="../img/<?php echo $row['anh_bv'] ?>" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['ten_bv'] ?></h5>
                <!-- <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p> -->
                <a href="./chi_tiet_blog.php?id_bv=<?php echo $row['id'] ?>" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div> 
         <?php
            }
          }
          ?>
       </div>
<!-- 
       <div class="row">
         <div class="col-lg-4 col-md-12 mb-4">
           <div class="card">
             <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
               <img src="https://mdbootstrap.com/img/new/standard/nature/002.jpg" class="img-fluid" />
               <a href="#!">
                 <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
               </a>
             </div>
             <div class="card-body">
               <h5 class="card-title">Post title</h5>
               <p class="card-text">
                 Some quick example text to build on the card title and make up the bulk of the
                 card's content.
               </p>
               <a href="#!" class="btn btn-primary">Read</a>
             </div>
           </div>
         </div>

         <div class="col-lg-4 col-md-6 mb-4">
           <div class="card">
             <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
               <img src="https://mdbootstrap.com/img/new/standard/nature/022.jpg" class="img-fluid" />
               <a href="#!">
                 <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
               </a>
             </div>
             <div class="card-body">
               <h5 class="card-title">Post title</h5>
               <p class="card-text">
                 Some quick example text to build on the card title and make up the bulk of the
                 card's content.
               </p>
               <a href="#!" class="btn btn-primary">Read</a>
             </div>
           </div>
         </div>

         <div class="col-lg-4 col-md-6 mb-4">
           <div class="card">
             <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
               <img src="https://mdbootstrap.com/img/new/standard/nature/035.jpg" class="img-fluid" />
               <a href="#!">
                 <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
               </a>
             </div>
             <div class="card-body">
               <h5 class="card-title">Post title</h5>
               <p class="card-text">
                 Some quick example text to build on the card title and make up the bulk of the
                 card's content.
               </p>
               <a href="#!" class="btn btn-primary">Read</a>
             </div>
           </div>
         </div>
       </div> -->
     </section>
     <!--Section: Content-->

     <!-- Pagination
     <nav class="my-4" aria-label="...">
       <ul class="pagination pagination-circle justify-content-center">
         <li class="page-item">
           <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
         </li>
         <li class="page-item"><a class="page-link" href="#">1</a></li>
         <li class="page-item active" aria-current="page">
           <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
         </li>
         <li class="page-item"><a class="page-link" href="#">3</a></li>
         <li class="page-item">
           <a class="page-link" href="#">Next</a>
         </li>
       </ul>
     </nav> -->
   </div>
 </main>
 <!--Main layout-->

 <?php include_once __DIR__ . "/../web/layout2.php"; ?>