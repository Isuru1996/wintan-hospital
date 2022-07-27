<?php
    include ('session.php');
    include ('crud.php');
    $obj=new crud_operation();
    $logging_row=$obj->profile_data($_SESSION['logged_type'], $_SESSION['logged_id']);
?>
<!DOCTYPE html>
<html lang="en">

<!--Begin header-->
<?php
    include ('head.php');
?>
<!--End header-->

<body>
    
  <!-- Begin top bar -->
  <?php
    include ('top_bar.php');
  ?>
  <!-- End top bar -->
  
  
  <!-- Begin header -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="#" id="home" class="logo me-auto"><i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i><span class="h1 fw-bold mb-0">Wintan Hospital</span></a>
      
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="index.php" id="home">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      <a href="appoinment.php" id="appointment" class="btn btn-outline-primary"><span class="d-none d-md-inline">Make an</span> Appointment</a>
      &nbsp;
      <a href="your_appoinment.php" id="appointment" class="btn btn-outline-primary"><span class="d-none d-md-inline">Your Appoinment</span></a>
      &nbsp;
      <a href="#" id="user_profile" class="btn btn-outline-primary"><span class="d-none d-md-inline">My Profile</span></a>
      &nbsp;
      <a href="logout.php" id="logout" class="btn btn-outline-primary"><span class="d-none d-md-inline">Logout</span></a>
      
    </div>
      
      
    </header>
  <!-- End Header -->
  
  
   <!-- BEGIN main -->
  <main id="main">
      <br>
      <br>
      <br>
      <br>
      <!-- BEGIN Appointment-->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>My Profile</h2>
        </div>

        <form id="profile_form" method="post">
          
            <div class="row">
            <div class="col-md-4 form-group">
              <label>User ID</label>
              <input type="text" name="user_id" class="form-control" id="user_id" value="<?php echo $logging_row['user_id'];?>" readonly="readonly">
            </div>
            <div class="col-md-4 form-group">
              <label>First Name</label>
              <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $logging_row['first_name'];?>">
              <ul id="first_name_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $logging_row['last_name'];?>">
              <ul id="last_name_error" class="text-danger">
                        
              </ul>
            </div>
            <?php
                $maleSelected="";
                $femaleSelected="";
                if($logging_row['gender']=="male"){
                    $maleSelected="selected";
                }
                else{
                    $femaleSelected="selected";
                }
            ?>
            <div class="col-md-4 form-group">
              <label>Gender</label>
              <select name="gender" id="gender" class="form-select">
                <option value="">Select Gender</option>
                <option value="male" <?php echo $maleSelected;?>>Male</option>
                <option value="female" <?php echo $femaleSelected;?>>Female</option>
              </select>
              <ul id="gender_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>E-mail</label>
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $logging_row['email'];?>" readonly="readonly">
              
            </div>
            <div class="col-md-4 form-group">
              <label>Phone Number</label>
              <input type="tel" class="form-control" name="phone_number" id="phone_number" value="<?php echo $logging_row['phone_number'];?>">
              <ul id="phone_number_error" class="text-danger">
                        
              </ul>
            </div>
            </div>
            
            <div class="row">
            <div class="col-md-4 form-group">
              <label>Current Password</label> 
              <input type="password" name="current_password" class="form-control" id="current_password">
              <ul id="current_password_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>New Password</label> 
              <input type="password" name="new_password" class="form-control" id="new_password">
              <ul id="new_password_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>Confirm Password</label> 
              <input type="password" name="confirm_password" class="form-control" id="confirm_password">
              <ul id="confirm_password_error" class="text-danger">
                        
              </ul>
            </div>
            </div>
             
            <div class="text-center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Confirm"></div>
            <ul id="update_success" class="text-danger">
                        
           </ul>
           
        </form>

      </div>
    </section>
    <!-- End Appointment-->
      
  </main>
  <!-- End main -->

  <!-- BEGIN Footer -->
  <?php
    include ('footer.php');
  ?>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery.js"></script>
  
   
</body>
 <script>
                   $('#profile_form').submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'my_profile_ajax.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                    //dataType: 'json',
                        //console.log(data);
                        $('#first_name_error').html(data.first_name_error);
                        $('#last_name_error').html(data.last_name_error);
                        $('#gender_error').html(data.gender_error);
                        $('#phone_number_error').html(data.phone_number_error);
                        $('#current_password_error').html(data.current_password_error);
                        $('#new_password_error').html(data.new_password_error);
                        $('#confirm_password_error').html(data.confirm_password_error);
                        
                        //$('#signup_success').html(data.signup_success);
                        //$('#update_success').html(data.update_success);
                        if(data.update_success=="success"){
                            alert("update success");
                            window.location = "index.php?message=success";
                        }
                        else{
                            $('#update_success').html(data.update_success);
                        }
                    }
                });
            });
 </script>   
   
</html>