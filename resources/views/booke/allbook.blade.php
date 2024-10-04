@php
    $locale = app()->getLocale();
    $dir = $locale === 'ar' ? 'rtl' : 'ltr';
@endphp

<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">

<head>
    <title>{{ __('message.library') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image" href="images/icon.png">
    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
    tabindex="0">

    <header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
        <nav id="header-nav" class="navbar navbar-expand-lg px-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" class="logo" height="60">
                </a>
                <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg class="navbar-icon">
                        <use xlink:href="#navbar-icon"></use>
                    </svg>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar"
                    aria-labelledby="bdNavbarOffcanvasLabel">
                    <div class="offcanvas-header px-4 pb-0">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/main-logo.png" class="logo">
                        </a>
                        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas"
                            aria-label="Close" data-bs-target="#bdNavbar"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul id="navbar"
                            class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link me-4 active" href="#billboard">{{ __('message.home') }}</a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link me-4 active"
                                            href="{{ url('/dashboard') }}">{{ __('message.dashboard') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link me-4 active"
                                            href="{{ route('login') }}">{{ __('message.Log-in') }}</a>
                                    </li>


                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link me-4 active"
                                                href="{{ route('register') }}">{{ __('message.register') }}</a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-expanded="false">{{ __('message.lang') }}</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url('/localization/ar') }}">{{ __('message.arabic') }}</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url('/localization/en') }}">{{ __('message.englash') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <div class="user-items ps-5">
                                    <ul class="d-flex justify-content-end list-unstyled">
                                        <li class="search-item pe-3">
                                            <a href="#" class="search-button">
                                                <svg class="search">
                                                    <use xlink:href="#search"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="pe-3">
                                            <a href="#">
                                                <svg class="user">
                                                    <use xlink:href="#user"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <svg class="cart">
                                                    <use xlink:href="#cart"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section id="billboard" class="position-relative overflow-hidden bg-light-blue">
        <div class="swiper main-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6">
                                <div class="banner-content">
                                    <h1 class="display-2 text-uppercase text-dark pb-5">{{ __('message.panertext1') }}
                                    </h1>
                                    <a href="shop.html"
                                        class="btn btn-medium btn-dark text-uppercase btn-rounded-none">{{ __('message.panerbuttom') }}</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="image-holder">
                                    <img src="images/book1.png" alt="banner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="container">
                        <div class="row d-flex flex-wrap align-items-center">
                            <div class="col-md-6">
                                <div class="banner-content">
                                    <h1 class="display-2 text-uppercase text-dark pb-5">{{ __('message.panertext2') }}
                                    </h1>
                                    <a href="shop.html"
                                        class="btn btn-medium btn-dark text-uppercase btn-rounded-none">{{ __('message.panerbuttom') }}</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="image-holder">
                                    <img src="images/book2.png" alt="banner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-icon swiper-arrow swiper-arrow-prev">
            <svg class="chevron-left">
                <use xlink:href="#chevron-left" />
            </svg>
        </div>
        <div class="swiper-icon swiper-arrow swiper-arrow-next">
            <svg class="chevron-right">
                <use xlink:href="#chevron-right" />
            </svg>
        </div>
    </section>
    <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
        <div class="container">
            <div class="row">
                <div class="display-header d-flex justify-content-between pb-3">

                    <h2 class="display-7 text-dark text-uppercase">{{ __('message.mostbookes') }}</h2>
                    <!-- فلتر الفئات -->
                    <form method="GET" action="{{ route('allbook.index') }}">
                        <select name="categoryId" class="form-select" onchange="this.form.submit()">
                            <option value="">{{ __('message.category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('categoryId') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="swiper product-swiper">
                    <div class="row">
                        @foreach ($bookes as $item)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 ">
                                <div class="product-card position-relative">
                                    <div class="image-holder">
                                        <img src="data:image/jpeg;base64,{{ $item->image }}" alt="product-item"
                                            class="img-fluid" style="height: 280px; width: 100%;">
                                    </div>
                                    <div class="cart-concern position-absolute">
                                        <div class="cart-button d-flex">
                                            <form action="{{ route('readingbook.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id"
                                                    value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="book_id" value="{{ $item->id }}">
                                                <input type="hidden" name="BookingPeriod"
                                                    value="{{ now() }}">
                                                <button type="submit" class="btn btn-medium btn-black">
                                                    {{ __('message.Book-reservations') }}
                                                    <svg class="cart-outline">
                                                        <use xlink:href="#cart-outline"></use>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                        <h3 class="card-title text-uppercase">
                                            <a href="#">{{ $item->title }}</a>
                                        </h3>
                                        <span class="item-price text-primary">{{ $item->author }}</span>
                                        <span class="item-price text-primary">${{ $item->price }}</span>
                                    </div>
                                    <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination position-absolute text-center"></div>
    </section>
    <footer id="footer" class="overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="footer-top-area">
                    <div class="row d-flex flex-wrap justify-content-between">
                        <div class="col-lg-3 col-sm-6 pb-3">
                            <div class="footer-menu">
                                <img src="images/logo.png" alt="logo">
                                <p>{{ __('message.footer_logo_description') }}</p>
                                <div class="social-links">
                                    <ul class="d-flex list-unstyled">
                                        <li>
                                            <a href="#">
                                                <svg class="facebook">
                                                    <use xlink:href="#facebook" />
                                                </svg>
                                                {{ __('message.footer_social_facebook') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg class="instagram">
                                                    <use xlink:href="#instagram" />
                                                </svg>
                                                {{ __('message.footer_social_instagram') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg class="twitter">
                                                    <use xlink:href="#twitter" />
                                                </svg>
                                                {{ __('message.footer_social_twitter') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg class="linkedin">
                                                    <use xlink:href="#linkedin" />
                                                </svg>
                                                {{ __('message.footer_social_linkedin') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg class="youtube">
                                                    <use xlink:href="#youtube" />
                                                </svg>
                                                {{ __('message.footer_social_youtube') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 pb-3">
                            <div class="footer-menu text-uppercase">
                                <h5 class="widget-title pb-2">{{ __('message.footer_quick_links') }}</h5>
                                <ul class="menu-list list-unstyled text-uppercase">
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_home') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_about') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_shop') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_blogs') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_contact') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 pb-3">
                            <div class="footer-menu text-uppercase">
                                <h5 class="widget-title pb-2">{{ __('message.footer_help_info') }}</h5>
                                <ul class="menu-list list-unstyled">
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_track_order') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_returns_policies') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_shipping_delivery') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_contact_us') }}</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">{{ __('message.footer_faqs') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 pb-3">
                            <div class="footer-menu contact-item">
                                <h5 class="widget-title text-uppercase pb-2">{{ __('message.footer_contact_title') }}
                                </h5>
                                <p>{{ __('message.footer_contact_description') }} <a
                                        href="mailto:">{{ __('message.footer_contact_email') }}</a></p>
                                <p>{{ __('message.footer_contact_support') }} <a
                                        href="">{{ __('message.footer_contact_phone') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
    </footer>

    <div id="footer-bottom">
        <div class="container">
            <div class="row d-flex flex-wrap justify-content-between">
                <div class="col-12 text-center">
                    <div class="copyright">
                        <p>© Copyright 2024. Design by <a href="#">Aamna kadour</a> & <a href="#">Abdullah
                                Najjar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>
