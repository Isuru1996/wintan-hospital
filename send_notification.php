<?php
    include ('session.php');
    include ('crud.php');
    
    $obj=new crud_operation();
    $receivers=array();
    $receivers=$obj->get_receivers_notification($_SESSION['logged_type'], $_SESSION['logged_id']);
      
   
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
                                    <strong>Success!</strong> Notification send.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                </div>";
                        }
             }
             
        ?>
      
      
      <!-- BEGIN notification ======= -->
    <section id="notification">
        
        <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Send Notification</h2>
        </div>

        <form id="notification_form" method="post">
          <div class="row">
            <div class="col-md-4 form-group">
              <label>Sender ID</label>
              <input type="text" name="sender_id" class="form-control" id="sender_id" value="<?php echo $_SESSION['logged_id'];?>" readonly="readonly">
            </div>
            
            <div class="col-md-4 form-group">
              <label>Receiver</label>
              <select name="receiver" id="receiver" class="form-select">
                <option value="">Select Receiver</option>
                <?php
                    if($_SESSION['logged_type']=="receptionist"){
                        while($row1=$receivers['result1']->fetch_assoc()){
                            $receptionist_id=$row1['receptionist_id'];
                            echo "<option value='$receptionist_id'>$receptionist_id</option>";
                        }
                        while($row2=$receivers['result2']->fetch_assoc()){
                            $doctor_id=$row2['doctor_id'];
                            $doctor="( Dr.".$row2['first_name']." ".$row2['last_name'].")";
                            echo "<option value='$doctor_id'>$doctor</option>";
                        }
                    }else{
                        while($row1=$receivers['result1']->fetch_assoc()){
                            $doctor_id=$row1['doctor_id'];
                            $doctor="( Dr.".$row1['first_name']." ".$row1['last_name'].")";
                            echo "<option value='$doctor_id'>$doctor</option>";
                        }
                        while($row2=$receivers['result2']->fetch_assoc()){
                            $receptionist_id=$row2['receptionist_id'];
                            echo "<option value='$receptionist_id'>$receptionist_id</option>";
                        }
                    }
                ?>
              </select>
              <ul id="receiver_error" class="text-danger">
                        
              </ul>
            </div>
            
            
          </div>
          <div class="row">
            <div class="form-group mt-3">
                <label>Message</label>
                <textarea class="form-control" name="message" rows="5"></textarea>
            </div>
              <ul id="message_error" class="text-danger">
                        
              </ul>
          </div>
            <br>
         
          
            <div class="text-center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Send"></div>
            <ul id="notification_success" class="text-danger">
                        
           </ul>
        </form>
        
       
      </div>
       </section>
    <!-- End notification-->
    
    <div class="container">
            <div class="section-title">
                <h2>Notification Details</h2>
            </div>
            <a href="#" id="receive" class="btn btn-outline-primary"><span class="d-none d-md-inline">Receive</span></a>
            <a href="#" id="send" class="btn btn-outline-primary"><span class="d-none d-md-inline">Send</span></a>
            <div id="receive_notification_data" class="table-responsive">
                
            </div>
            <div id="send_notification_data" class="table-responsive">
                
            </div>
            <br>
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

  <!-- Template Main JS File -->
  <script src="assets/js/adminmain.js"></script>
  <script src="assets/js/jquery.js"></script>
  

</body>
<script>
    $(document).ready(function(){
        load_data();
        
	function load_data()
	{
		$.ajax({
			url:"notifications_fetch.php",
			method:"POST",
                        dataType:"json",
			success:function(data)
			{
				$('#receive_notification_data').html(data.output1);
                                $('#send_notification_data').html(data.output2);
                                $('#receive_notification_data').show();
                                $('#send_notification_data').hide();
			}
		});
	}
        
        $('#receive').click(function() {
             $('#receive_notification_data').show();
             $('#send_notification_data').hide();
        });
        
        $('#send').click(function() {
            $('#send_notification_data').show();
            $('#receive_notification_data').hide();
        });
        
        
        $('#notification_form').submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'notification_ajax.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                    //dataType: 'json',
                        //console.log(data);
                        $('#receiver_error').html(data.receiver_error);
                        $('#message_error').html(data.message_error);
                        
                        //$('#notification_success').html(data.notification_success);
                        if(data.notification_success=="success"){
                            window.location = "send_notification.php?message=success";
                        }
                        else{
                            $('#notification_success').html(data.notification_success);
                        }
                    }
                });
            });
    });
</script>
</html>