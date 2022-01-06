<?php get_header(); ?>
<!-- Hero/Intro Slider Start -->
<?php
$args = ['post_type' => 'banner', 'order' => 'ASC', 'posts_per_page' => 3];
$the_query = new WP_Query($args);
if ($the_query->have_posts()) { ?>
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            <?php while ($the_query->have_posts()) {
                $the_query->the_post(); ?>
            <div class="hero-slide-item slider-height swiper-slide d-flex">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">New Products</span>
                                <h2 class="title-1"><?php echo get_the_title(); ?>
                                </h2>
                                <p><?php echo get_the_content(); ?></p>
                                <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                            <div class="hero-slide-image">
                                <img src="<?php echo get_the_post_thumbnail_url(
                                    get_the_ID()
                                ); ?>" alt="<?php echo get_the_title(); ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<?php }
?>

<!-- Hero/Intro Slider End -->
<?php $terms = get_terms(['taxonomy' => 'product_cat', 'parent' => 0]); ?>
<!-- Product Category Start -->
<div class="section pt-100px pb-100px">
    <div class="container">
        <div class="category-slider swiper-container" data-aos="fade-up">
            <div class="category-wrapper swiper-wrapper">
                <!-- Single Category -->
                <?php foreach ($terms as $term) {

                    $thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url($thumbnail_id);
                    ?>
                <div class=" swiper-slide">
                    <a href="<?php echo get_term_link( $term, 'product_cat' ); ?>" class="category-inner ">
                        <div class="category-single-item">
                            <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>">
                            <span class="title"><?php echo $term->name; ?></span>
                        </div>
                    </a>
                </div>
                <?php
                } ?>

            </div>
        </div>
    </div>
</div>

<!-- Product Category End -->

<!-- Product tab Area Start -->
<div class="section product-tab-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" data-aos="fade-up">
                <div class="section-title mb-0">
                    <h2 class="title">Our Products</h2>
                    <p class="sub-title mb-30px">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo
                        tempor incididunt ut labore</p>
                </div>
            </div>

            <!-- Tab Start -->
            <div class="col-md-12 text-center mb-40px" data-aos="fade-up" data-aos-delay="200">
                <ul class="product-tab-nav nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab-product-new-arrivals">New
                            Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-product-best-sellers">Best
                            Sellers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-product-sale-item">Sale
                            Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-product-on-sales">On
                            Sales</a>
                    </li>
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content">
                    <!-- 1st tab start -->
                    <div class="tab-pane fade show active" id="tab-product-new-arrivals">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/1.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/2.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Simple minimal Chair
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/3.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/4.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-10%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$48.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/5.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/6.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-7%</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                            <span class="old">$38.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/7.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/8.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/9.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/10.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-5%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Table</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$40.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6  mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/11.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/12.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-es-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/13.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/14.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 " data-aos="fade-up" data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/15.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/16.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                        </div>
                    </div>
                    <!-- 1st tab end -->
                    <!-- 2nd tab start -->
                    <div class="tab-pane fade" id="tab-product-best-sellers">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/1.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/2.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Simple minimal Chair
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/3.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/4.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-10%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$48.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/5.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/6.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-7%</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                            <span class="old">$38.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/7.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/8.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/9.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/10.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-5%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Table</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$40.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6  mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/11.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/12.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-es-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/13.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/14.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 " data-aos="fade-up" data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/15.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/16.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                        </div>
                    </div>
                    <!-- 2nd tab end -->
                    <!-- 3rd tab start -->
                    <div class="tab-pane fade" id="tab-product-sale-item">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/1.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/2.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Simple minimal Chair
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/3.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/4.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-10%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$48.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/5.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/6.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-7%</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                            <span class="old">$38.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/7.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/8.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/9.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/10.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-5%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Table</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$40.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6  mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/11.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/12.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-es-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/13.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/14.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 " data-aos="fade-up" data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/15.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/16.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                        </div>
                    </div>
                    <!-- 3rd tab end -->
                    <!-- 4th tab start -->
                    <div class="tab-pane fade" id="tab-product-on-sales">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/1.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/2.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Simple minimal Chair
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/3.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/4.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-10%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$48.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/5.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/6.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-7%</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                            <span class="old">$38.00</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/7.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/8.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/9.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/10.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="sale">-5%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Table</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                            <span class="old">$40.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6  mb-md-30px mb-lm-30px" data-aos="fade-up"
                                data-aos-delay="400">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/11.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/12.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Wooden decorations</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-es-30px" data-aos="fade-up"
                                data-aos-delay="600">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/13.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/14.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges"></span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">High quality vase bottle</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$30.50</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 " data-aos="fade-up" data-aos-delay="800">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="shop-left-sidebar.html" class="image">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/product-image/15.jpg"
                                                alt="Product" />
                                            <img class="hover-image"
                                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/16.jpg"
                                                alt="Product" />
                                        </a>
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="actions">
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon-size-fullscreen"></i>
                                            </a>
                                            <a href="compare.html" class="action compare" title="Compare">
                                                <i class="icon-refresh"></i>
                                            </a>
                                        </div>
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">
                                            <a href="shop-left-sidebar.html">Living & Bedroom Chair</a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">$38.50</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- Single Prodect -->
                            </div>
                        </div>
                    </div>
                    <!-- 4th tab end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product tab Area End -->

<!-- Banner Section Start -->
<div class="section pb-100px pt-100px">
    <div class="container">
        <!-- Banners Start -->
        <div class="row">
            <!-- Banner Start -->
            <div class="col-lg-6 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                <a href="shop-left-sidebar.html" class="banner">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner/1.jpg" alt="" />
                    <div class="info justify-content-end">
                        <div class="content align-self-center">
                            <h3 class="title">
                                Sale Furniture
                                <br />
                                For Summer
                            </h3>
                            <p>Great Discounts Here</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Banner End -->

            <!-- Banner Start -->
            <div class="col-lg-6 col-12" data-aos="fade-up" data-aos-delay="400">
                <a href="shop-left-sidebar.html" class="banner">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner/2.jpg" alt="" />
                    <div class="info justify-content-start">
                        <div class="content align-self-center">
                            <h3 class="title">
                                Office Chair
                                <br />
                                For Best Offer
                            </h3>
                            <p>Great Discounts Here</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Banner End -->
        </div>
        <!-- Banners End -->
    </div>
</div>
<!-- Banner Section End -->
<!--  Blog area Start -->
<div class="main-blog-area pb-100px">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12" data-aos="fade-up">
                <div class="section-title text-center mb-11">
                    <h2 class="title">Latest News</h2>
                    <p class="sub-title">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor
                        incididunt ut labore
                    </p>
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="blog-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
            <!-- Start single blog -->
            <div class="swiper-wrapper">
                <div class="single-blog swiper-slide">
                    <div class="blog-image">
                        <a href="blog-single-left-sidebar.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/blog-image/1.jpg"
                                class="img-responsive w-100" alt=""></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date">
                            <a class="blog-date" href="#">14 November</a>
                        </div>
                        <h5 class="blog-heading">
                            <a class="blog-heading-link" href="blog-single-left-sidebar.html">Interior design is the
                                art.</a>
                        </h5>
                        <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod
                            tempor incididu ut labore et dolore magna aliqua.</p>

                        <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-25px">Read More</a>
                    </div>
                </div>
                <!-- End single blog -->
                <div class="single-blog swiper-slide">
                    <div class="blog-image">
                        <a href="blog-single-left-sidebar.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/blog-image/2.jpg"
                                class="img-responsive w-100" alt=""></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date">
                            <a class="blog-date" href="#">14 November</a>
                        </div>
                        <h5 class="blog-heading">
                            <a class="blog-heading-link" href="blog-single-left-sidebar.html">Decorate your home with
                                furns.</a>
                        </h5>
                        <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod
                            tempor incididu ut labore et dolore magna aliqua.</p>

                        <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-25px">Read More</a>
                    </div>
                </div>
                <!-- End single blog -->
                <div class="single-blog swiper-slide">
                    <div class="blog-image">
                        <a href="blog-single-left-sidebar.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/blog-image/3.jpg"
                                class="img-responsive w-100" alt=""></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date">
                            <a class="blog-date" href="#">14 November</a>
                        </div>
                        <h5 class="blog-heading">
                            <a class="blog-heading-link" href="blog-single-left-sidebar.html">Spatialize with that the
                                furns.</a>
                        </h5>
                        <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod
                            tempor incididu ut labore et dolore magna aliqua.</p>

                        <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-25px">Read More</a>
                    </div>
                </div>
                <!-- End single blog -->
                <div class="single-blog swiper-slide">
                    <div class="blog-image">
                        <a href="blog-single-left-sidebar.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/blog-image/4.jpg"
                                class="img-responsive w-100" alt=""></a>
                    </div>
                    <div class="blog-text">
                        <div class="blog-athor-date">
                            <a class="blog-date" href="#">14 November</a>
                        </div>
                        <h5 class="blog-heading">
                            <a class="blog-heading-link" href="blog-single-left-sidebar.html">Unique products will
                                impress.</a>
                        </h5>
                        <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod
                            tempor incididu ut labore et dolore magna aliqua.</p>

                        <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-25px">Read More</a>
                    </div>
                </div>
                <!-- End single blog -->
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!--  Blog area End -->

<!-- Instagram Area Start -->
<div class="section pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12" data-aos="fade-up">
                <div class="section-title text-center mb-11">
                    <h2 class="title">Follow Us Instagram</h2>
                    <p class="sub-title">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor
                        incididunt ut labore</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Item -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                <div class="insta-wrapper">
                    <a href="https://www.instagram.com/" target="_blank"><img class="w-100"
                            src="<?php echo get_template_directory_uri(); ?>/images/instragram-image/1.png" alt="">

                    </a>
                </div>
            </div>
            <!-- Single Item -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="400">
                <div class="insta-wrapper">
                    <a href="https://www.instagram.com/" target="_blank"><img class="w-100"
                            src="<?php echo get_template_directory_uri(); ?>/images/instragram-image/2.png" alt="">

                    </a>
                </div>
            </div>
            <!-- Single Item -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-xs-30px" data-aos="fade-up" data-aos-delay="600">
                <div class="insta-wrapper">
                    <a href="https://www.instagram.com/" target="_blank"><img class="w-100"
                            src="<?php echo get_template_directory_uri(); ?>/images/instragram-image/3.png" alt="">

                    </a>
                </div>
            </div>
            <!-- Single Item -->
            <div class="col-lg-3 col-md-6 col-sm-6 " data-aos="fade-up" data-aos-delay="800">
                <div class="insta-wrapper">
                    <a href="https://www.instagram.com/" target="_blank"><img class="w-100"
                            src="<?php echo get_template_directory_uri(); ?>/images/instragram-image/4.png" alt="">

                    </a>
                </div>
            </div>
            <!-- Single Item -->
        </div>
    </div>
</div>
<!-- Instagram Area End -->


<?php get_footer();