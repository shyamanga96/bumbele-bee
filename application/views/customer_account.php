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
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>On Hold</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">#6523</th>
                                                        <td>September 10, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$326.63 for 3 items</td>
                                                        <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <form class="account-details-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" value="Annie">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" value="Mario">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group mb--40">
                                                            <label>Country/ Region</label>
                                                            <select class="select2">
                                                                <option value="1">United Kindom (UK)</option>
                                                                <option value="1">United States (USA)</option>
                                                                <option value="1">United Arab Emirates (UAE)</option>
                                                                <option value="1">Australia</option>
                                                            </select>
                                                            <p class="b3 mt--10">This will be how your name will be displayed in the account section and in reviews</p>
                                                        </div>
                                                    </div>
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
                                                </div>
                                            </form>
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