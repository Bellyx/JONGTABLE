<?php 
if($_SESSION["status"] == 1){
  $user = getAdmin($_SESSION["id"]);
}else if($_SESSION["status"] == 2){
  $user = getTaker($_SESSION["id"]);
}else{
  $user = getUser($_SESSION["id"]);
}


if (isset($_GET['logout'])) {
  logout();
}
$user_status_map = array( 1=>'<a style="color:red">Admin</a>',2=>'<a style="color:red">Taker</a>',3=>'<a style="color:red">User</a>');
?>
<footer class="page-footer bg-image" style="background-image: url(assets/img/world_pattern.svg);">
  <div class="container">
    <?php if($_SESSION["id"] != "" && !empty($_SESSION["id"])){ ?>
      <?php if($_SESSION["status"] == 1){ ?>
        <p class="text-right" id="copyright"><a href="profile_admin.php"><?php echo $user["firstname"];?> <?php echo $user["lastname"];?></a> : <?php echo $user_status_map[1];?></p>
      <?php }else if($_SESSION["status"] == 2){ ?>
        <p class="text-right" id="copyright"><a href="profile_taker.php"><?php echo $user["firstname"];?> <?php echo $user["lastname"];?></a> : <?php echo $user_status_map[2];?></p>
      <?php }else{ ?>
        <p class="text-right" id="copyright"><a href="profile_user.php"><?php echo $user["firstname"];?> <?php echo $user["lastname"];?></a> : <?php echo $user_status_map[3];?></p>
      <?php }?>
      
      <p class="text-right" id="copyright">
        <a href='?logout=true' class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการออกจากระบบ');">ออกจากระบบ</a>
      </p>
    <?php }else{ ?>
      <p class="text-right" id="copyright" style="color:red;">คุณยังไม่ได้เข้าสู่ระบบ</p>
    <?php } ?>

  </div>
</footer>