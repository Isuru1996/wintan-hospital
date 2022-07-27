<?php
    include ('session.php');
    
    include ('crud.php');
    $obj=new crud_operation();
    $doctor_result=$obj->get_doctor_details();
    
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
  <main id="main">
      
    <div class="container">
            <div class="section-title">
                <h2>Appoinments Details</h2>
            </div>
            <a href="#" id="previous_appoinments" class="btn btn-outline-primary"><span class="d-none d-md-inline">Previous</span> Appointments</a>
            <a href="#" id="current_appoinments" class="btn btn-outline-primary"><span class="d-none d-md-inline">Current</span> Appointments</a>
      
            <div id="user_data1" class="table-responsive">
                
            </div>
            <div id="user_data2" class="table-responsive">
                
            </div>
            <br>
     </div>
      
     <div id="user_dialog" title="Add Data">
	<form method="post" id="user_form">
            <div class="form-group">
		<label>User ID</label>
                <input type="text" name="user_id" id="user_id" class="form-control" disabled/>
            </div>
            
            <div class="form-group">
		<label>Patient Name</label>
		<input type="text" name="patient_name" id="patient_name" class="form-control" disabled/>
            </div>
            
            <div class="form-group">
		<label>Phone Number</label>
		<input type="tel" name="phone_number" id="phone_number" class="form-control" disabled/>
            </div>
            
            <div class="form-group">
		<label>Doctor</label>
                <select name="doctor" id="doctor" class="form-select" disabled>
                <option value="">Select Doctor</option>
                <?php
                    while($row=$doctor_result->fetch_assoc()){
                        $doctor_id=$row['doctor_id'];
                        $doctor=$row['type']." ( Dr.".$row['first_name']." ".$row['last_name'].")";
                        echo "<option value='$doctor_id'>$doctor</option>";
                    }
                ?>
                </select>
            </div>
            
            <div class="form-group">
              <label>Appointment Date</label> 
              <input type="date" name="appoinment_date" class="form-control datepicker" id="appoinment_date" disabled>
            </div>
            
            <div class="form-group">
		<label>Appointment Time</label>
		<input type="text" name="appoinment_time" id="appoinment_time" class="form-control" disabled/>
            </div>
            
            <div class="form-group">
		<label>Appointment ID</label>
		<input type="text" name="appoinment_id" id="appoinment_id" class="form-control" disabled/>
            </div>
            
            <div class="form-group">
		<label>Status</label>
                <select name="status" id="status" class="form-select">
                  <option value="pending">Pending</option>
                  <option value="confirm">Confirm</option>
                </select>
            </div>
            
            <div class="form-group">
		<label>Appointment Was Made</label>
		<input type="text" name="appoinment_was_made" id="appoinment_was_made" class="form-control" disabled/>
            </div>
           
            <div class="form-group">
		<input type="hidden" name="action" id="action" value="insert" />
		<input type="hidden" name="hidden_id" id="hidden_id" />
		<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
            </div>
	</form>
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
			url:"appoinments_fetch.php",
			method:"POST",
                        dataType:"json",
			success:function(data)
			{
				$('#user_data1').html(data.output1);
                                $('#user_data2').html(data.output2);
                                $('#user_data2').show();
                                $('#user_data1').hide();
			}
		});
	}
        
        $('#previous_appoinments').click(function() {
            $('#user_data1').show();
            $('#user_data2').hide();
        });
        
        $('#current_appoinments').click(function() {
            $('#user_data2').show();
            $('#user_data1').hide();
        });
        
        $("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
        
        $('#user_form').on('submit',function(event){
            event.preventDefault();
            
                $('#form_action').attr('disabled','disabled');
                var form_data=$(this).serialize();
                $.ajax({
                    url:"appoinments_ajax.php",
                    method:"POST",
                    data:form_data,
                    success:function(data){
                        $('#user_dialog').dialog('close');
                        $('#action_alert').html(data);
                        $('#action_alert').dialog('open');
                        load_data();
                        $('#form_action').attr('disabled', false);
                    }
                });
            
        });
        
       $("#action_alert").dialog({
            autoOpen:false
        });
        
       $(document).on('click','.edit',function(){
           var id=$(this).attr("id");
           var action='fetch_single';
           
           $.ajax({
               url:"appoinments_ajax.php",
               method:"POST",
               data:{id:id,action:action},
               dataType:"json",
               success:function(data){
                   $('#user_id').val(data.user_id);
                   $('#patient_name').val(data.patient_name);
                   $('#phone_number').val(data.phone_number);
                   $('#doctor').val(data.doctor);
                   $('#appoinment_date').val(data.appoinment_date);
                   $('#appoinment_time').val(data.appoinment_time);
                   $('#appoinment_id').val(data.appoinment_id);
                   $('#status').val(data.status);
                   $('#appoinment_was_made').val(data.appoinment_was_made);
   
                   $('#user_dialog').attr('title','Edit Data');
                   $('#action').val('update');
                   $('#hidden_id').val(id);
                   $('#form_action').val('Update');
                   $('#user_dialog').dialog('open');
                   
               }
           });
        });
        
        $('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"appoinments_ajax.php",
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
        
        
    });
</script>
</html>