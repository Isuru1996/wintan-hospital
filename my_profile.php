<?php
    include ('session.php');
    include ('crud.php');
    $obj=new crud_operation();
    $logging_row=$obj->profile_data($_SESSION['logged_type'], $_SESSION['logged_id']);
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
                                    <strong>Success!</strong> Updated.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                </div>";
                        }
             }
             
        ?>
      
      
      <!-- BEGIN profile ======= -->
    <section id="profile">
        
        <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>My Profile</h2>
        </div>

        <form id="profile_form" method="post">
          
            <?php
                if($_SESSION['logged_type']=="doctor"){
            ?>
            <div class="row">
            <div class="col-md-4 form-group">
              <label>Doctor ID</label>
              <input type="text" name="doctor_id" class="form-control" id="doctor_id" value="<?php echo $logging_row['doctor_id'];?>" readonly="readonly">
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
              <select name="gender" id="gender" class="form-select" >
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
            
            <?php
                }
                else{
            ?>
            <div class="row">
              <div class="col-md-4 form-group">
              <label>Receptionist ID</label>
              <input type="text" name="receptionist_id" class="form-control" id="receptionist_id" value="<?php echo $logging_row['receptionist_id'];?>" readonly="readonly">
              </div>
              <div class="col-md-4 form-group">
              <label>E-mail</label>
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $logging_row['email'];?>" readonly="readonly">
              
              </div>
            </div>
            
            <?php
                }
                
                if($_SESSION['logged_type']!="receptionist"){
                
            ?>
            
            
            <div class="text-center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Confirm"></div>
            <ul id="update_success" class="text-danger">
                        
           </ul>
            <?php
            }
            ?>
        </form>
        
       
      </div>
       </section>
    <!-- End profile-->
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
                        
                        if(data.update_success=="success"){
                            window.location = "my_profile.php?message=success";
                        }
                        else{
                            $('#update_success').html(data.update_success);
                        }
                    }
                });
            });
        </script>
</html>