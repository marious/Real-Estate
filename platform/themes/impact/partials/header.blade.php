<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url('/') }}">
    <base href="{{ url('/') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    {!! Theme::header() !!}
</head>
<body class="homepage-9 hp-6 hd-white rtl inner-pages">
<!-- Wrapper -->
<div id="wrapper">
    <!-- START SECTION HEADINGS -->
    <!-- Header Container
    ================================================== -->
    <header id="header-container" >
        <!-- Header -->
        <div id="header">
            <div class="container container-header">
                <!-- Left Side Content -->
                <div class="left-side">
                    <!-- Logo -->
                    @if (theme_option('logo'))
                    <div id="logo">
                        <a href="{{ route('public.single') }}" class="img-responsive" title="الرئيسية">
                            <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="impact investment" title="" style="width: 100px;"
                            title="Impact Investment">
                        </a>
                    </div>
                    @endif
                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                        </button>

                    </div>
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        {!!
                           Menu::renderMenuLocation('main-menu', [
                               'options' => ['class' => 'navigation clearfix', 'id' => 'responsive'],
                               'view'    => 'main-menu',
                           ])
                         !!}
                    </nav>
                    <!-- Main Navigation / End -->
                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side d-none d-none d-lg-none d-xl-flex">
                    <!-- Header Widget -->
                    <div class="">
                        <a href="{{ route('public.account.register') }}" class="button border" title="إعلن مجانا"> إعلن مجانا<i class="fas fa-laptop-house ml-2"></i></a>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->

                <!-- Right Side Content / End -->
{{--                <div class="header-user-menu user-menu add">--}}
{{--                    <div class="header-user-name">--}}
{{--                        <span><img src="images/testimonials/ts-1.jpg" alt=""></span>Hi, Mary!--}}
{{--                    </div>--}}
{{--                    <ul>--}}
{{--                        <li><a href="user-profile.html"> Edit profile</a></li>--}}
{{--                        <li><a href="add-property.html"> Add Property</a></li>--}}
{{--                        <li><a href="payment-method.html">  Payments</a></li>--}}
{{--                        <li><a href="change-password.html"> Change Password</a></li>--}}
{{--                        <li><a href="#">Log Out</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <!-- Right Side Content / End -->

                <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                    <!-- Header Widget -->
                    <div class="sign-in mt-2">
                        <div class=""><a href="{{ route('public.account.login') }}" title="تسجيل الدخول">تسجيل الدخول</a></div>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->

                <!-- lang-wrap-->
                <!-- lang-wrap end-->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->












