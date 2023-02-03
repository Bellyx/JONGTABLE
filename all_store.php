<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
$allStore = getAllStore();
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
        <h2 class="title-section">ข้อมูลร้าน ทั้งหมด</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
        <?php if(empty($allStore)){ ?>
          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
        <?php }else{?>
          <?php $i=1;?>
          <?php foreach($allStore as $data){ ?>

            <div class="col-lg-3 py-3">
              <form method="post" action="best_sale.php">
                <div class="card-blog">
                  <img src="images/store/<?php echo $data["store_image"];?>" alt="" class="img-fluid" style="width:255px;height:255px;">
                  <div class="body">
                    <h5 class="post-title"><a href="booking_store.php?id=<?php echo $data["id"];?>"><?php echo $data["store_name"];
                    ?></a></h5>
                    <label class="text-black" for="fname">ติดต่อร้าน : <?php echo $data["store_phone"];?> </label>
                    <a href="booking_store.php?id=<?php echo $data["id"];?>" class="btn btn-info" style="float:right;">จองโต๊ะ</a>

                  </div>
                </div>
              </form>
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