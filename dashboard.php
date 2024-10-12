<?php
include_once "header.php";

?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p><?php echo "Welcome ". $_SESSION['email']  ?> </p>
          
                  <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
              </div>
            </div>
          </div>
          <?php

include_once "footer.php";

?>