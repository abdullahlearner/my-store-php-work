<?php
$errors = isset($_GET['errors']) ? $_GET['errors'] : [];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="assets/images/logo-dark.svg">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" action="action/reg_action.php" method="post">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                        <?php
                    if (isset($errors['username_error'])) {?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['username_error']; ?>
                      </div>
                        <?php
                        }
                      ?>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                    <?php
                    if (isset($errors['email_error'])) {?>

                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['email_error']; ?>
                      </div>

                        <?php
                        }

?>   
                  </div>
                  <div class="form-group">
                    <select name="country" class="form-control form-control-lg" id="exampleFormControlSelect2">
                      <option>Country</option>
                      <option>United States of America</option>
                      <option>United Kingdom</option>
                      <option>India</option>
                      <option>Germany</option>
                      <option>Argentina</option>
                    </select>
                    <?php
                    if (isset($errors['country_error'])) {?>

                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['country_error']; ?>
                      </div>
                      
                        <?php
                        }

?>   
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                    <?php
                    if (isset($errors['password_error'])) {?>

                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['password_error']; ?>
                      </div>
                      
                        <?php
                        }

?>   
                  </div>
                  <div class="form-group">
                    <input type="password" name="cpassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confrom Password">
                    <?php
                    if (isset($errors['cpassword_error'])) {?>

                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['cpassword_error']; ?>
                      </div>
                      
                        <?php
                        }

?>      
 <?php
                    if (isset($errors['password_match_error'])) {?>

                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['password_match_error']; ?>
                      </div>
                      
                        <?php
                        }

?>      
                  </div>
                  <div class="form-group">
                    <input type="number" name="cellno" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Cell No">
                    <?php
                    if (isset($errors['cellno_error'])) {?>

                        <div class="alert alert-danger" role="alert">
                          <?php echo $errors['cellno_error']; ?>
                      </div>
                      
                        <?php
                        }

?>      
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit"/>

                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.html" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>