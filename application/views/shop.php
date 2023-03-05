<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 16:50:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'include/navigation.php'; ?> 

</head>


<body class="sticky-header">

   <?php include 'include/header.php'; ?>


   <main class="main-wrapper">
    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="axil-shop-top">
                        <div class="row">
                            <div class="col-lg-9">
                            </div>
                            <div class="col-lg-3">
                                <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                    <!-- Start Single Select  -->
                                    <select class="single-select">
                                        <option>Sort by Latest</option>
                                        <option>Sort by Name</option>
                                        <option>Sort by Price</option>
                                        <option>Sort by Viewed</option>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row--15">
                <?php foreach ($products as $key => $product) { ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img src="<?php echo base_url().$product->cover_image; ?>" alt="Product Images">
                                </a>
                                <?php if($product->discount != 0) { ?>
                                    <div class="label-block label-right">
                                        <div class="product-badget"><?php echo $product->discount; ?>% OFF</div>
                                    </div>
                                <?php } ?>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html"><?php echo $product->name; ?></a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">Rs.<?php
                                        echo $product->price-($product->price*($product->discount/100)); 
                                    ?></span>
                                    <?php if($product->discount != 0) { ?>
                                        <span class="price old-price">Rs.<?php echo $product->price; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- End Single Product  -->

        </div>
           <!--  <div class="text-center pt--30">
                <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
            </div> -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->
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


    <!-- Mirrored from new.axilthemes.com/demo/template/etrade/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Mar 2023 16:50:57 GMT -->
    </html>