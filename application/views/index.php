<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bumble Bee</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'include/navigation.php'; ?> 

</head>


<body class="sticky-header newsletter-popup-modal">

    <?php include 'include/header.php'; ?>

    <main class="main-wrapper">
        <!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-2">
            <div class="container">
                <div class="">
                    <div class="row row--20">
                        <div class="col-lg-9">
                            <div class="slider-box-wrap">
                                <div class="slider-activation-one axil-slick-dots">
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <span class="subtitle"><i class="fal fa-watch"></i> Smartwatch</span>
                                            <h1 class="title">Bloosom Smat Watch</h1>
                                            <div class="shop-btn">
                                                <a href="<?php echo base_url(); ?>shop" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img src="<?php echo base_url(); ?>application_res/images/product/product-40.png" alt="Product">
                                        </div>
                                    </div>
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <span class="subtitle"><i class="fal fa-watch"></i> Smartwatch</span>
                                            <h1 class="title">Delux Brand Watch</h1>
                                            <div class="shop-btn">
                                                <a href="<?php echo base_url(); ?>shop" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img src="<?php echo base_url(); ?>application_res/images/product/product-46.png" alt="Product">
                                        </div>
                                    </div>
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <span class="subtitle"><i class="fal fa-watch"></i> Smartwatch</span>
                                            <h1 class="title">Bloosom Smat Watch</h1>
                                            <div class="shop-btn">
                                                <a href="<?php echo base_url(); ?>shop" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img src="<?php echo base_url(); ?>application_res/images/product/product-40.png" alt="Product">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="slider-product-box">
                                <div class="product-thumb">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>application_res/images/product/product-41.png" alt="Product">
                                    </a>
                                </div>
                                <h6 class="title"><a href="#">Yantiti Leather Bags</a></h6>
                                <span class="price">Rs.2,500</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->



        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
                    <h2 class="title">Explore our Products</h2>
                </div>
                <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">
                           <?php foreach ($products as $key => $product) { ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="axil-product product-style-one has-color-pick mt--40">
                                    <div class="thumbnail">
                                        <a href="<?php echo base_url(); ?>pages/productDetails/<?php echo $product->id; ?>">
                                            <img src="<?php echo base_url().$product->cover_image; ?>" alt="Product Images">
                                        </a>
                                        <?php if($product->discount != 0) { ?>
                                            <div class="label-block label-right">
                                                <div class="product-badget"><?php echo $product->discount; ?>% OFF</div>
                                            </div>
                                        <?php } ?>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="select-option"><a href="<?php echo base_url(); ?>pages/addToCart/<?php echo $product->id; ?>">Add to Cart</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="<?php echo base_url(); ?>pages/productDetails/<?php echo $product->id; ?>"><?php echo $product->name; ?></a></h5>
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
                </div>
            </div>
            <!-- End .slick-single-layout -->
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt--20 mt_sm--0">
                <a href="<?php echo base_url(); ?>shop" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
            </div>
        </div>

    </div>
</div>
<!-- End Expolre Product Area  -->
<!-- Poster Countdown Area  -->
<div class="axil-poster-countdown">
    <div class="container">
        <div class="poster-countdown-wrap bg-lighter">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="poster-countdown-content">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-secondary"> <i class="fal fa-headphones-alt"></i> Don’t Miss!!</span>
                            <h2 class="title">Enhance Your Music Experience</h2>
                        </div>
                        <div class="poster-countdown countdown mb--40"></div>
                        <a href="#" class="axil-btn btn-bg-primary">Check it Out!</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="poster-countdown-thumbnail">
                        <img src="<?php echo base_url(); ?>application_res/images/product/poster/poster-03.png" alt="Poster Product">
                        <div class="music-singnal">
                            <div class="item-circle circle-1"></div>
                            <div class="item-circle circle-2"></div>
                            <div class="item-circle circle-3"></div>
                            <div class="item-circle circle-4"></div>
                            <div class="item-circle circle-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Poster Countdown Area  -->


<!-- Start Axil Product Poster Area  -->
<div class="axil-poster">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb--30">
                <div class="single-poster">
                    <a href="<?php echo base_url(); ?>shop">
                        <img src="<?php echo base_url(); ?>application_res/images/product/poster/poster-01.png" alt="eTrade promotion poster">
                        <div class="poster-content">
                            <div class="inner">
                                <h3 class="title">Rich sound, <br> for less.</h3>
                                <span class="sub-title">Collections <i class="fal fa-long-arrow-right"></i></span>
                            </div>
                        </div>
                        <!-- End .poster-content -->
                    </a>
                </div>
                <!-- End .single-poster -->
            </div>
            <div class="col-lg-6 mb--30">
                <div class="single-poster">
                    <a href="shop-sidebar.html">
                        <img src="<?php echo base_url(); ?>application_res/images/product/poster/poster-02.png" alt="eTrade promotion poster">
                        <div class="poster-content content-left">
                            <div class="inner">
                                <span class="sub-title">50% Offer In Winter</span>
                                <h3 class="title">Get VR <br> Reality Glass</h3>
                            </div>
                        </div>
                        <!-- End .poster-content -->
                    </a>
                </div>
                <!-- End .single-poster -->
            </div>
        </div>
    </div>
</div>
<!-- End Axil Product Poster Area  -->

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


<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?php echo base_url(); ?>application_res/images/icons/service1.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Fast &amp; Secure Delivery</h6>
                        <p>Tell about your service.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?php echo base_url(); ?>application_res/images/icons/service2.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Money Back Guarantee</h6>
                        <p>Within 10 days.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?php echo base_url(); ?>application_res/images/icons/service3.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">24 Hour Return Policy</h6>
                        <p>No question ask.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?php echo base_url(); ?>application_res/images/icons/service4.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Pro Quality Support</h6>
                        <p>24/7 Live support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php'; ?>
<!-- Offer Modal End -->
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