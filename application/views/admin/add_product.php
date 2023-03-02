<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Manage Gallery Images</title>
  <?php include 'include/navigation.php'; ?> 
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url(); ?>application_res/admin/img/favicon.ico' />
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
                  <form action="<?php echo base_url(); ?>admin/addGalleryImages" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Add Product Details</h4>
                    </div>
                    <div class="card-body">
                     <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Price(Rs)</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Discount(%)</label>
                        <input type="number" class="form-control" id="discount" name="discount" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Cover Image</label>
                      <input type="file" name="c_image" id="c_image" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Images</label>
                      <input type="file" name="images[]" id="images[]" class="form-control" multiple required>
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Add Images</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7">
              <div class="card">
                <div class="card-header">
                  <h4>All Products</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-gallery">
                      <thead>
                        <tr>
                          <th class="text-center">Image</th>
                          <th class="text-center">Name</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($images as $data) { ?>
                          <tr>
                            <td class="text-center"><img alt="image" src="<?php echo base_url().$data->image;  ?>" height="80"></td>
                            <td class="text-center"><?php echo $data->width;  ?></td>
                            <td width="40%" class="text-center">
                              <a href="<?php echo base_url(); ?>admin/deleteGalleryItemDetailsById/<?php echo $data->id;  ?>" class="btn btn-icon btn-danger" onclick="return deleteItem()"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Design & Developed By <a href="https://www.codexivelk.com/">Codexive</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?php echo base_url(); ?>admin/adminResetPassword" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reset Passwod</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">New</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="new_password" id="myInput2" required>
                <input type="hidden" name="resetPassId" id="resetPassId">
                <div class="form-check" style="padding-top: 8px;">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheckRe" onclick="showPass2()">
                    <label class="custom-control-label" for="customCheckRe">Show Password</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/echart/echarts.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/chartjs/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/page/index.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/js/page/toastr.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/page/datatables.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/custom.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#table-gallery').DataTable( {
        "ordering": false
      });

      t.draw();
    } );

  </script>


  <script type="text/javascript">
   function deleteItem() {
    if (confirm("Are you sure?")) {
      return true;
    }
    return false;
  }
</script>

<?php if($this->session->flashdata('gallerySuccess')){ ?>
  <script type="text/javascript">
    iziToast.success({
      message: '<?php echo $this->session->flashdata('gallerySuccess'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

<?php if($this->session->flashdata('galleryError')){ ?>
  <script type="text/javascript">
    iziToast.error({
      message: '<?php echo $this->session->flashdata('galleryError'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

</body>

</html>