<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Product</title>
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
                  <form action="<?php echo base_url(); ?>admin/editProductDetailsData/<?php echo $dataset->id;  ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Edit Product Details</h4>
                    </div>
                    <div class="card-body">
                     <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" id="name" value="<?php echo $dataset->name;?>" class="form-control" required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Price(Rs)</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $dataset->price;?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Discount(%)</label>
                        <input type="number" class="form-control" id="discount" value="<?php echo $dataset->discount;?>" name="discount">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="category_id" id="category_id">
                        <?php foreach ($categories as $key => $data) { ?>
                          <option value="<?php echo $data->id; ?>" <?php if ($data->id == $dataset->category_id) {
                            echo "selected";
                          } ?>><?php echo $data->name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" required><?php echo $dataset->description;?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Cover Image</label>
                      <input type="file" name="c_image" id="c_image" class="form-control">
                      <img alt="image" style="padding-top: 10px;" src="<?php echo base_url().$dataset->cover_image;  ?>" height="200">
                    </div>
                    <div class="form-group">
                      <label>Images</label>
                      <input type="file" name="images[]" id="images[]" class="form-control" multiple>
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Update Product</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7">
              <div class="card">
                <div class="card-header">
                  <h4>Images</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-gallery">
                      <thead>
                        <tr>
                          <th class="text-center">ID</th>
                          <th class="text-center">Image</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($images as $key =>$data) { ?>
                          <tr>
                            <td class="text-center"><?php echo $key+1;  ?></td>
                            <td class="text-center"><img alt="image" src="<?php echo base_url().$data->image;  ?>" height="100"></td>
                            <td width="40%" class="text-center">
                              <a href="<?php echo base_url(); ?>admin/deleteProductImageById/<?php echo $data->id;  ?>/<?php echo $dataset->id;  ?>" class="btn btn-icon btn-danger" onclick="return deleteItem()"><i class="fas fa-trash-alt"></i></a></td>
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

<?php if($this->session->flashdata('productSuccess')){ ?>
  <script type="text/javascript">
    iziToast.success({
      message: '<?php echo $this->session->flashdata('productSuccess'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

<?php if($this->session->flashdata('productError')){ ?>
  <script type="text/javascript">
    iziToast.error({
      message: '<?php echo $this->session->flashdata('productError'); ?>',
      position: 'topRight'
    });
  </script>
<?php } ?>

</body>

</html>