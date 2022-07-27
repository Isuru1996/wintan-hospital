<?php
    include ('session.php');
    include ('crud.php');
    $obj=new crud_operation();
    $doctor_name=$obj->get_doctor_name($_SESSION['logged_id']);
    
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
                                    <strong>Success!</strong> Vacation Added.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                </div>";
                        }
             }
             
        ?>
      
      <?php
        if($_SESSION['logged_type']=="doctor"){
        
      ?>
      <!-- BEGIN vacationing form ======= -->
    <section id="vacationing">
        
        <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Vacationing</h2>
        </div>

        <form id="vacation_form" method="post">
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Doctor ID</label>
              <input type="text" name="doctor_id" class="form-control" id="doctor_id" value="<?php echo $_SESSION['logged_id'];?>" readonly="readonly">
            </div>
            <div class="col-md-4 form-group">
              <label>Doctor Name</label>
              <input type="text" name="doctor_name" class="form-control" id="doctor_name" value="<?php echo $doctor_name;?>" readonly="readonly">
            </div>
          </div>
            
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Reason</label>
              <input type="text" class="form-control" name="reason" id="reason">
              <ul id="reason_error" class="text-danger">
                        
              </ul>
            </div>
            <div class="col-md-4 form-group">
              <label>Date</label> 
              <input type="date" name="date" class="form-control" id="date">
              <ul id="date_error" class="text-danger">
                        
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" id="password">
              <ul id="password_error" class="text-danger">
                        
              </ul>
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
          
            <div class="text-center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Confirm"></div>
            <ul id="vacationing_success" class="text-danger">
                        
           </ul>
        </form>
        
       
      </div>
       </section>
    <!-- End vacationing form-->
    <?php
        }
    ?>
    
    <div class="container">
            <div class="section-title">
                <h2>Vacationing Details</h2>
            </div>
            <div id="vacation_data" class="table-responsive">
                
            </div>
            <br>
     </div>
    
    <div id="action_alert" title="Action">
            
    </div>
        
    <div id="delete_confirmation" title="confirmation">
        <p>Are you sure you want to Delete this Data?</p>
    </div>
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
  
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/adminmain.js"></script>
  
</body>
<script>
    $(document).ready(function(){
        load_data();
        function load_data()
	{
		$.ajax({
			url:"vacationing_fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#vacation_data').html(data);
			}
		});
	}
        
        $("#action_alert").dialog({
            autoOpen:false
        });
        
        $('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"vacationing_ajax2.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
        
        $('#vacation_form').submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'vacationing_ajax.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                    //dataType: 'json',
                        //console.log(data);
                        $('#reason_error').html(data.reason_error);
                        $('#date_error').html(data.date_error);
                        $('#password_error').html(data.password_error);
                        $('#agree_error').html(data.agree_error);
                        
                        if(data.vacationing_success=="success"){
                            window.location = "vacationing.php?message=success";
                        }
                        else{
                            $('#vacationing_success').html(data.vacationing_success);
                        }
                    }
                });
            });
    });
             
</script>
</html>