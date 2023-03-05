    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <header class="header axil-header header-style-5">
      <!-- Start Mainmenu Area  -->
      <div id="axil-sticky-placeholder"></div>
      <div class="axil-mainmenu">
        <div class="container">
          <div class="header-navbar">
            <div class="header-brand">
              <a href="<?php echo base_url(); ?>" class="logo logo-dark">
                <img src="<?php echo base_url(); ?>application_res/images/logo/logo.png" alt="Site Logo">
              </a>
              <a href="<?php echo base_url(); ?>" class="logo logo-light">
                <img src="<?php echo base_url(); ?>application_res/images/logo/logo-light.png" alt="Site Logo">
              </a>
            </div>
            <div class="header-main-nav">
              <!-- Start Mainmanu Nav -->
              <nav class="mainmenu-nav">
                <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                <div class="mobile-nav-brand">
                  <a href="<?php echo base_url(); ?>" class="logo">
                    <img src="<?php echo base_url(); ?>application_res/images/logo/logo.png" alt="Site Logo">
                  </a>
                </div>
                <ul class="mainmenu">
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a href="<?php echo base_url(); ?>shop">Shop</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </nav>
              <!-- End Mainmanu Nav -->
            </div>
            <div class="header-action">
              <ul class="action-list">
                <li class="shopping-cart">
                  <a href="#" class="cart-dropdown-btn">
                    <span class="cart-count"><?php echo count($this->cart->contents()); ?></span>
                    <i class="flaticon-shopping-cart"></i>
                  </a>
                </li>
                <li class="my-account">
                  <a href="javascript:void(0)">
                    <i class="flaticon-person"></i>
                  </a>
                  <div class="my-account-dropdown">

                    <?php
                    $user_data = $this->session->userdata();
                    if (isset($user_data['email'])) { ?>
                     <span class="title">QUICKLINKS</span>
                     <ul>
                      <li>
                        <a href="<?php echo base_url(); ?>customer/account">My Account</a>
                      </li>
                    </ul>
                    <a href="<?php echo base_url(); ?>user/customerLogout" class="axil-btn btn-bg-secondary text-center">Logout</a>
                  <?php }else{ ?>
                    <a href="<?php echo base_url(); ?>sign-in" class="axil-btn btn-bg-primary text-center">Login</a>
                  <?php } ?>
                  <div class="reg-footer text-center" style="padding-top: 10px;">No account yet? <a href="<?php echo base_url(); ?>sign-up" class="btn-link">REGISTER HERE.</a></div>
                </div>
              </li>
              <li class="axil-mobile-toggle">
                <button class="menu-btn mobile-nav-toggler">
                  <i class="flaticon-menu-2"></i>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Mainmenu Area -->
  </header>