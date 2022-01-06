<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furniture_Land
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Nabin Furniture - Furniture Land</title>
    <meta name="description"
        content="240+ Best Bootstrap Templates are available on this website. Find your template for your project compatible with the most popular HTML library in the world." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Nabin Furniture - Furniture Land" />
    <meta property="og:url" content="PAGE_URL" />
    <meta property="og:site_name" content="Nabin Furniture - Furniture Land" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Nabin Furniture - Furniture Land" />
    <meta name="robots" content="noindex, follow" />
    <!-- Add site Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.png" sizes="32x32" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage"
        content="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.png" />

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Header Area start  -->
    <div class="header section">
        <!-- Header Top Message Start -->
        <div class="header-top section-fluid bg-black">
            <div class="container">
                <div class="row row-cols-lg-2 align-items-center">
                    <!-- Header Top Message Start -->
                    <div class="col text-center text-lg-start">
                        <div class="header-top-massege">
                            <p> Welcome to Furniture Land
                            </p>
                        </div>
                    </div>
                    <!-- Header Top Message End -->
                    <!-- Header Top Language Currency -->
                    <div class="col d-none d-lg-block">
                        <div class="header-top-set-lan-curr d-flex justify-content-end">
                            <!-- Single Wedge Start -->
                            <div class="header-top-curr dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    Language : (ENG)
                                    <i class="ion-ios-arrow-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="#">English</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Italiano</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Français</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Filipino</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                            <!-- Single Wedge Start -->
                            <div class="header-top-curr dropdown">
                                <button class="dropdown-toggle pr-0 border-0" data-bs-toggle="dropdown">Currency : (USD)
                                    <i class="ion-ios-arrow-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="#">USD $</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">EUR €</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">POUND £</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">FRANC ₣</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                        </div>
                    </div>
                    <!-- Header Top Language Currency -->
                </div>
            </div>
        </div>
        <!-- Header Top  End -->
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_header_image(); ?>"
                                    alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn">
                                    <i class="icon-magnifier"></i>
                                </a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="#">
                                        <input class="form-control" placeholder="Enter your search key" type="text">
                                        <button class="submit" type="submit">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">
                                    <i class="icon-user"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="my-account.html">My account</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login.html">Sign in</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart"
                                class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="icon-handbag"></i>
                                <span class="header-action-num">01</span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu"
                                class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-lg-none sticky-nav bg-white">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_header_image(); ?>"
                                    alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn">
                                    <i class="icon-magnifier"></i>
                                </a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="#">
                                        <input class="form-control" placeholder="Enter your search key" type="text">
                                        <button class="submit" type="submit">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">
                                    <i class="icon-user"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="my-account.html">My account</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login.html">Sign in</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart"
                                class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="icon-handbag"></i>
                                <span class="header-action-num">01</span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu"
                                class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Main Menu Start -->
        <div class="bg-black d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="main-menu">
                            <?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu' => 'main-menu',
								'menu_class' => '',
								'items_wrap'      => '<ul>%3$s</ul>',
                        		'container' => ''
							) )
							?>
                            <script>
                            jQuery(function($) {
                                $(document).ready(function() {
                                    $('ul').parent().addClass(
                                        'drop-down');
                                    $('li.drop-down > a:first-child').wrapInner(
                                        '<i class="ion-ios-arrow-down"></i>'
                                    );
                                });
                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu End -->
    </div>
    <!-- Header Area End  -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="single-product.html" class="image"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/1.jpg"
                                alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Walnut Cutting Board</a>
                            <span class="quantity-price">1 x
                                <span class="amount">$91.86</span>
                            </span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/2.jpg"
                                alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Lucky Wooden Elephant</a>
                            <span class="quantity-price">1 x
                                <span class="amount">$453.28</span>
                            </span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/product-image/3.jpg"
                                alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Fish Cut Out Set</a>
                            <span class="quantity-price">1 x
                                <span class="amount">$87.34</span>
                            </span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-start">Sub-Total :</td>
                                <td class="text-end">$523.30</td>
                            </tr>
                            <tr>
                                <td class="text-start">Eco Tax (-2.00) :</td>
                                <td class="text-end">$4.52</td>
                            </tr>
                            <tr>
                                <td class="text-start">VAT (20%) :</td>
                                <td class="text-end">$104.66</td>
                            </tr>
                            <tr>
                                <td class="text-start">Total :</td>
                                <td class="text-end theme-color">$632.48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="buttons">
                    <a href="cart.html" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    <a href="checkout.html" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
                <p class="minicart-message">Free Shipping on All Orders Over $100!</p>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <button class="offcanvas-close"></button>
        <div class="inner customScroll">

            <div class="offcanvas-menu mb-20px">
                <ul>
                    <li>
                        <a href="#">
                            <span class="menu-text">Home</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.html">
                                    <span class="menu-text">Home 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="index-2.html">
                                    <span class="menu-text">Home 2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="menu-text">Shop</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">
                                    <span class="menu-text">Shop Page</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="shop-3-column.html">Shop 3 Column</a>
                                    </li>
                                    <li>
                                        <a href="shop-4-column.html">Shop 4 Column</a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">Shop Grid Left Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="shop-right-sidebar.html">Shop Grid Right Sidebar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text">product Details Page</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="single-product.html">Product Single</a>
                                    </li>
                                    <li>
                                        <a href="single-product-variable.html">Product Variable</a>
                                    </li>
                                    <li>
                                        <a href="single-product-affiliate.html">Product Affiliate</a>
                                    </li>
                                    <li>
                                        <a href="single-product-group.html">Product Group</a>
                                    </li>
                                    <li>
                                        <a href="single-product-tabstyle-2.html">Product Tab 2</a>
                                    </li>
                                    <li>
                                        <a href="single-product-tabstyle-3.html">Product Tab 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text">Single Product Page</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="single-product-slider.html">Product Slider</a>
                                    </li>
                                    <li>
                                        <a href="single-product-gallery-left.html">Product Gallery Left</a>
                                    </li>
                                    <li>
                                        <a href="single-product-gallery-right.html">Product Gallery Right</a>
                                    </li>
                                    <li>
                                        <a href="single-product-sticky-left.html">Product Sticky Left</a>
                                    </li>
                                    <li>
                                        <a href="single-product-sticky-right.html">Product Sticky Right</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text">Other Pages</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="cart.html">Cart Page</a>
                                    </li>
                                    <li>
                                        <a href="checkout.html">Checkout Page</a>
                                    </li>
                                    <li>
                                        <a href="compare.html">Compare Page</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">Wishlist Page</a>
                                    </li>
                                    <li>
                                        <a href="my-account.html">Account Page</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login & Register Page</a>
                                    </li>
                                    <li>
                                        <a href="empty-cart.html">Empty Cart Page</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="menu-text">Pages</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="404.html">404 Page</a>
                            </li>
                            <li>
                                <a href="privacy-policy.html">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="faq.html">Faq Page</a>
                            </li>
                            <li>
                                <a href="coming-soon.html">Coming Soon Page</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="menu-text">Blog</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">
                                    <span class="menu-text">Blog Grid</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text">Blog List</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text">Blog Single</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="blog-single-right-sidebar.html">Blog Single Right Sidbar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
            <!-- OffCanvas Menu End -->

            <!-- Language Currency start -->
            <div class="offcanvas-userpanel mt-8">
                <ul>
                    <!-- Language Start -->
                    <li class="offcanvas-userpanel__role">
                        <a href="#">English
                            <i class="ion-ios-arrow-down"></i>
                        </a>
                        <ul class="user-sub-menu">
                            <li>
                                <a class="current" href="#">English</a>
                            </li>
                            <li>
                                <a href="#">
                                    Italiano</a>
                            </li>
                            <li>
                                <a href="#">
                                    Français</a>
                            </li>
                            <li>
                                <a href="#">
                                    Filipino</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Language End -->
                    <!-- Currency Start -->
                    <li class="offcanvas-userpanel__role">
                        <a href="#">USD $
                            <i class="ion-ios-arrow-down"></i>
                        </a>
                        <ul class="user-sub-menu">
                            <li>
                                <a class="current" href="#">USD $</a>
                            </li>
                            <li>
                                <a href="#">EUR €</a>
                            </li>
                            <li>
                                <a href="#">POUND £</a>
                            </li>
                            <li>
                                <a href="#">FRANC ₣</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Currency End -->
                </ul>
            </div>
            <!-- Language Currency End -->
            <div class="offcanvas-social mt-auto">
                <ul>
                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-google"></i></a></li>
                    <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Menu End -->


    <div class="offcanvas-overlay"></div>