<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mailo</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href=" <?php echo base_url('assets/vendors/mdi/css/materialdesignicons.min.css') ?> ">
    <link rel="stylesheet" href=" <?php echo base_url('assets/vendors/css/vendor.bundle.base.css') ?> ">
  
    <link rel="stylesheet" href=" <?php echo base_url('assets/css/style.css') ?> ">
    <!-- End layout styles -->
    <link rel="shortcut icon" href=" <?php echo base_url('assets/images/favicon.ico') ?> " />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <!-- <div class="brand-logo">
                  <img src=" <?php echo base_url('assets/images/logo.svg') ?> ">
                </div> -->
                            <h6 class="font-weight-light text-center"><b>Beta Advance Mailar</b></h6>
                            <!-- <h6 class="font-weight-light text-center">Sign in to continue.</h6> -->
                            <form class="pt-3" action="<?php echo base_url('LoginController/login') ?>" method="post">
                                <?php
                                $success = $this->session->userdata('success');
                                if($success!=""){?>
                                <div class="alert alert-success"><?php echo $success ?></div>
                                <?php } ?>

                                <?php
                                $failure = $this->session->userdata('failure');
                                if($failure!=""){?>
                                <div class="alert alert-danger"><?php echo $failure ?></div>
                                <?php } ?>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="username"
                                        placeholder="Enter Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        placeholder="Enter Password" required>
                                </div>
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                    </div> -->
                                <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                                <!-- </div> -->
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
    <script src=" <?php echo base_url('assets/vendors/js/vendor.bundle.base.js') ?> "></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src=" <?php echo base_url('assets/js/off-canvas.js') ?> "></script>
    <script src=" <?php echo base_url('assets/js/hoverable-collapse.js') ?> "></script>
    <script src=" <?php echo base_url('assets/js/misc.js') ?> "></script>
    <!-- endinject -->
</body>

</html>