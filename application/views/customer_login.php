<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'include/navigation.php'; ?> 

</head>


<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="<?php echo base_url(); ?>" class="site-logo"><img src="<?php echo base_url(); ?>application_res/images/logo/logo.png" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Not a member?</p>
                        <a href="<?php echo base_url(); ?>sign-up" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--9">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Sign in to BumbeleBee.</h3>
                        <?php if($this->session->flashdata('login_error')){ ?>
                            <div class="alert alert-danger" role="alert">
                              Invalid Username or Password!
                          </div>
                      <?php } ?>
                      <p class="b2 mb--55">Enter your detail below</p>
                      <form class="singin-form needs-validation" method="POST" action="<?php echo base_url(); ?>user/customerLoginCheck" novalidate="">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-end">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                            <!-- <a href="forgot-password.html" class="forgot-btn">Forget password?</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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