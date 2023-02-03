<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
if($_SESSION['status'] == 2){
  $allStoreRandom = getAllStoreTaker();
}else{
  $allStoreRandom = getAllStoreRandom();
}

?>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php
    require_once("nav.php");
    ?>

    <div class="container">  

      <div class="page-banner">
       
        <div class="row align-items-center flex-wrap-reverse h-100 ">
          <div class="col-md-6 py-5 wow fadeInRight">
            <h1 class="mb-4 text-white">ยินดีต้อนรับสู่ RAFF JONG</h1>
            <p class="text-lg text-white mb-5">สามารถจองโต๊ะจากร้านที่คุณชื่นชอบได้ทุกที่ ทุกเวลา!</p>
            <p class="text-lg text-white mb-5">หากมีข้อสงสัยเกี่ยวกับการจองหรืออื่นๆ สามารถสอบถามแอดมินได้เลย</p>
          </div>
        </div>
        <!------------------------------------------------------------------------------------
          <div class="col-md-3 py-5 wow zoomIn">
            <div class="img-fluid text-center">
              <img src="assets/img/RJ.jpg" width="300"  height="250">
            </div>
          </div>

         --------------------------------------------------------------------------------------->

        </div>
      </div>

  </header>

  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <h2 class="title-section">ร้าน</h2>
        <div class="divider mx-auto"></div>
      </div>

      <div class="row mt-5">

        <?php if(empty($allStoreRandom)){ ?>
          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
        <?php }else{?>
          <?php $i=1;?>
          <?php foreach($allStoreRandom as $dataSto){ ?>
            <div class="col-lg-4 py-3">
              <div class="card-blog">
                <div class="header">

                  <div class="post-thumb" style="text-align:center;">
                    <img src="images/store/<?php echo $dataSto["store_image"];?>" alt="" style="width:300px;height:250px;">
                  </div>
                </div>
                <div class="body">
                  <h5 class="post-title"><?php echo $dataSto["store_name"];?></h5>
                  <label class="text-black" for="fname">ติดต่อร้าน : <?php echo $dataSto["store_phone"];?>
                 </label>
                  <br/>
                  <?php if($_SESSION["id"] != "" && !empty($_SESSION["id"])){ ?>
                    <a href="booking_store.php?id=<?php echo $dataSto["id"];?>
                    " class="btn btn-info" style="float:right;">จองโต๊ะ</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>



      </div>
    </div>
  </div>

 


  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>