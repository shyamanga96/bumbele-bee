<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Order Details</title>
  <?php include 'include/navigation.php'; ?> 
  <style type="text/css">
    .form-group {
      margin-bottom: 10px;
    }
  </style>
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
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>User Info</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">First Name : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->customerDetails->f_name;  ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Last Name : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->customerDetails->l_name;  ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Contact Number : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->customerDetails->contact_nu;  ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Birthday : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo date('Y-m-d', strtotime($dataset->customerDetails->birthday)) ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Country : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->customerDetails->country; ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Address : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->customerDetails->address1; ?>,<?php echo $dataset->customerDetails->address2; ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">City : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->customerDetails->city; ?></span>
                      </div>
                    </div>
                    <hr>
                    <h5 style="padding-bottom: 10px;">Billing Details</h5>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Contact Number : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->contact_nu;  ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Country : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->country; ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Address : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->address1; ?>,<?php echo $dataset->address2; ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">City : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->city; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Order Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Type : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->type; ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Total : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo number_format($dataset->total,2); ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Order Date : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->d_date; ?></span>
                      </div>
                    </div>
                    <?php if ($dataset->type=='installment') { ?>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Installment : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo number_format($dataset->installment,2); ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Next Installment : </label>
                      <div class="col-sm-8">
                        <span style="font-size: 15px;"><?php echo $dataset->next_pay_date; ?></span>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4" style="font-size: 15px;">Note : </label>
                    <div class="col-sm-8">
                      <p style="font-size: 15px;"><?php echo $dataset->notes; ?></p>
                    </div>
                  </div>
                  <hr>
                  <h5 style="padding-bottom: 10px;">Order Management</h5>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Admin Note</label>
                      <textarea class="form-control" id="note_admin"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Status</label>
                      <select class="form-control" id="o_status">
                        <option value="processing">Processing</option>
                        <option value="deliverd">Deliverd</option>
                        <option value="on_hold">On hold</option>
                        <option value="completed">Completed</option>
                        <option value="refunded">Refunded</option>
                      </select>
                    </div>
                    <div class="col-12" style="display: flex;justify-content: end;">
                     <a href="http://localhost/bumble-bee/admin/orderDetails/4" class="btn btn-primary" target="_blank">Detail</a>
                   </div>
                   
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