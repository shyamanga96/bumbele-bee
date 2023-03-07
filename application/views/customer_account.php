<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Account</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'include/navigation.php'; ?> 


    <body class="sticky-header">
       <?php include 'include/header.php'; ?>
       <main class="main-wrapper">
        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                        <a class="nav-item nav-link" href="<?php echo base_url(); ?>user/customerLogout"><i class="fal fa-sign-out"></i>Logout</a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                             <?php if($this->session->flashdata('order_placed')){ ?>
                                <div class="alert alert-success" role="alert">
                                  <?php echo $this->session->flashdata('order_placed'); ?>
                              </div>
                          <?php } ?>

                          <?php if($this->session->flashdata('user_update')){ ?>
                            <div class="alert alert-success" role="alert">
                              <?php echo $this->session->flashdata('user_update'); ?>
                          </div>
                      <?php } ?>


                      <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                        <div class="axil-dashboard-overview">
                            <div class="welcome-text">Hello Annie (not <span>Annie?</span> <a href="<?php echo base_url(); ?>user/customerLogout">Log Out</a>)</div>
                            <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                        <div class="axil-dashboard-order">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $key => $order) { ?>
                                            <tr>
                                                <th scope="row">#<?php echo $order->id ?></th>
                                                <td><?php echo date_format(new DateTime('today'),"Y-m-d") ?></td>
                                                <td><?php echo $order->type ?></td>
                                                <td>Rs.<?php echo number_format($order->total) ?></td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-account" role="tabpanel">
                        <div class="col-lg-9">
                            <div class="axil-dashboard-account">
                                <form class="account-details-form" method="POST" action="<?php echo base_url(); ?>customer/accountDataUpdateById">
                                  <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>First Name <span>*</span></label>
                                            <input type="text" id="f_name" name="f_name" required value="<?php if (isset($customer)) {
                                                echo $customer->f_name;
                                            }  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Last Name <span>*</span></label>
                                            <input type="text" id="l_name" name="l_name" required value="<?php if (isset($customer)) {
                                                echo $customer->l_name;
                                            }  ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date of Birth<span>*</span></label>
                                            <input type="date" id="birthday" name="birthday" required value="<?php if (isset($customer)) {
                                                echo $customer->birthday;
                                            }  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                         <label>Country<span>*</span></label>
                                         <select id="country" name="country" required>
                                            <option value="Sri Lanka" <?php if (isset($customer)&& $customer->country == "Sri Lanka") {
                                                echo "selected";
                                            }  ?>>Sri Lanka</option>
                                            <option value="England" <?php if (isset($customer)&& $customer->country == "England") {
                                                echo "selected";
                                            }  ?>>England</option>
                                            <option value="New Zealand" <?php if (isset($customer)&& $customer->country == "New Zealand") {
                                                echo "selected";
                                            }  ?>>New Zealand</option>
                                            <option value="Switzerland" <?php if (isset($customer)&& $customer->country == "Switzerland") {
                                                echo "selected";
                                            }  ?>>Switzerland</option>
                                            <option value="United Kindom (UK)" <?php if (isset($customer)&& $customer->country == "United Kindom (UK)") {
                                                echo "selected";
                                            }  ?>>United Kindom (UK)</option>
                                            <option value="United States (USA)" <?php if (isset($customer)&& $customer->country == "United States (USA)") {
                                                echo "selected";
                                            }  ?>>United States (USA)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Street Address <span>*</span></label>
                                <input type="text" id="address1" name="address1" class="mb--15" placeholder="House number and street name" required value="<?php if (isset($customer)) {
                                    echo $customer->address1;
                                }  ?>">
                                <input type="text" id="address2" name="address2" placeholder="Apartment, suite, unit, etc. (optonal)" required value="<?php if (isset($customer)) {
                                    echo $customer->address2;
                                }  ?>">
                            </div>
                            <div class="form-group">
                                <label>Town/ City <span>*</span></label>
                                <input type="text" id="city" name="city" required value="<?php if (isset($customer)) {
                                    echo $customer->city;
                                }  ?>">
                            </div>
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="tel" id="contact_nu" name="contact_nu" required value="<?php if (isset($customer)) {
                                    echo $customer->contact_nu;
                                }  ?>">
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <input type="email" id="email" name="email" required value="<?php if (isset($customer)) {
                                    echo $customer->email;
                                }  ?>">
                            </div>
                            <div class="form-group mb-10">
                                <input type="submit" class="axil-btn" value="Update Data">
                            </div>

                        </form>
                   <!--      <div class="row">
                            <div class="col-12">
                                <h5 class="title">Password Change</h5>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="123456789101112131415">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group mb--0">
                                    <input type="submit" class="axil-btn" value="Save Changes">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- End My Account Area  -->

<!-- Start Axil Newsletter Area  -->
<div class="axil-newsletter-area axil-section-gap pt--0">
    <div class="container">
        <div class="etrade-newsletter-wrapper bg_image bg_image--5">
            <div class="newsletter-content">
                <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                <div class="input-group newsletter-form">
                    <div class="position-relative newsletter-inner mb--15">
                        <input placeholder="example@gmail.com" type="text">
                    </div>
                    <button type="submit" class="axil-btn mb--15">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End .container -->
</div>
<!-- End Axil Newsletter Area  -->
</main>
<?php include 'include/footer.php'; ?>


    <!-- JS
        ============================================ -->
        <!-- Modernizer JS -->
        <script src="<?php echo base_url(); ?>application_res/js/vendor/modernizr.min.js"></script>
        <!-- jQuery JS -->
        <script src="<?php echo base_url(); ?>application_res/js/vendor/jquery.js"></script>
        <!-- Bootstrap JS -->
        <script src="<?php echo base_url(); ?>application_res/js/vendor/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/slick.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/js.cookie.js"></script>
        <!-- <script src="<?php echo base_url(); ?>application_res/js/vendor/jquery.style.switcher.js"></script> -->
        <script src="<?php echo base_url(); ?>application_res/js/vendor/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/jquery.countdown.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/sal.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/counterup.js"></script>
        <script src="<?php echo base_url(); ?>application_res/js/vendor/waypoints.min.js"></script>

        <!-- Main JS -->
        <script src="<?php echo base_url(); ?>application_res/js/main.js"></script>

    </body>

    </html>