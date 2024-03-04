<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_start();
        $_SESSION["token"] = bin2hex(random_bytes(32));
        $_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs
        require_once('includes/init.php');
        include 'includes/functions.php'; 
    ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Register - Employee's Registration Module</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column py-4">
        <div class="container">
          <div class="row">
            <div class= "col-lg-12 col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title">
                          <div class="row">
                            <div class="col-md-9">
                              <h5>Search Employee Number</h5>
                            </div>
                            <div class="col-md-3">
                              <a href="index.php" class="button float-end">
                                <i class="bi bi-arrow-left-square" >
                                  Back to Login Page
                                </i>
                              </a> 
                            </div>
                          </div>
                        </div>  
                            <form 
                                class="form-horizontal" 
                                method="POST" 
                                id="contentsearch" 
                                autocomplete="off">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label 
                                            for="Search" 
                                            class="col-sm-12">
                                            Employee Number
                                        </label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group has-validation">
                                            <span 
                                            class="input-group-text" 
                                            id="inputGroupPrepend">
                                            03-
                                            </span>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                name="txtSearch" 
                                                id="txtSearch" 
                                                placeholder="Employee Number" 
                                                value="" 
                                                style="text-transform: uppercase;" 
                                                onkeypress="return NumberOnly(event)" 
                                                tabindex="1"
                                                required
                                            >
                                            <div 
                                                class="invalid-feedback" 
                                                id ="CheckIDmessage">
                                                Please enter Employee Number
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button 
                                            type="submit" 
                                            class="form-control btn btn-info" 
                                            id="btn_search" 
                                            name="btn_search">
                                            SEARCH 
                                                <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div 
              id="ContentTip"
              class="alert alert-primary fade show" 
              role="alert" 
              >
                  <h4 class="alert-heading">
                    Notice!
                  </h4>
                  <p>
                      The entered employee number belongs to 
                    <i 
                      style="color:black; font-weight:500; font-size:large;" 
                      id="FullName">
                    </i>.
                      If you encounter any issues with the provided number, 
                      please contact the Personnel Section for verification.
                  </p>
            </div>
          </div>  
          <div class="row justify-content-center" hidden>
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <form class="row g-3 needs-validation">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="includes/scripts.js" async defer></script>
  <script src="pluginscript.js"></script>
<?php
 include 'modal/registermodal.php';
?>
</body>

</html>