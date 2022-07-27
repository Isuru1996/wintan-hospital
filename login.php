
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <!--Begin header-->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login to Wintan Hospital</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
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

  <script type="text/javascript" src="assets/js/jquery.js"></script>

</head>
<!--End header-->
    <body>
       
        <section class="vh-100" style="background-color: #9A616D;">
             <?php
            if (isset($_GET["message"])){
                 if(($_GET['message'])=="success"){
                            echo "<br/>";
                            echo "<div class='alert alert-success alert-dismissible fade show'>
                                    <strong>Success!</strong> Your message has been sent successfully.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                </div>";
                        }
             }
             
        ?>
                    
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                  src="assets/img/login.jpg";
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form id="login_form" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Wintan Hospital</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="email" name="email" class="form-control form-control-lg" />
                    <ul id="email_error" class="text-danger">
                        
                    </ul>
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <ul id="password_error" class="text-danger">
                        
                    </ul>
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <input class="btn btn-dark btn-lg btn-block" type="submit" name="submit" id="submit" value="login">
                    <ul id="login_error" class="text-danger">
                        
                    </ul>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        <script>
            $('#login_form').submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'login_ajax.php',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (data) {
                    //dataType: 'json',
                        //console.log(data);
                        $('#email_error').html(data.email_error);
                        $('#password_error').html(data.password_error);
                        
                        if(data.login_error!=""){
                            $('#login_error').html(data.login_error);
                        }
                        else{
                            if(data.login_success=="admin"){
                                window.location = "admin.php";
                            }
                            else if(data.login_success=="index"){
                                window.location = "index.php";
                            }
                           //$('#login_success').html(data.login_success);
                        }
                    }
                });
            });
        </script>
    </body>
</html>
