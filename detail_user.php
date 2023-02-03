<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$currentUser = getCurrentUser($_GET["id"]);

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
          <h2 class="title-section">ข้อมูล User</h2>
          <div class="divider"></div>

          <form name="regis" id="regis" action="" method="post" class="contact-form py-12 px-lg-12" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?php echo $currentUser['id'];?>">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username : <?php echo $currentUser['username'];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ-นามสกุล : <?php echo $currentUser['firstname'];?> <?php echo $currentUser['lastname'];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">หมายเลขโทรศัพท์ : <?php echo $currentUser['telephone'];?></label>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">อีเมล : <?php echo $currentUser['email'];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">รูปบัตรประจำตัวประชาชน  : <a href="images/user/<?php echo $currentUser['user_citizen'];?>" target="_blank">ดูข้อมูล</a></label>
              </div>
            </div>

          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <?php if($currentUser['user_profile'] == ""){ ?>
              <img src="assets/img/user_ico.png" alt="" class="img-fluid">
            <?php }else{ ?>
              <img src="images/user/<?php echo $currentUser['user_profile'];?>" alt="" class="img-fluid">
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