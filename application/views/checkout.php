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
            <form method="POST" action="<?php echo base_url(); ?>pages/placeOrder" >
                <div class="row">
                    <div class="col-lg-6">
                        <?php if (!isset($customer)) { ?>
                            <div class="axil-checkout-notice">
                                <div class="axil-toggle-box">
                                    <div class="toggle-bar"><i class="fas fa-user"></i> Returning customer? <a href="javascript:void(0)" class="toggle-btn">Click here to login <i class="fas fa-angle-down"></i></a>
                                    </div>
                                    <div class="axil-checkout-login toggle-open">
                                        <p>If you didn't Logged in, Please Log in first.</p>
                                        <div class="signin-box">
                                            <div class="form-group mb--0">
                                             <a href="<?php echo base_url(); ?>sign-in"><button type="button" class="axil-btn btn-bg-primary submit-btn">Sign In</button></a> 
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>

                     <div class="axil-checkout-billing">
                        <h4 class="title mb--40">Billing details</h4>
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
                    <?php if (!isset($customer)) { ?>
                        <div class="form-group input-group">
                            <label>Password <span>*</span></label>
                            <input type="password" id="password" name="password" required>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label>Other Notes (optional)</label>
                        <textarea id="notes" name="notes" rows="2" placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
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
                               <?php foreach ($this->cart->contents() as $item) { ?>
                                <tr class="order-product">
                                    <td><?php echo $item['name']; ?> <span class="quantity"><strong>x <?php echo $item['qty']; ?></strong></span></td>
                                    <td>Rs.<?php echo $item['qty']*$item['price']; ?></td>
                                </tr>
                            <?php } ?>
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
                                <td class="order-total-amount">Rs.<?php echo number_format($this->cart->total()); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="order-payment-method">
                    <div class="single-payment">
                        <div class="input-group">
                            <input type="radio" id="radio5" name="payment" value="COD" checked>
                            <label for="radio5">Cash on delivery</label>
                        </div>
                        <p>Pay with cash upon delivery.</p>
                    </div>
                    <div class="single-payment">
                        <div class="input-group">
                            <input type="radio" id="radio4" name="payment" value="installment" <?php if ($age === 0) {
                                echo "disabled";
                            }  ?>>
                            <label for="radio4" style="<?php if ($age === 0) {
                                echo "color: #909095 !important;";
                            }  ?>">Buy Now Pay Later (Installment : Rs.<?php echo number_format($this->cart->total()/3); ?>)</label>
                        </div>
                        <p>Pay in 3 interest free installments. - (Age 18+ only)</p>
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