<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$historyBookingDetail = getHistoryBookingDetail($_GET["id"]);
$currentChair = getCurrentChair($historyBookingDetail["chairs_id"]);

if(isset($_POST["success"])){
  completeBooking($_POST["booking_id"]);
}

if(isset($_POST["cancel"])){
  cancelBookingTaker($_POST["booking_id"]);
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
            <h1 class="text-center" style="color:white;">ข้อมูลการจองโต๊ะ</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6 py-3">
          <h2 class="title-section">ข้อมูล ร้าน</h2>
          <div class="divider"></div>
          <form name="register_form" action="" method="post" >
            <input type="hidden" id="store_id" name="booking_id" class="form-control" value="<?php echo $_GET["id"];?>">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อร้าน : <?php echo $historyBookingDetail["store_name"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">โทรศัพท์ร้าน : <?php echo $historyBookingDetail["store_phone"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">รายละเอียด : <?php echo $historyBookingDetail["store_detail"];?></label>
              </div>
            </div>
            <h2 class="title-section">ข้อมูล ผู้จอง</h2>
            <div class="divider"></div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ-นามสกุล : <?php echo $historyBookingDetail["firstname"];?> <?php echo $historyBookingDetail["lastname"];?></label>
                <input type="hidden" id="users_id" name="users_id" class="form-control" value="<?php echo $_SESSION['id'];?>" >
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">เบอร์โทรศัพท์ : <?php echo $historyBookingDetail["telephone"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">อีเมล : <?php echo $historyBookingDetail["email"];?></label>
              </div>
            </div>


            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="fname">ประเภทโต๊ะ : <?php echo $currentChair["chair_type"];?></label>
              </div>
            </div>

           
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">วันเวลารับโต๊ะ : <?php echo formatDateFull($historyBookingDetail["receive_date"]);?> | <?php echo substr($historyBookingDetail["receive_time"],0,5);?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">สถานะ : <?php echo $booking_map[$historyBookingDetail["booking_status"]];?></label>
              </div>
            </div>
            <div class="row form-group mt-4">
              <div class="col-md-12">
                <?php if($historyBookingDetail["booking_status"] == 2){ ?>
                  <input type="submit" name="success" value="ส่งมอบ" class="btn btn-success">
                  <input type="submit" name="cancel" value="ยกเลิก" class="btn btn-warning">
                <?php } ?>
                <input type="button" name="button" onClick="javascript:history.go(-1)" class="btn btn-danger" value="ย้อนกลับ">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="images/store/<?php echo $historyBookingDetail["store_image"];?>" alt="" class="img-fluid">
          </div>
        </div>

        <?php if($historyBookingDetail["booking_status"] != 1 || $historyBookingDetail["booking_status"] != 0){ ?>
          <?php $currentTaker = getCurrentTaker($historyBookingDetail["takers_id"]); ?>
          <div class="col-lg-6 py-3">
            <h2 class="title-section">ข้อมูล Taker ที่รับงาน</h2>
            <div class="divider"></div>

            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ-นามสกุล : <?php echo $currentTaker['firstname'];?> <?php echo $currentTaker['lastname'];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="fname">หมายเลขโทรศัพท์ : <?php echo $currentTaker['telephone'];?></label>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="lname">อีเมล : <?php echo $currentTaker['email'];?></label>
              </div>
            </div>
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-fluid py-3 text-center">
              <?php if($currentTaker['taker_profile'] == ""){ ?>
                <img src="assets/img/taker_ico.png" alt="" class="img-fluid">
              <?php }else{ ?>
                <img src="images/taker/<?php echo $currentTaker['taker_profile'];?>" alt="" class="img-fluid">
              <?php } ?>
            </div>
          </div>
        <?php } ?>



      </div>
    </div>
  </div>


  <script>

    function loadSelectTableData(num){
      $('#table_number').val(num);
    }
  </script>

  <script>

    $('#receive_time').datetimepicker({
      lang:'th',
      datepicker:false,
      format:'H:i',
      enabledHours: '10'

    });
  </script>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>