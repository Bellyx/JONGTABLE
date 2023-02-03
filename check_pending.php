<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
$allPending = getAllPending();
?>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php
    require_once("nav.php");
    ?>
  </header>

  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <h2 class="title-section">ออเดอร์การจองทั้งหมด</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
        <?php if(empty($allPending)){ ?>
          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
        <?php }else{?>
          <?php $i=1;?>
          <?php foreach($allPending as $data){ ?>
            <?php 
                                $dateNow = date("Y-m-d");
                                $arrDate3 = explode("-", $dateNow);
                                $arrDate3[0] = $arrDate3[0] + 543;
                                $convert_date_booking = $arrDate3[0].'-'.$arrDate3[1].'-'.$arrDate3[2];
                                $date1 = date_create($convert_date_booking);
                                $date2 = date_create($data["receive_date"]);
                                $diff = date_diff($date1,$date2);
                                $numDate = $diff->format("%R%a");
                                ?>
            <?php if($numDate >= 0){?>          
            <div class="col-lg-3 py-3">
              <form method="post" action="store.php">
                <div class="card-blog">
                  <img src="images/store/<?php echo $data["store_image"];?>" alt="" class="img-fluid" style="width:300px;height:250px;">
                  <div class="body">
                    <h5 class="post-title"><a href="detail_pending.php?id=<?php echo $data["id"];?>"><?php echo $data["store_name"];?></a></h5>
                    <label class="text-black" for="receive_date"> วันที่ : <?php echo $data["receive_date"];?> <br> เวลารับโต๊ะ : <?php echo $data["receive_time"];?> </label>
                    <a href="detail_pending.php?id=<?php echo $data["id"];?>" class="btn btn-info" style="float:right;">รายละเอียด</a>

                  </div>
                </div>
              </form>
            </div>
            <?php } ?>
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