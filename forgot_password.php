<?php
  session_start();
  require_once('../config/init.php');
  $_SESSION["token"] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=TITLE?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=PROOT?>assets/img/favicon.png" rel="icon">
  <link href="<?=PROOT?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=PROOT?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=PROOT?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=PROOT?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=PROOT?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=PROOT?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=PROOT?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=PROOT?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=PROOT?>assets/css/style.css" rel="stylesheet">
</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                    <p class="text-center small">Enter your email to reset your password</p>
                  </div>
                  <form class="row g-3 needs-validation" method="POST" action="forgot_password_action.php" novalidate>
                    <div class="col-12">
                      <label for="email" class="form-label">Employee Number</label>
                      <input type="text" name="empno" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                    
                    <input type="hidden" name="token" value="<?=$_SESSION["token"]?>">
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Send Reset Link</button>
                    </div>
                  </form>
                  <?= Session::displayMessage();?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <script src="<?=PROOT?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
