<?php include "./layout.php" ?>
<?php require __DIR__ . "/../class/cls_dich_vu.php" ?>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    main {
        margin: 0 auto;
        width: 90rem;
    }

    .row {
        background: rgb(194, 193, 193);
        width: 1000px;
        height: auto;
        margin: 0 auto;
        background: #FFFFFF;
        border-radius: 10px;
        box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.25);
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .btn {

        display: flex;
        flex-wrap: wrap;
        column-gap: 20px;
    }

    .btn button {
        align-items: flex-start;
        background-color: #57523E;
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

    #man {
        margin-left: 1rem;
        width: 30rem;
    }

  

    .kieutoc {
        display: grid;
        grid-template-columns: 200px 400px;
        column-gap: 4rem;
        margin: 1%;
    }

    .kieutoc img {
        height: 176px;
        width: 178px;
        border-radius: 10px;
        box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.25);
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .kieutoc .chitiet {
        border-radius: 10px;
        margin-top: 10px; 
        
        margin-bottom: 20px;
    } 
    .btn button a{
        color: white;
        text-decoration: none;
    }
</style>
<main>
    <div class="row">
        <!-- button -->

        <?php $kt = new cls_dich_vu(); ?>


        <div id="man">
            <?php
            $result = $kt->hien_dv();
            if (!empty($result)) {
                while ($row = $result->fetch_assoc()) {

            ?>

                    <div class="kieutoc">
                        <div class="img">
                            <img src="../img/<?php echo $row['anh1'] ?>" alt="">
                        </div>

                        <div class="chitiet">
                            <h3 ><?php echo $row['ten_dv'] ?></h3>
                            <h4>
                                <?php
                                echo $row['gia_dv'] . ".000";
                                ?>
                            </h4><low class="text-success"><?php if($row['giam_gia']>0){ echo"(".$row['giam_gia']."%off".")"; } ?> </low>
                            <div class="btn">
                                <button class="btn_a"><a href="./chi_tiet.php?id_dv=<?php echo $row['id_dv'] ?>">Chi Tiết</a></button>
                            </div>
                        </div>
                    </div>

            <?php

                }
            }
            ?>
        </div>





    </div>



</main>

<!-- 
<script>
    function kieutocnam() {
        var x = document.getElementById('man');
        var y = document.getElementById('women')

        if (x.style.display === 'none') {
            x.style.display = 'block';
            y.style.display = 'none';
        } else {
            x.style.display = 'none';
        }
    }

    function kieutocnu() {
        var x = document.getElementById('man');
        var y = document.getElementById('women')

        if (y.style.display === 'none') {
            y.style.display = 'block';
            x.style.display = 'none';
        } else {
            y.style.display = 'none';
        }
    }
</script> -->
<?php include "./layout2.php" ?>