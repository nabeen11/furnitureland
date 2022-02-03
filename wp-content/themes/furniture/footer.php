<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furniture_Land
 */

?>
<!-- Footer Area Start -->
<div class="footer-area">
    <div class="footer-container">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                        <div class="single-wedge">
                            <h4 class="footer-herading">about us</h4>
                            <p class="about-text">Lorem ipsum dolor sit amet cons adipisicing elit sed do eiusm tempor
                                incididunt ut labor et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            </p>
                            <ul class="link-follow">
                                <li class="li">
                                    <a class="paypal icon-paypal m-0" title="Paypal" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="tumblr icon-social-tumblr" title="Tumblr" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="twitter icon-social-twitter" title="Twitter" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="pinterest icon-social-pinterest" title="Pinterest" href="#"></a>
                                </li>
                                <li class="li">
                                    <a class="linkedin icon-social-linkedin" title="Linkedin" href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-6 col-sm-6 col-lg-3 mb-md-30px mb-lm-30px" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="single-wedge">
                            <h4 class="footer-herading">information</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li">
                                            <a class="single-link" href="about.html">About us</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="#">Delivery Information</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="privacy-policy.html">Privacy & Policy</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="#">Manufactures</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-2 col-sm-6 mb-lm-30px" data-aos="fade-up" data-aos-delay="600">
                        <div class="single-wedge">
                            <h4 class="footer-herading">my account</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li">
                                            <a class="single-link" href="my-account.html">My
                                                Account</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="cart.html">My Cart</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="login.html">Login</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                        <div class="single-wedge">
                            <h4 class="footer-herading">newsletter</h4>
                            <div class="footer-links">
                                <!-- News letter area -->
                                <div id="mc_embed_signup" class="subscribe-form">
                                    <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank"
                                        name="mc-embedded-subscribe-form" method="post"
                                        action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input class="email" type="email" required="" placeholder="Your Mail*"
                                                name="EMAIL" value="" />
                                            <div class="mc-news" aria-hidden="true">
                                                <input type="text" value="" tabindex="-1"
                                                    name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" />
                                            </div>
                                            <div class="clear">
                                                <button id="mc-embedded-subscribe" class="button btn-primary"
                                                    type="submit" name="subscribe" value="">
                                                    <i class="icon-cursor"></i>
                                                    Send Mail</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- News letter area  End -->
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row flex-sm-row-reverse">
                    <div class="col-md-6 text-end">
                        <div class="payment-link">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/payment.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 text-start">
                        <p class="copy-text">
                            © 2021
                            <strong>Furns</strong>
                            Made With
                            <i class="ion-heart" aria-hidden="true"></i>
                            By
                            <a class="company-name" href="https://hasthemes.com/">
                                <strong>
                                    HasThemes</strong>
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End -->
<?php
$args = array('post_type' => 'product', 'posts_per_page' => 1);
$the_query = new WP_Query($args);
if($the_query->have_posts()){
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container gallery-top mb-20px">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/1.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/2.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/3.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/4.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/5.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs slider-nav-style-1 small-nav">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/1.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/2.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/3.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/4.jpg"
                                        alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="<?php echo get_template_directory_uri(); ?>/images/product-image/5.jpg"
                                        alt="">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2><?php echo get_the_title(); ?></h2>
                            <p class="reference">Reference:<span>
                                    demo_17</span>
                            </p>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <span class="read-review">
                                    <a class="reviews" href="#">Read reviews (1)</a>
                                </span>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">$18.90</li>
                                </ul>
                            </div>
                            <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor
                                incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud
                                exercitation ullamco</p>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <button class="add-cart btn btn-primary btn-hover-primary ml-4">
                                        Add To
                                        Cart</button>
                                </div>
                            </div>
                            <div class="pro-details-wish-com">
                                <div class="pro-details-wishlist">
                                    <a href="wishlist.html">
                                        <i class="ion-android-favorite-outline"></i>Add to
                                        wishlist</a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="compare.html">
                                        <i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                </div>
                            </div>
                            <div class="pro-details-social-info">
                                <span>Share</span>
                                <div class="social-info">
                                    <ul>
                                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="ion-social-google"></i></a></li>
                                        <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>
<!-- Modal end -->

<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/vendor.min.js"> </script>
<script src="<?php echo get_template_directory_uri(); ?>/js/plugins/plugins.min.js"></script>

<!-- Main Js -->
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>


<?php wp_footer(); ?>

</body>

</html>