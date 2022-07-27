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

      <a href="index.php" id="home" class="logo me-auto"><i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i><span class="h1 fw-bold mb-0">Wintan Hospital</span></a>
      

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
      
      <a href="login.php" class="btn btn-outline-primary"><span class="d-none d-md-inline">Login</span></a>
      &nbsp;
      <a href="#" id="sign_up" class="btn btn-outline-primary"><span class="d-none d-md-inline">Sign Up</span></a>
    </div>
      
      
    </header>
  <!-- End Header -->
    
   <!-- BEGIN main -->
  <main id="main">
      <br>
      <br>
      <br>
      <br> 
        <!-- BEGIN signup ======= -->
    <section id="sign_up">
        
        <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sign Up</h2>
        </div>

        <form id="signup_form" method="post">
          <div class="row">
            <div class="col-md-4 form-group">
              <label>First Name</label>
              <input type="text" name="first_name" class="form-control" id="first_name">
              <ul id="first_name_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control" id="last_name">
              <ul id="last_name_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>Gender</label>
              <select name="gender" id="gender" class="form-select">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <ul id="gender_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>E-mail</label>
              <input type="text" class="form-control" name="email" id="email">
              <ul id="email_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>Phone Number</label>
              <input type="tel" class="form-control" name="phone_number" id="phone_number">
              <ul id="phone_number_error" class="text-danger">
                        
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Password</label> 
              <input type="password" name="password" class="form-control" id="password">
              <ul id="password_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>Confirm Password</label> 
              <input type="password" name="confirm_password" class="form-control" id="confirm_password">
              <ul id="confirm_password_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label hidden>Added By</label> 
              <input type="text" name="added_by" value="" class="form-control" id="added_by" hidden>
            </div>
          </div>
            <br>
          <div class="form-group mb-4">
                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" name="agree" id="invalidCheck2">
                                <label class="custom-control-label" for="invalidCheck2">Agree to submit form data</label>
                                <div class="invalid-feedback">
                                    Agree to submit form data
                                </div>
                            </div>
                            <ul id="agree_error" class="text-danger">
                        
                            </ul>
                        </div>
          
            <div class="text-center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Sign Up"></div>
            <ul id="signup_success" class="text-danger">
                        
           </ul>
        </form>
        
       
      </div>
       </section>
    <!-- End signup-->
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
               $('#signup_form').submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'signup_ajax.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                    //dataType: 'json',
                        //console.log(data);
                        $('#first_name_error').html(data.first_name_error);
                        $('#last_name_error').html(data.last_name_error);
                        $('#gender_error').html(data.gender_error);
                        $('#email_error').html(data.email_error);
                        $('#phone_number_error').html(data.phone_number_error);
                        $('#password_error').html(data.password_error);
                        $('#confirm_password_error').html(data.confirm_password_error);
                        $('#agree_error').html(data.agree_error);
                        //$('#signup_success').html(data.signup_success);
                        if(data.signup_success=="success"){
                            window.location = "login.php?message=success";
                        }
                        else{
                            $('#signup_success').html(data.signup_success);
                        }
                    }
                });
            });
        </script>
   
</html>


