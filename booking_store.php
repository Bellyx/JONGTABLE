<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$currentStore = getCurrentStore($_GET["id"]);
$currentUser = getCurrentUser($_SESSION["id"]);
$allChairInStore = getAllChairInStore($_GET["id"]);

$yThai = date("Y")+543;
$dateNow = date("d/m/").$yThai;

if(isset($_POST["submit"])){
  saveBooking($_POST["store_id"],$_POST["users_id"],$_POST["chairs_id"],$_POST["amount"],$_POST["receive_date"],$_POST["receive_time"]);
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
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
            <h1 class="text-center" style="color:white;">จองโต๊ะ <?php echo $currentStore["store_name"];?></h1>
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
            <input type="hidden" id="store_id" name="store_id" class="form-control" value="<?php echo $_GET["id"];?>">
            <input type="hidden" id="time_now" name="time_now" class="form-control" value="<?php echo date("H:i");?>">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อร้าน : <?php echo $currentStore["store_name"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">โทรศัพท์ร้าน : <?php echo $currentStore["store_phone"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">รายละเอียด : <?php echo $currentStore["store_detail"];?></label>
              </div>
            </div>
            <h2 class="title-section">ข้อมูล ผู้จอง</h2>
            <div class="divider"></div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อ-นามสกุล : <?php echo $currentUser["firstname"];?> <?php echo $currentUser["lastname"];?></label>
                <input type="hidden" id="users_id" name="users_id" class="form-control" value="<?php echo $_SESSION['id'];?>" >
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">เบอร์โทรศัพท์ : <?php echo $currentUser["telephone"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">อีเมล : <?php echo $currentUser["email"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">โต๊ะที่เลือก</label>
                <select name="chairs_id" class="form-control" id="chairs_id" >
                  <option value="">-- โปรดเลือก --</option>
                  <?php foreach($allChairInStore as $dataCh){ ?>
                    <?php $selected = "";
                    if($dataRe['chairs_id'] == $dataCh['id']){
                      $selected = " selected";

                    }
                    ?>
                    <option value="<?php echo $dataCh['id']?>" <?php echo $selected;?>><?php echo $dataCh['chair_type']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">วันที่จอง</label>
               
                <input type="text" id="receive_date" name="receive_date" class="form-control" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">เวลารับโต๊ะ</label>
                
                <input type="text" id="receive_time" name="receive_time" class="form-control" required>
              </div>
            </div>
            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="จองโต๊ะ" class="btn btn-primary" onclick="return Validate()">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="images/store/<?php echo $currentStore["store_image"];?>" alt="" class="img-fluid">
          </div>
          <h2 class="title-section">ข้อมูลโต๊ะ</h2>
          <div class="divider"></div>
          <div class="row">
            <div class="col-md-12" align="center">
              <table class="table">
                <thead>
                  <tr>
                    <td>ประเภทโต๊ะ</td>
                    <td>จำนวนโต๊ะที่เหลือ</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($allChairInStore)){ ?>
                    <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                  <?php }else{?>
                    <?php $i=1;?>
                    <?php foreach($allChairInStore as $dataChair){ ?>
                      <tr>
                        <td><?php echo $dataChair["chair_type"];?></td>
                        <td><?php echo $dataChair["chair_amount"];?></td>
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
    </div>
  </div>

  <script>

    function loadSelectTableData(num){
      $('#table_number').val(num);
    }
  </script>

<script>
    var today = new Date();
    
      $('#receive_date').datetimepicker({
        lang:'th',
        minDate:today,
        timepicker:false,
        format:'d/m/Y'
      });
      $('#receive_time').datetimepicker({
        lang:'th',
        datepicker:false,
        format:'H:i',
        enabledHours: '10'

      });
    </script>
    <script type="text/javascript">
    function Validate() {
      var currentDate = new Date();
      var selDate = $("#receive_date").val();
      var subDate = selDate.substring(0,2);
      var subMonth = selDate.substring(3,5);
      var subYears = selDate.substring(6,10);
      var cSubYears = parseInt(subYears, 10);
      var cNewYears = cSubYears - 543;
      var selectedDate = new Date(cNewYears,subMonth - 1,subDate);
      var recTime = 0;
      var conTime = 0;
      var receive_time = document.getElementById("receive_time").value;
      var timeNow = document.getElementById("time_now").value;
      var sub_rec = receive_time.substring(0, 2);
      var subTimeNow = timeNow.substring(0, 2);
      recTime = parseInt(sub_rec, 10);
      conTime = parseInt(subTimeNow, 10);
      
      //if (selectedDate > currentDate) {
        //alert("Date Entered is greater than Current Date ");
      //}
      //var confirmPassword = document.getElementById("re_password").value;
      if (selectedDate == currentDate) {
        if (recTime <= conTime) {
          alert("กรุณาระบุเวลาให้ถูกต้อง");
          return false;
        }
      }
      return true;
    }
  </script>
  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>