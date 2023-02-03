<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
  saveRegister($_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["telephone"],$_POST["email"],$_POST["address"]);
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
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <h1 class="text-center" style="color:white;">สมัครสมาชิก</h1>
          </div>
        </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <a href="register.php">
              <img src="assets/img/user_ico.png" alt="" class="img-fluid">
            </a>
            <a href="register.php" class="btn btn-success">สมัครสมาชิก User</a>
          </div>
        </div>

        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <a href="register_taker.php">
              <img src="assets/img/taker_ico.png" alt="" class="img-fluid">
            </a>
            <a href="register_taker.php" class="btn btn-info">สมัครสมาชิก Taker</a>
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