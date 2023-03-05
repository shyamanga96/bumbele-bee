<!-- Start Footer Area  -->
<footer class="axil-footer-area footer-style-2">
  <!-- Start Copyright Area  -->
  <div class="copyright-area copyright-default separator-top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-4">
          <div class="social-share">
            <a href="javascript:void"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:void"><i class="fab fa-instagram"></i></a>
            <a href="javascript:void"><i class="fab fa-twitter"></i></a>
            <a href="javascript:void"><i class="fab fa-linkedin-in"></i></a>
            <a href="javascript:void"><i class="fab fa-discord"></i></a>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12">
          <div class="copyright-left d-flex flex-wrap justify-content-center">
            <ul class="quick-link">
              <li>© 2023. All rights reserved by Bumble Bee.</li>
            </ul>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12">
          <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
            <span class="card-text">Accept For</span>
            <ul class="payment-icons-bottom quick-link">
              <li><img src="<?php echo base_url(); ?>application_res/images/icons/cart/cart-1.png" alt="paypal cart"></li>
              <li><img src="<?php echo base_url(); ?>application_res/images/icons/cart/cart-2.png" alt="paypal cart"></li>
              <li><img src="<?php echo base_url(); ?>application_res/images/icons/cart/cart-5.png" alt="paypal cart"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Copyright Area  -->
</footer>
<!-- End Footer Area  -->



<div class="cart-dropdown" id="cart-dropdown">
  <div class="cart-content-wrap">
    <div class="cart-header">
      <h2 class="header-title">Cart review</h2>
      <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
    </div>

    <?php if (count($this->cart->contents())>0) { ?>

      <div class="cart-body">
        <ul class="cart-item-list">
         <?php foreach ($this->cart->contents() as $item) { ?>
          <li class="cart-item">
            <div class="item-img">
              <a href="single-product.html"><img src="<?php echo base_url().$item['image']; ?>" alt="Product Image"></a>
              <a href="<?php echo base_url(); ?>pages/deleteItemFromCart/<?php echo $item['rowid']; ?>"><button class="close-btn"><i class="fas fa-times"></i></button></a>
            </div>
            <div class="item-content">
              <h3 class="item-title"><a href="single-product-3.html"><?php echo $item['name']; ?></a></h3>
              <div class="item-price"><span class="currency-symbol">Rs.</span><?php echo $item['price']; ?></div>
              <div class="item-quantity">
                <span style="font-size: 19px;color: #292930;"><strong><?php echo $item['qty']; ?></strong></span>
              </div>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class="cart-footer">
      <h3 class="cart-subtotal">
        <span class="subtotal-title">Subtotal:</span>
        <span class="subtotal-amount">Rs.<?php echo number_format($this->cart->total()); ?></span>
      </h3>
      <div class="group-btn">
        <a href="<?php echo base_url(); ?>cart" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
        <a href="<?php echo base_url(); ?>checkout" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
      </div>
    </div>
  <?php }else{ ?>
    <h4 style="margin-top:30px">Your Cart is Empty</h4>
  <?php } ?>
</div>
</div>

<div class="closeMask"></div>