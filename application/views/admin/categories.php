<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Categories</title>
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
                  <form action="<?php echo base_url(); ?>admin/addCategoryData" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Add Product Category</h4>
                    </div>
                    <div class="card-body">
                     <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" id="image" class="form-control" required>
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Add Category</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7">
              <div class="card">
                <div class="card-header">
                  <h4>All Categories</h4>
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
                        <?php foreach ($categories as $data) { ?>
                          <tr>
                            <td class="text-center"><img alt="image" src="<?php echo base_url().$data->image;  ?>" height="80"></td>
                            <td class="text-center"><?php echo $data->name;  ?></td>
                            <td width="40%" class="text-center">
                              <a href="javascript:void(0)" onclick="categoryEdit(<?php echo $data->id;  ?>,'<?php echo $data->name;  ?>')" class="btn btn-primary">Edit</a>
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
          Copyright &copy; 2021 <div class="bullet"></div> Design & Developed By @shyamanga96
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?php echo base_url(); ?>admin/editCategory" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-12">
             <div class="form-group">
              <label>Name</label>
              <input type="text" name="e_name" id="e_name" class="form-control">
            </div>
            <div class="form-group">
              <label>Image</label>
              <input type="file" name="e_image" id="e_image" class="form-control">
              <input type="hidden" name="c_id" id="c_id">
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
  function categoryEdit(id,name) {
    $('#c_id').val(id);
    $('#e_name').val(name);
    $('#category_modal').modal('show');
  }
</script>

<?php if($this->session->flashdata('categorySuccess')){ ?>
  <script type="text/javascript">
    iziToast.success({
      message: '<?php echo $this->session->flashdata('categorySuccess'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

<?php if($this->session->flashdata('categoryError')){ ?>
  <script type="text/javascript">
    iziToast.error({
      message: '<?php echo $this->session->flashdata('categoryError'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

</body>

</html>