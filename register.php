<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
  $checkUserRegister = getCheckUserRegister($_POST["username"]);
  if($checkUserTaker["numUser"] == 0){
    saveRegisterUser($_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["telephone"],$_POST["email"],$_FILES["user_citizen"]["name"],$_FILES["user_profile"]["name"]);
  }else{
    echo '<script>alert("Username นี้มีผู้ใช้งานแล้ว กรุณาลองใหม่อีกครั้ง")</script>';  
    echo '<script>window.history.go(-1)</script>';
  }
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
            <h1 class="text-center" style="color:white;">สมัครสมาชิก User</h1>
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
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username</label>
                <input type="text" id="fname" name="username" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Password</label>
                <input type="password" id="lname" name="password" class="form-control" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ</label>
                <input type="text" id="fname" name="firstname" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">นามสกุล</label>
                <input type="text" id="lname" name="lastname" class="form-control" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">หมายเลขโทรศัพท์</label>
                <input type="tel" id="fname" name="telephone" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">อีเมล</label>
                <input type="email" id="lname" name="email" class="form-control" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">รูปบัตรประจำตัวประชาชน</label>
                <input type="file" class="form-control" id="user_citizen" name="user_citizen" required>
              </div>
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">รูปโปรไฟล์</label>
                <input type="file" class="form-control" id="user_profile" name="user_profile" required>
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="สมัครสมาชิก" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/user_ico.png" alt="">
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