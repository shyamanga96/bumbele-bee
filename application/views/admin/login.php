<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>application_res/admin/css/app.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>application_res/admin/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>application_res/admin/bundles/izitoast/css/iziToast.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>application_res/admin/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>application_res/admin/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>application_res/admin/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url(); ?>application_res/admin/img/favicon.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img style="margin-top: 0px !important;" width="150" src="<?php echo base_url(); ?>application_res/images/logo/logo.png"><br>
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h4>Admin Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url(); ?>user/logincheck" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">User Name</label>
                    <input id="username" type="text" class="form-control" name="userName" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your user name
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Copyright &copy; <?php echo date('Y'); ?> BumbleBee, All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/page/toastr.js"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/custom.js"></script>

  <?php if($this->session->flashdata('login_error')){ ?>
    <script type="text/javascript">
      iziToast.error({
        message: '<?php echo $this->session->flashdata('login_error'); ?>',
        position: 'topRight'
      });
    </script>
  <?php } ?>

</body>

</html>