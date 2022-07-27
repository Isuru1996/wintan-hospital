<?php
    date_default_timezone_set("Asia/Colombo");
    include ('session.php');
    include ('crud.php');
    $obj=new crud_operation();
    $doctor_result=$obj->get_doctor_details();
    
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
      <a href="#" id="appointment" class="btn btn-outline-primary"><span class="d-none d-md-inline">Make an</span> Appointment</a>
      &nbsp;
      <a href="your_appoinment.php" id="appointment" class="btn btn-outline-primary"><span class="d-none d-md-inline">Your Appoinment</span></a>
      &nbsp;
      <a href="user_profile.php" id="user_profile" class="btn btn-outline-primary"><span class="d-none d-md-inline">My Profile</span></a>
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
          <h2>Make an Appointment</h2>
        </div>

        <form id="appoinment_form" method="post">
          <div class="row">
            
            <div class="col-md-4 form-group">
              <label>Patient Name</label>
              <input type="text" name="patient_name" class="form-control" id="patient_name">
              <ul id="patient_name_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label>Phone Number</label>
              <input type="tel" class="form-control" name="phone_number" id="phone_number">
              <ul id="phone_number_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label hidden>User Id</label>
              <input type="text" name="user_id" class="form-control" id="user_id" hidden value="<?php echo $_SESSION['logged_id'];?>">
            </div>
             <div class="col-md-4 form-group">
              <label hidden>Status</label>
              <input type="text" name="status" class="form-control" id="status" hidden value="pending">
            </div>
          </div>
                       
          <div class="row">          
            <div class="col-md-4 form-group mt-3">
              <label>Doctor</label>
              <select name="doctor" id="doctor" class="form-select">
                <option value="">Select Doctor</option>
                <?php
                    while($row=$doctor_result->fetch_assoc()){
                        $doctor_id=$row['doctor_id'];
                        $doctor=$row['type']." ( Dr.".$row['first_name']." ".$row['last_name'].")";
                        echo "<option value='$doctor_id'>$doctor</option>";
                    }
                ?>
              </select>
              <ul id="doctor_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group mt-3">
              <label>Appointment Date</label> 
              <input type="date" name="appoinment_date" class="form-control datepicker" id="appoinment_date" value="<?php echo date('Y-m-d'); ?>">
              <ul id="appoinment_date_error" class="text-danger">
                        
              </ul>
            </div>  
          </div>
            
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div>
            
          <div class="text-center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Make an appoinment"></div>
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
               $('#appoinment_form').submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'appoinment_ajax.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                    //dataType: 'json',
                        //console.log(data);
                        $('#patient_name_error').html(data.patient_name_error);
                        $('#phone_number_error').html(data.phone_number_error);
                        $('#doctor_error').html(data.doctor_error);
                        $('#appoinment_date_error').html(data.appoinment_date_error);
                        //$('#signup_success').html(data.signup_success);
                        if(data.appoinment_success=="success"){
                            alert("Appoinment Success..!!");
                            window.location = "your_appoinment.php";
                        }
                        else if(data.appoinment_success=="fail"){
                            alert("Appoinment fail..!!");
                        }
                    }
                });
            });
 </script>   
   
</html>