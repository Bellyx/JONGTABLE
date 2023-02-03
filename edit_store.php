<!DOCTYPE html>
<html lang="en">
<head><title>Raffjong</title></head>
<?php
require_once("header.php");
?>
<?php 
$currentStore = getCurrentStore($_GET["id"]);
$allChairInStore = getAllChairInStore($_GET["id"]);

if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    $chair_type = $_POST["chair_type"];
    $chair_amount = $_POST["chair_amount"];
    saveStore($_POST["store_name"],$_POST["store_detail"],$_POST["store_phone"],$_FILES["store_image"]["name"],$chair_type,$chair_amount);
  }else{
    $chair_id = $_POST["chair_id"];
    $chair_type = $_POST["chair_type"];
    $chair_amount = $_POST["chair_amount"];
    editStore($_POST["id"],$_POST["store_name"],$_POST["store_detail"],$_POST["store_phone"],$_FILES["store_image"]["name"],$chair_id,$chair_type,$chair_amount);
  }
  
}
if($_GET["id"] == ""){
  $txtHead = "เพิ่ม ร้าน";
}else{
  $txtHead = "แก้ไข ร้าน";
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
            <h1 class="text-center" style="color:white;"><?php echo $txtHead;?></h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3">
          <h2 class="title-section">ข้อมูลร้าน</h2>
          <div class="divider"></div>
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?php echo $currentStore['id'];?>">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อร้าน</label>
                <input type="text" id="store_name" name="store_name" class="form-control" value="<?php echo $currentStore['store_name'];?>" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="subject">รายละเอียด</label>
                <textarea id="store_detail" class="form-control" rows="3" name="store_detail" required><?php echo $currentStore['store_detail'];?></textarea>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">เบอร์ติดต่อร้าน</label>
                <input type="text" id="store_phone" name="store_phone" class="form-control" value="<?php echo $currentStore['store_phone'];?>" required>
              </div>

              
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">อัพโหลดรูปร้าน</label>
                <input type="file" class="form-control" id="store_image" name="store_image" >
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <fieldset>
                  <input type="button" style="float:right;margin-right:50px;" value="ลบที่นั่ง" class="btn btn-danger" onclick="deleteRow('dataTable')" />
                  <input type="button" style="float:right;margin-right:50px;" id="add_row" value="เพิ่มที่นั่ง" class="btn btn-primary" onclick="addRow('dataTable')" />

                  <table class="table table-striped" id="dataTable">
                    <thead>
                      <th></th>
                      <th style="text-align:center;"><label class="text-black" for="fname">ประเภทที่นั่ง</label></th>
                      <th style="text-align:center;"><label class="text-black" for="fname">จำนวนโต๊ะ</label></th>
                    </thead>
                    <tbody>
                      <?php if(empty($allChairInStore)){ ?>

                        <?php for($i=0;$i<5;$i++){ ?>
                          <tr>
                            <td style="width:5%;"><input type="checkbox" name="chk"/></td>
                            <td style="width:60%;"><input type="text" class="form-control border-input" name="chair_type[]" id="chair_type<?php echo $i;?>" ></td>
                            <td style="width:35%;"><input type="text" class="form-control border-input" name="chair_amount[]" id="chair_amount<?php echo $i;?>" ></td>
                          </tr>
                        <?php } ?>
                      <?php }else{?>
                        <?php foreach($allChairInStore as $dataCh){ ?>

                          <tr>
                            <td style="width:5%;"><input type="checkbox" name="chk"/>
                              <input type="hidden" class="form-control border-input" value="<?php echo $dataCh["id"];?>" name="chair_id[]" id="chair_id<?php echo $i;?>" >
                            </td>
                            <td style="width:60%;"><input type="text" class="form-control border-input" value="<?php echo $dataCh["chair_type"];?>" name="chair_type[]" id="chair_type<?php echo $i;?>" ></td>
                            <td style="width:35%;"><input type="text" class="form-control border-input" value="<?php echo $dataCh["chair_amount"];?>" name="chair_amount[]" id="chair_amount<?php echo $i;?>" ></td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </fieldset>
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12" style="text-align: center;">
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <?php if($currentStore['store_image'] == ""){?>
              <img src="assets/img/store_ico.png" alt="" class="img-fluid">
            <?php }else{ ?>
              <img src="images/store/<?php echo $currentStore['store_image'];?>" alt="" class="img-fluid" style="width:300px;height:250px;">
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var today = new Date();

    $('#end_date').datetimepicker({
      lang:'th',
      minDate:today,
      timepicker:false,
      format:'d/m/Y'
    });
    $('#end_time').datetimepicker({
      lang:'th',
      datepicker:false,
      format:'H:i',
      enabledHours: '10'

    });
  </script>

  <script language="javascript">

    function addRow(tableID) {

      var table = document.getElementById(tableID);

      var rowCount = table.rows.length;

      var row = table.insertRow(rowCount);

      var cell0 = row.insertCell(0);
      var element0 = document.createElement("input");
      element0.type = "checkbox";
      element0.name="chkbox";
      cell0.appendChild(element0);

      var cell1 = row.insertCell(1);
      var element1 = document.createElement("input");
      element1.type = "text";
      element1.name = "chair_type[]";
      element1.id = "chair_type"+rowCount;
      element1.className = "form-control border-input";
      cell1.appendChild(element1);

      var cell2 = row.insertCell(2);
      var element2 = document.createElement("input");
      element2.type = "text";
      element2.name = "chair_amount[]";
      element2.id = "chair_amount"+rowCount;
      element2.className = "form-control border-input";
      cell2.appendChild(element2);

    }

    function deleteRow(tableID) {
      try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        for(var i=0; i<rowCount; i++) {
          var row = table.rows[i];
          var chkbox = row.cells[0].childNodes[0];
          if(null != chkbox && true == chkbox.checked) {
            table.deleteRow(i);
            rowCount--;
            i--;
          }


        }
      }catch(e) {
        alert(e);
      }
    }


  </script>

  <?php
  require_once("footer.php");
  ?>



</body>
</html>