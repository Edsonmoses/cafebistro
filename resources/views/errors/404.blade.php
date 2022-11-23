<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tomato Responsive Restaurant HTML5 Template</title>
    <meta name="author" content="Surjith S M">

    <!-- SEO -->
    <meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
    <meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Responsive Tag -->
    <meta name="viewport" content="width=device-width">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugin.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css')}}">

    <!--[if lt IE 9]>
            <script src="{{ asset('assets/frontend/js/vendor/html5-3.6-respond-1.4.2.min.js')}}"></script>
        <![endif]-->
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!-- Preloder-->
    <div class="preloder animated">
        <div class="scoket">
            <img src="{{ asset('assets/frontend/img/preloader.svg')}}" alt="" />
        </div>
    </div>

    <div class="body">

        <div class="main-wrapper">
            <!-- Navigation-->
             <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="./index.html">
                            <img src="{{ asset('assets/frontend/img/nav-logo.png')}}" alt="nav-logo">
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="/menu">Menu</a>
                            </li>
                            <li>
                                <a href="/reservation">Reservation</a>
                            </li>
                            <li>
                                <a href="/about">About</a>
                            </li>
                            <li>
                                <a href="/recipe">Recipe</a>
                            </li>
                            <li>
                                <a href="/blog">Blog</a>
                            </li>
                            <li class="dropdown">
                                <a href="/shop">Shop</a>
                            </li>
                            <li><a href="/contact">Contact</a></li>
                            <li class="dropdown" style="display: none">
                                <a class="css-pointer dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fsc pull-left"></i><span class="cart-number">3</span><span class="caret"></span></a>
                                <div class="cart-content dropdown-menu">
                                    <div class="cart-title">
                                        <h4>Shopping Cart</h4>
                                    </div>
                                    <div class="cart-items">
                                        <div class="cart-item clearfix">
                                            <div class="cart-item-image">
                                                <a href="./shop_single_full.html"><img src="{{ asset('assets/frontend/img/cart-img1.jpg')}}" alt="Breakfast with coffee"></a>
                                            </div>
                                            <div class="cart-item-desc">
                                                <a href="./shop_single_full.html">Breakfast with coffee</a>
                                                <span class="cart-item-price">$19.99</span>
                                                <span class="cart-item-quantity">x 2</span>
                                                <i class="fa fa-times ci-close"></i>
                                            </div>
                                        </div>
                                        <div class="cart-item clearfix">
                                            <div class="cart-item-image">
                                                <a href="./shop_single_full.html"><img src="{{ asset('assets/frontend/img/cart-img2.jpg')}}" alt="Chicken stew"></a>
                                            </div>
                                            <div class="cart-item-desc">
                                                <a href="./shop_single_full.html">Chicken stew</a>
                                                <span class="cart-item-price">$24.99</span>
                                                <span class="cart-item-quantity">x 3</span>
                                                <i class="fa fa-times ci-close"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-action clearfix">
                                        <span class="pull-left checkout-price">$ 114.95</span>
                                        <a class="btn btn-default pull-right" href="./shop_cart.html">View Cart</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--/.navbar-collapse -->
                </div>
            </nav>

            <!-- Page Header -->
            <section class="page_header vertical-padding">

            </section>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="giant-space">
                            <h2 class="text-giant">404</h2>
                            <p class="wow fadeInUp">Sorry. The page you are looking for is not found</p>
                            <p class="top-space-lg"><a href="/" class="btn btn-default btn-lg">Back to home</a></p>
                        </div>
                    </div>
                </div>
            </div>
             @livewire('pages.bistro-footer-component')
        </div>

    </div> 

    <!-- Javascript -->
    <script src="{{ asset('assets/frontend/js/vendor/jquery-1.11.2.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.flexslider-min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/spectragram.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/velocity.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/velocity.ui.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/slick.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/wow.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/animation.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/vegas/vegas.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.mb.YTPlayer.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery.stellar.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/main.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/mc/jquery.ketchup.all.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/mc/main.js')}}"></script>

</body>

</html>
