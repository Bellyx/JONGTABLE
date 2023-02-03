<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$allBooking = getAllBooking();
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
            <h1 class="text-center" style="color:white;">ประวัติการจองทั้งหมด</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 py-12">
          <table class="table">
            <thead>
              <tr>
                <td></td>
                <td>ร้าน</td>
                <td>ติดต่อร้าน</td>
                <td>วันที่</td>
                <td>เวลาที่รับ</td>
               
                <td>สถานะ</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php if(empty($allBooking)){ ?>
                <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
              <?php }else{?>
                <?php $i=1;?>
                <?php foreach($allBooking as $data){ ?>
                  <tr>
                    <td><img src="images/store/<?php echo $data["store_image"];?>" style="width:75px;height:75px;"></td>
                    <td><?php echo $data["store_name"];?></td>
                    <td><?php echo $data["store_phone"];?></td>
                    <td><?php echo formatDateFull($data["receive_date"]);?></td>
                    <td><?php echo substr($data["receive_time"], 0,5);?></td>
                    <td><?php echo $booking_map[$data["booking_status"]];?></td>
                    <td style="text-align:right;">
                      <a href="detail_booking.php?id=<?php echo $data['id'];?>" class="btn btn-info">รายละเอียด</a>
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