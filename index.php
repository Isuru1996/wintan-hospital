<?php
    session_start();
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
      
                    
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#" id="home">Home</a></li>
          <li><a class="nav-link scrollto" href="#" id="about" >About</a></li>
          <li><a class="nav-link scrollto" href="#" id="services">Services</a></li>
          <li><a class="nav-link scrollto" href="#" id="doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#" id="gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#" id="contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!--<a href="#" id="appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>-->
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      <?php
        if(isset($_SESSION['logged_in'])){
            
      ?>
      <a href="appoinment.php" id="appointment" class="btn btn-outline-primary"><span class="d-none d-md-inline">Make an</span> Appointment</a>
      &nbsp;
      <a href="your_appoinment.php" id="appointment" class="btn btn-outline-primary"><span class="d-none d-md-inline">Your Appoinment</span></a>
      &nbsp;
      <a href="user_profile.php" id="user_profile" class="btn btn-outline-primary"><span class="d-none d-md-inline">My Profile</span></a>
      &nbsp;
      <a href="logout.php" id="logout" class="btn btn-outline-primary"><span class="d-none d-md-inline">Logout</span></a>
      <?php
        }
        else
        {
      ?>
      &nbsp;
      <a href="login.php" class="btn btn-outline-primary"><span class="d-none d-md-inline">Login</span></a>
      &nbsp;
      <a href="signup.php" id="sign_up" class="btn btn-outline-primary"><span class="d-none d-md-inline">Sign Up</span></a>
    
      
      <?php
        }
      ?>
      
    </div>
      
      
    </header>
  <!-- End Header -->
  
  <!-- BEGIN Hero Section -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>Welcome to <span>Wintan Hospital</span></h2>
            <p>MEET ALL YOUR MEDICAL NEEDS UNDER ONE ROOF, WE ARE HERE TO TAKE CARE OF YOU.</p>
            <a href="#" id="about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>Welcome to <span>Wintan Hospital</span></h2>
            <p>An INTEGRATED HEALTHCARE WORKFORCE WITH INNOVATIVE TOOLS, RESOURCE AND TECHNOLOGY.</p>
            <a href="#" id="about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>Welcome to <span>Wintan Hospital</span></h2>
            <p>WE ARE ENSURING A HEALTHIER FUTURE WITH AN EXCELLENT CARE.</p>
            <a href="#" id="about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section>
  <!-- END Hero Section -->
   <!-- BEGIN main -->
  <main id="main">
      
             
      
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
  <script src="assets/js/script.js"></script>
  
  
   
</body>

   
</html>