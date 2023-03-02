<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Reset Password</title>
  <?php include 'include/navigation.php'; ?> 
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include 'include/nav_bar.php'; ?> 
      <?php include 'include/header.php'; ?> 
      <!-- Main Content -->
      <div class="main-content">

        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-5 col-lg-5">
                <div class="card">
                  <div class="card-header">
                    <h4>Reset Password</h4>
                  </div>
                  <form method="POST" action="<?php echo base_url(); ?>admin/resetPasswordData" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="password">New Password</label>
                          <input type="password" class="form-control" onchange="checkPass()" id="password" name="password" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="password_c">Confirm Password</label>
                          <input type="password" class="form-control" onchange="checkPass()" id="password_c" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="showPass" onchange="showPassword()">
                          <label class="form-check-label" for="showPass">Show Passowrd</label>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" id="restBtn" type="submit" disabled>Reset Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
    </div>

    <?php include 'include/footer.php'; ?> 
  </div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>application_res/admin/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>application_res/admin/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>application_res/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>application_res/admin/bundles/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>application_res/admin/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>application_res/admin/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>application_res/admin/js/page/toastr.js"></script>
<!-- Template JS File -->
<script src="<?php echo base_url(); ?>application_res/admin/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>application_res/admin/js/custom.js"></script>

<script type="text/javascript">
  function showPassword() {
    if ($('#showPass').is(':checked')) {
      $("#password").prop('type','text');
      $("#password_c").prop('type','text');
    }else{
      $("#password").prop('type','password');
      $("#password_c").prop('type','password');
    }
  }

  function checkPass() {

    let pass1 = $('#password').val();
    let pass2 = $('#password_c').val();

    if (pass1 == pass2) {
      $("#restBtn").removeAttr("disabled");
    }else{
      $("#restBtn").attr("disabled",'');
    }

  }
</script>


<?php if($this->session->flashdata('partnerSuccess')){ ?>
  <script type="text/javascript">
    iziToast.success({
      message: '<?php echo $this->session->flashdata('partnerSuccess'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

<?php if($this->session->flashdata('partnerError')){ ?>
  <script type="text/javascript">
    iziToast.error({
      message: '<?php echo $this->session->flashdata('partnerError'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

</body>

</html>