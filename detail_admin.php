<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$currentAdmin = getCurrentAdmin($_GET["id"]);
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
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <h1 class="text-center" style="color:white;">รายละเอียด</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <h2 class="title-section">ข้อมูลผู้ดูแลระบบ</h2>
          <div class="divider"></div>
          <form action="" method="post" class="contact-form py-12 px-lg-12" enctype="multipart/form-data">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username : <?php echo $currentAdmin['username'];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ-นามสกุล : <?php echo $currentAdmin['firstname'];?> <?php echo $currentAdmin['lastname'];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">หมายเลขโทรศัพท์ : <?php echo $currentAdmin['telephone'];?></label>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">อีเมล : <?php echo $currentAdmin['email'];?></label>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <?php if($currentAdmin['admin_profile'] == ""){ ?>
              <img src="assets/img/admin_ico.png" alt="" class="img-fluid">
            <?php }else{ ?>
              <img src="images/admin/<?php echo $currentAdmin['admin_profile'];?>" alt="" class="img-fluid">
            <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>