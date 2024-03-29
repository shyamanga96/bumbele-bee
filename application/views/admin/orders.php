<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Orders</title>
  <?php include 'include/navigation.php'; ?> 
  <style type="text/css">
    #cheque_number{
      display: none;
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

            <div class="row ">
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-green-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i style="font-size: 70px;" class="fa fa-clipboard-list"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Total Orders</h4>
                      <span><?php echo $total_sales;  ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cyan-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i style="font-size: 70px;" class="fa fa-money-bill-alt"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Income</h4>
                      <span>LKR <?php echo number_format($total_income->total,2);  ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-purple-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i style="font-size: 70px;" class="fa fa-user-alt"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Total Customers</h4>
                      <span><?php echo $total_customers;  ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-orange-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i style="font-size: 70px;" class="fa fa-shopping-basket"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Total Products</h4>
                      <span><?php echo $total_products;  ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Items 2 -->

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>All Orders</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="all_v">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Customer Name</th>
                              <th class="text-center">Contact</th>
                              <th class="text-center">Total</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Date</th>
                              <th class="text-center" width="13%">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($orders as $order) { ?>
                              <tr>
                                <td class="text-center">#<?php echo $order->id;  ?></td>
                                <td><?php echo $order->customer->f_name;  ?> <?php echo $order->customer->l_name;  ?></td>
                                <td><?php echo $order->customer->contact_nu;  ?></td>
                                <td>Rs.<?php echo number_format($order->total,2);  ?></td>
                                <td class="text-center"><?php if ($order->status=='processing') {
                                  echo '<span class="badge badge-primary">Processing</span>';
                                }elseif ($order->status=='deliverd') {
                                  echo '<span class="badge badge-secondary">Deliverd</span>';
                                }elseif ($order->status=='on_hold') {
                                  echo '<span class="badge badge-warning">On Hold</span>';
                                }elseif ($order->status=='completed') {
                                  echo '<span class="badge badge-success">Completed</span>';
                                }elseif ($order->status=='refunded') {
                                  echo '<span class="badge badge-light">Refunded</span>';
                                } ?></td>
                                <td><?php echo date_format(date_create($order->d_date),"Y-m-d");  ?></td>
                                <td style="padding-left: 1.5%;"><a href="<?php echo base_url(); ?>admin/orderDetails/<?php echo $order->id;  ?>" class="btn btn-primary" target="_blank">Detail</a>&nbsp;&nbsp;

                                  <a href="#" class="btn btn-icon btn-danger" onclick="return deleteItem()"><i class="fas fa-trash-alt"></i></a>

                                </td>

                              </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
        <!--           <form action="<?php echo base_url(); ?>admin/printData" method="post" enctype="multipart/form-data" id ="print">
                    <div class="card-footer text-right">
                      <input name="selectedIds" id="selectedIds" type="hidden" class="form-control">
                      <button class="btn btn-warning mr-1" type="submit" id="print">Print</button>
                    </div>
                  </form -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2019 <div class="bullet">Design & Developed By @shyamanga96
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/page/datatables.js"></script>
  <script src="<?php echo base_url(); ?>application_res/admin/js/page/forms-advanced-forms.js"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>application_res/admin/js/custom.js"></script>

  <script type="text/javascript">
   function deleteItem() {
    if (confirm("Are you sure?")) {
      return true;
    }
    return false;
  }
</script>

<script type="text/javascript">
  $('#all_v').DataTable({
   "ordering": false
 });
</script>

</body>

</html>