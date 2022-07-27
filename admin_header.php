<?php
    include('session.php');
    include('last_notifications_fetch.php');
    
    $last_notificatios=last_five_notifications($_SESSION['logged_id']);
?>
<!-- Begin Header -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin.php" class="logo d-flex align-items-center">
        <img src="assets/img/adminlogo.png" alt="">
        <span class="d-none d-lg-block">Wintan Hospital</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
          <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">*</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              For Send Notification
              <a href="send_notification.php"><span class="badge rounded-pill bg-primary p-2 ms-2">Click</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php
                while($row=$last_notificatios->fetch_assoc()){
                
            ?>
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                  <h4><?php echo get_sender_name($row['sender_id']);?></h4>
                <p>><?php echo $row['message'];?></p>
                <p><?php echo $row['time'];?></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <?php
                }
             ?>

           
            <li class="dropdown-footer">
              <a href="send_notification.php">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php
                if($_SESSION['logged_type']=="doctor"){
                
            ?>
            <img src="assets/img/profile-img2.png" alt="Profile" class="rounded-circle">
            <?php
                }
                else{
            ?>
            <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle">
                <?php
                }
                ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['logged_email'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['logged_email'];?></h6>
              <span><?php echo $_SESSION['logged_type'];?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="my_profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
<!-- End Header -->