<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'include/navigation.php'; ?> 

</head>


<body class="sticky-header">
  <?php include 'include/header.php'; ?>

  <main class="main-wrapper">

    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fas fa-user"></i> Returning customer? <a href="javascript:void(0)" class="toggle-btn">Click here to login <i class="fas fa-angle-down"></i></a>
                                </div>
                                <div class="axil-checkout-login toggle-open">
                                    <p>If you didn't Logged in, Please Log in first.</p>
                                    <div class="signin-box">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group mb--0">
                                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" id="first-name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" id="last-name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date of Birth<span>*</span></label>
                                        <input type="date" id="first-name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                     <label>Country<span>*</span></label>
                                     <select id="country" name="country" required>
                                        <option value="Sri Lanka" selected>Sri Lanka</option>
                                        <option value="England">England</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="United Kindom (UK)">United Kindom (UK)</option>
                                        <option value="United States (USA)">United States (USA)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Street Address <span>*</span></label>
                            <input type="text" id="address1" class="mb--15" placeholder="House number and street name">
                            <input type="text" id="address2" placeholder="Apartment, suite, unit, etc. (optonal)">
                        </div>
                        <div class="form-group">
                            <label>Town/ City <span>*</span></label>
                            <input type="text" id="town">
                        </div>
                        <div class="form-group">
                            <label>Phone <span>*</span></label>
                            <input type="tel" id="phone">
                        </div>
                        <div class="form-group">
                            <label>Email Address <span>*</span></label>
                            <input type="email" id="email">
                        </div>
                        <div class="form-group input-group">
                            <label>Password <span>*</span></label>
                            <input type="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Other Notes (optional)</label>
                            <textarea id="notes" rows="2" placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">Your Order</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="order-product">
                                        <td>Commodo Blown Lamp <span class="quantity">x1</span></td>
                                        <td>$117.00</td>
                                    </tr>
                                    <tr class="order-product">
                                        <td>Commodo Blown Lamp <span class="quantity">x1</span></td>
                                        <td>$198.00</td>
                                    </tr>
                                    <tr class="order-subtotal">
                                        <td>Subtotal</td>
                                        <td>$117.00</td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td colspan="2">
                                            <div class="shipping-amount">
                                                <span class="title">Shipping Method</span>
                                                <span class="amount">Free Shippping</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount">$323.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="radio5" name="payment">
                                    <label for="radio5">Cash on delivery</label>
                                </div>
                                <p>Pay with cash upon delivery.</p>
                            </div>
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="radio4" name="payment" checked>
                                    <label for="radio4">Buy Now Pay Later</label>
                                </div>
                                <p>Pay in 3 interest free installments.</p>
                            </div>

                        </div>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Checkout Area  -->

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