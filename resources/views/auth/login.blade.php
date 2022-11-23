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
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.ico')}}">

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
            <section class="page_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="text-uppercase">Account</h2>
                            <p>Please login or signup to continue with your purchase</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Account Content -->
            <section class="shop-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row shop-login">
                                <div class="col-md-6">
                                    <div class="box-content">
                                        <h3 class="text-center">Existing Customer</h3>
                                        <br>
                                        <form class="logregform" method="POST" action="{{ route('login') }}">
                                                @csrf
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>{{ __('E-mail Address') }}</label>
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                         @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                         @if (Route::has('password.request'))
                                                            <a class="pull-right" href="{{ route('password.request') }}">
                                                                {{ __('(Lost Password?)') }}
                                                            </a>
                                                        @endif
                                                        <label>{{ __('Password') }}</label>
                                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="remember-box checkbox">
                                            <label for="rememberme">
                                            <input type="checkbox" id="rememberme" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            </label>
                                            </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-default pull-right">{{ __('Login') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="box-content">
                                        <h3 class="text-center">Register An Account</h3>
                                        <x-jet-validation-errors class="mb-4" />
                                        <br>
                                        <form class="logregform"  method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>{{ __('Name') }}</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>{{ __('E-mail Address') }}</label>
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix space20"></div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>{{ __('Password') }}</label>
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>{{ __('Re-enter Password') }}</label>
                                                        <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="space20"></div>
                                                    <x-jet-button class="btn btn-default pull-right">
                                                        {{ __('Register') }}
                                                    </x-jet-button>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
