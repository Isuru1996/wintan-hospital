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
  <main id="main">
      
    <div class="container">
            <div class="section-title">
                <h2>Edit User Details</h2>
            </div>
            <div id="user_data" class="table-responsive">
                
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
		<label>First Name</label>
		<input type="text" name="first_name" id="first_name" class="form-control" />
		<span id="error_first_name" class="text-danger"></span>
            </div>
            <div class="form-group">
		<label>Last Name</label>
		<input type="text" name="last_name" id="last_name" class="form-control" />
		<span id="error_last_name" class="text-danger"></span>
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select name="gender" id="gender" class="form-select">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <span id="error_gender" class="text-danger"></span>
            </div>
            <div class="form-group">
		<label>Email</label>
		<input type="email" name="email" id="email" class="form-control" />
		<span id="error_email" class="text-danger"></span>
            </div>
            <div class="form-group">
		<label>Phone Number</label>
		<input type="tel" name="phone_number" id="phone_number" class="form-control" />
		<span id="error_phone_number" class="text-danger"></span>
            </div>
            <div class="form-group">
		<label>Added By</label>
		<input type="text" name="added_by" id="added_by" class="form-control" disabled/>
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
			url:"edit_user_fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
        
        $("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
        
        $('#user_form').on('submit',function(event){
            event.preventDefault();
            var error_first_name='';
            var error_last_name='';
            var error_gender='';
            var error_email='';
            var error_phone_number='';
            if($('#first_name').val()==''){
                error_first_name='First Name is required';
                $('#error_first_name').text(error_first_name);
                $('#first_name').css('border-color','#cc0000');
            }
            else{
                error_first_name='';
                $('#error_first_name').text(error_first_name);
                $('#first_name').css('border-color','');
            }
            if($('#last_name').val()==''){
                error_last_name='Last Name is required';
                $('#error_last_name').text(error_last_name);
                $('#last_name').css('border-color','#cc0000');
            }
            else{
                error_last_name='';
                $('#error_last_name').text(error_last_name);
                $('#last_name').css('border-color','');
            }
            
            if($('#gender').val()==''){
                error_gender='Select gender';
                $('#error_gender').text(error_gender);
                $('#gender').css('border-color','#cc0000');
            }
            else{
                error_gender='';
                $('#error_gender').text(error_gender);
                $('#gender').css('border-color','');
            }
            
            if($('#email').val()==''){
                error_email='Email is required';
                $('#error_email').text(error_email);
                $('#email').css('border-color','#cc0000');
            }
            else{
                error_email='';
                $('#error_email').text(error_email);
                $('#email').css('border-color','');
            }
            
            if($('#phone_number').val()==''){
                error_phone_number='Phone number is required';
                $('#error_phone_number').text(error_phone_number);
                $('#phone_number').css('border-color','#cc0000');
            }
            else if($('#phone_number').val().length!=10&&$('#phone_number').val().length!=9){
                error_phone_number='Enter valid phone number';
                $('#error_phone_number').text(error_phone_number);
                $('#phone_number').css('border-color','#cc0000');
            }
            else{
                error_phone_number='';
                $('#error_phone_number').text(error_phone_number);
                $('#phone_number').css('border-color','');
            }
            
            
            if(error_first_name!=''||error_last_name!=''||error_gender!=''||error_email!=''||error_phone_number!=''){
                return false;
            }
            else{
                $('#form_action').attr('disabled','disabled');
                var form_data=$(this).serialize();
                $.ajax({
                    url:"edit_user_ajax.php",
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
            }
        });
        
       $("#action_alert").dialog({
            autoOpen:false
        });
        
       $(document).on('click','.edit',function(){
           var id=$(this).attr("id");
           var action='fetch_single';
           
           $.ajax({
               url:"edit_user_ajax.php",
               method:"POST",
               data:{id:id,action:action},
               dataType:"json",
               success:function(data){
                   $('#user_id').val(data.user_id);
                   $('#first_name').val(data.first_name);
                   $('#last_name').val(data.last_name);
                   $('#gender').val(data.gender);
                   $('#email').val(data.email);
                   $('#phone_number').val(data.phone_number);
                   $('#added_by').val(data.added_by);
   
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
					url:"edit_user_ajax.php",
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