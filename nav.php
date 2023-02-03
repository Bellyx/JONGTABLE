<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
  <div class="container">
    <a href="index.php" class="navbar-brand">Raff <span class="text-primary">Jong</span></a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarContent">
      <ul class="navbar-nav ml-auto">
<!-------------------------------------------------------------
        <li class="nav-item">
          <a class="nav-link" href="index.php">หน้าหลัก</a>
        </li>

------------------------------------------------------------>

        <?php if($_SESSION["id"] != "" && !empty($_SESSION["id"])){ ?>
          <?php if($_SESSION["status"] == 1){ ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ข้อมูลผู้ใช้งาน
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="manage_admin.php">ข้อมูล Admin</a>
                <a class="dropdown-item" href="manage_taker.php">ข้อมูล Taker</a>
                <a class="dropdown-item" href="manage_user.php">ข้อมูล User</a>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="manage_store.php">ข้อมูลร้าน</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_booking.php">ประวัติการจอง</a>
            </li>
          <?php } ?>
          <?php if($_SESSION["status"] == 2){ ?>
            <li class="nav-item">
              <a class="nav-link" href="check_pending.php">ข้อมูลการจอง</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history_accept.php">ประวัติการรับงาน</a>
            </li>
          <?php } ?>
          <?php if($_SESSION["status"] == 3){ ?>
            <li class="nav-item">
              <a class="nav-link" href="all_store.php">ร้านทั้งหมด</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history_booking.php">ประวัติการจอง</a>
            </li>
          <?php } ?>
        <?php }else{ ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            เกี่ยวกับ
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="contact.php">ติดต่อสอบถาม</a>
            <a class="dropdown-item" href="condition.php">เงื่อนไขการใช้บริการ</a>
          </div>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="select_register.php">สมัครสมาชิก</a>
          </li>
        <?php } ?>
        
        
      </ul>
    </div>

  </div>
</nav>