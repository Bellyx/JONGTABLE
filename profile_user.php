<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$currentUser = getCurrentUser($_SESSION["id"]);
if(isset($_POST["submit"])){
  editProfileUser($_POST["id"],$_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["telephone"],$_POST["email"],$_FILES["user_profile"]["name"]);
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
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <h1 class="text-center" style="color:white;">ข้อมูลส่วนตัว</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <h2 class="title-section">Profile</h2>
          <div class="divider"></div>

          <form name="regis" id="regis" action="" method="post" class="contact-form py-12 px-lg-12" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?php echo $currentUser['id'];?>">
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username</label>
                <input type="text" id="fname" name="username" class="form-control" value="<?php echo $currentUser['username'];?>" readonly>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Password</label>
                <input type="password" id="lname" name="password" class="form-control" value="<?php echo $currentUser['password'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ</label>
                <input type="text" id="fname" name="firstname" class="form-control" value="<?php echo $currentUser['firstname'];?>" readonly>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">นามสกุล</label>
                <input type="text" id="lname" name="lastname" class="form-control" value="<?php echo $currentUser['lastname'];?>" readonly>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">หมายเลขโทรศัพท์</label>
                <input type="text" id="fname" name="telephone" class="form-control" value="<?php echo $currentUser['telephone'];?>" readonly>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">อีเมล</label>
                <input type="email" id="lname" name="email" class="form-control" value="<?php echo $currentUser['email'];?>" readonly>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">รูปโปรไฟล์ (ขนาดภาพไม่เกิน 10 MB)</label>
                <input type="file" class="form-control" id="user_profile" name="user_profile" >
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <?php if($currentUser['user_profile'] == ""){ ?>
              <img src="assets/img/user_ico.png" alt="" class="img-fluid">
            <?php }else{ ?>
              <img src="images/user/<?php echo $currentUser['user_profile'];?>" alt="" class="img-fluid" style="width:300px;height:300px;">
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    document.forms[0].addEventListener('submit', function( evt ) {
      var file = document.getElementById('user_profile').files[0];
      // ปรับลดขนาดภาพ
      if(file && file.size < 10485760) {  
      } else {
        alert("ไฟล์ภาพใหญ่เกินไป"); 
        evt.preventDefault();
      }
    }, false);
  </script>

  
  <?php
  require_once("footer.php");
  ?>



</body>
</html>