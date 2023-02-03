<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["login"])){
  checkLogin($_POST["username"],$_POST["password"]);
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
            <h1 class="text-center" style="color:white;">เข้าสู่ระบบ</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <h2 class="title-section">Login</h2>
          <div class="divider"></div>
          <form name="register_form" action="" method="post" >
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">Username</label>
                <input type="text" id="fname" name="username" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">Password</label>
                <input type="password" id="lname" name="password" class="form-control">
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="login" value="เข้าสู่ระบบ" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/login.png" alt="">
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