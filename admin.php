<?php
    include ('session.php');
    
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Begin Head-->
<?php
    include ('admin_head.php');
?>
    <!-- End Head-->

<body>
    
  <!--Begin Header-->
  <?php
    include ('admin_header.php');
  ?>
  <!--End Header-->

  <!-- Begin Sidebar -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="admin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
          
        </a>
          
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" id="users">
          <i class="bi bi-menu-button-wide"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin.php" id="delete_user">
              <i class="bi bi-circle"></i><span>Add User User</span>
            </a>
          </li>
          <li>
            <a href="edit_user.php" id="edit_user">
              <i class="bi bi-circle"></i><span>Edit/Delete User</span>
            </a>
          </li>
        </ul>
      </li><!-- End USERS Nav -->
      
      <?php
        if($_SESSION['logged_type']=="receptionist"){
      ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#" id="doctors">
          <i class="bi bi-journal-text"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_doctor.php" id="add_doctor">
              <i class="bi bi-circle"></i><span>Add Doctor</span>
            </a>
          </li>
          <li>
            <a href="edit_doctor.php" id="edit_doctor">
              <i class="bi bi-circle"></i><span>Edit/Delete Doctor</span>
            </a>
          </li>
        </ul>
      </li><!-- End DOCTORS Nav -->
        <?php
        
        }
        ?>
      
      <li class="nav-item">
          <a class="nav-link collapsed" href="appoinments.php">
          <i class="bi bi-person"></i>
          <span>Appoinments</span>
        </a>
      </li><!-- End Appoinments Page Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="vacationing.php">
          <i class="bi bi-file-earmark"></i>
          <span>Vacationing</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside>
  <!-- End Sidebar-->
  
  
  
  <!--Begin main-->
  <main id="main" class="main">
      
      <?php
      //echo $_SESSION['logged_id'];
            if (isset($_GET["message"])){
                 if(($_GET['message'])=="success"){
                            echo "<br/>";
                            echo "<div class='alert alert-success alert-dismissible fade show'>
                                    <strong>Success!</strong> User Added.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                </div>";
                        }
             }
             
        ?>
      
      
      <!-- BEGIN signup ======= -->
    <section id="sign_up">
        
        <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Add Users</h2>
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
            <?php
                $added_by="";
                if($_SESSION['logged_type']=="doctor"){
                    $added_by="";
                }
                else{
                    $added_by=$_SESSION['logged_id'];
                }
            ?>
            <div class="col-md-4 form-group">
              <label hidden>Added By</label> 
              <input type="text" name="added_by" value="<?php echo $added_by;?>" class="form-control" id="added_by" hidden>
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

  <?php
    include('admin_footer.php');
  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/adminmain.js"></script>
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
                            window.location = "admin.php?message=success";
                        }
                        else{
                            $('#signup_success').html(data.signup_success);
                        }
                    }
                });
            });
        </script>
</html>