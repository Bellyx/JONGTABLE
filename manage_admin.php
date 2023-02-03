<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$allAdmin = getAllAdmin();
if (isset($_GET['delete'])) {
  deleteAdmin($_GET['delete']);
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
            <h1 class="text-center" style="color:white;">จัดการ Admin</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 py-12">
          <a href="edit_admin.php" class="btn btn-success" style="float:right;"> เพิ่ม</a><br/><br/>
          <table class="table">
            <thead>
              <tr>
                <td>Username</td>
                <td>ชื่อ-นามสกุล</td>
                <td>หมายเลขโทรศัพท์</td>
                <td>อีเมล</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php if(empty($allAdmin)){ ?>
                <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
              <?php }else{?>
                <?php $i=1;?>
                <?php foreach($allAdmin as $data){ ?>
                  <tr>
                    <td><?php echo $data["username"];?></td>
                    <td><?php echo $data["firstname"];?> <?php echo $data["lastname"];?></td>
                    <td><?php echo $data["telephone"];?></td>
                    <td><?php echo $data["email"];?></td>

                    <td style="text-align:right;">
                      <a href="detail_admin.php?id=<?php echo $data['id'];?>" class="btn btn-info">รายละเอียด</a>
                      <a href="edit_admin.php?id=<?php echo $data['id'];?>" class="btn btn-warning">แก้ไข</a>
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