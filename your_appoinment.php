<?php
    include ('session.php');
    include ('crud.php');
    $obj=new crud_operation();
    $doctor_result=$obj->get_doctor_details();
?>
<!DOCTYPE html>
<html lang="en">

<!--Begin header-->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wintan Hospital</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <script src="assets/js/jquery.min.js"></script>  
  <script src="assets/js/jquery-ui.js"></script>

</head>
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
      <a href="#" id="appointment" class="btn btn-outline-primary"><span class="d-none d-md-inline">Your Appoinment</span></a>
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
      <br>
      <br>
     
      <div class="container">
            <div class="section-title">
                <h2>Your Appointment</h2>
            </div>
            <div id="user_data" class="table-responsive">
                
            </div>
            <br>
     </div>
      
     <div id="user_dialog" title="Add Data">
	<form method="post" id="user_form">
            <div class="form-group">
		<label>Patient Name</label>
		<input type="text" name="patient_name" id="patient_name" class="form-control" />
		<span id="error_patient_name" class="text-danger"></span>
            </div>
            <div class="form-group">
		<label>Phone Number</label>
		<input type="tel" name="phone_number" id="phone_number" class="form-control" />
		<span id="error_phone_number" class="text-danger"></span>
            </div>
            <div class="form-group">
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
              <span id="error_doctor" class="text-danger"></span>
            </div>
            <div class="form-group">
              <label>Appointment Date</label> 
              <input type="date" name="appoinment_date" class="form-control datepicker" id="appoinment_date" value="<?php echo date('Y-m-d'); ?>">
              <span id="error_appoinment_date" class="text-danger"></span>
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
  
   
</body>
<script>
    $(document).ready(function(){
        load_data();
    
	function load_data()
	{
		$.ajax({
			url:"your_appoinment_fetch.php",
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
            var error_patient_name='';
            var error_phone_number='';
            var error_doctor='';
            var error_appoinment_date='';
            if($('#patient_name').val()==''){
                error_patient_name='Patient Name is required';
                $('#error_patient_name').text(error_patient_name);
                $('#patient_name').css('border-color','#cc0000');
            }
            else{
                error_patient_name='';
                $('#error_patient_name').text(error_patient_name);
                $('#patient_name').css('border-color','');
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
            
            if($('#doctor').val()==''){
                error_doctor='Select a doctor';
                $('#error_doctor').text(error_doctor);
                $('#doctor').css('border-color','#cc0000');
            }
            else{
                error_doctor='';
                $('#error_doctor').text(error_doctor);
                $('#doctor').css('border-color','');
            }
            var appoinment_date = new Date($('#appoinment_date').val());
            var today = new Date();
            
            if(appoinment_date<today){
                error_appoinment_date='Select a date';
                $('#error_appoinment_date').text(error_appoinment_date);
                $('#appoinment_date').css('border-color','#cc0000');
            }
            else{
                error_appoinment_date='';
                $('#error_appoinment_date').text(error_appoinment_date);
                $('#appoinment_date').css('border-color','');
            }
            
            if(error_patient_name!=''||error_phone_number!=''||error_doctor!=''||error_appoinment_date!=''){
                return false;
            }
            else{
                $('#form_action').attr('disabled','disabled');
                var form_data=$(this).serialize();
                $.ajax({
                    url:"your_appoinment_ajax.php",
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
        
        $('#action_alert').dialog({
            autoOpen:false
        });
        
        $(document).on('click','.edit',function(){
           var id=$(this).attr("id");
           var action='fetch_single';
           
           $.ajax({
               url:"your_appoinment_ajax.php",
               method:"POST",
               data:{id:id,action:action},
               dataType:"json",
               success:function(data){
                   $('#patient_name').val(data.patient_name);
                   $('#phone_number').val(data.phone_number);
                   $('#doctor').val(data.doctor);
                   $('#appoinment_date').val(data.appoinment_date);
   
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
					url:"your_appoinment_ajax.php",
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