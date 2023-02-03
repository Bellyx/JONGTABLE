<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$allStore = getAllStore();
if (isset($_GET['delete'])) {
  deleteStore($_GET['delete']);
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
            <h1 class="text-center" style="color:white;">จัดการข้อมูลร้าน</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 py-12">
          <a href="edit_store.php" class="btn btn-success" style="float:right;"> เพิ่มร้าน</a><br/><br/>
          <table class="table">
            <thead>
              <tr>
                <td></td>
                <td>ชื่อร้าน</td>
                <td>โทรศัพท์</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php if(empty($allStore)){ ?>
                <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
              <?php }else{?>
                <?php $i=1;?>
                <?php foreach($allStore as $data){ ?>
                  <tr>
                    <td><img src="images/store/<?php echo $data["store_image"];?>" style="width:75px;height:75px;"></td>
                    <td><?php echo $data["store_name"];?></td>
                    <td><?php echo $data["store_phone"];?></td>
                    <td style="text-align:right;">
                      <a href="edit_store.php?id=<?php echo $data['id'];?>" class="btn btn-warning">แก้ไข</a>
                      <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>