<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <!--<base href="" />-->

    <!-- Basic Page Needs ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>HML AD MARKETING</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas ================================================== -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- Favicons ================================================== -->
    <link rel="icon" type="image/png" href="{{asset('')}}main/assets/images/favicon.png">

    <!-- Fonts ================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- CSS ================================================== -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('')}}main/assets/css/bootstrap.css">
    <!-- advisor -->
    <link rel="stylesheet" href="{{asset('')}}main/assets/css/advisor.css">
    <!-- plugins -->
    <link rel="stylesheet" href="{{asset('')}}main/assets/css/plugins.css">    
    <!-- advisor color -->
    <link rel="stylesheet" id="color" href="{{asset('')}}main/assets/css/color-default.css">
    <!-- hero slider -->
    <link rel="stylesheet" href="{{asset('')}}main/assets/css/hero-slider.css">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('')}}main/assets/css/responsive.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- HEADER SCRIPTS ================================================== -->
    <script src="{{asset('')}}main/assets/js/modernizr.js"></script>
  </head>
  <body class="fixed-header">
    <!-- LOADER -->
    <div id="loader" class="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>

    <!-- HEADER -->
    <header id="header" class="h-one-h">
      <div class="container">
        <!-- TOP BAR -->
        <div class="top-bar clearfix">
          <p>We have over 15 years of experience.</p>
          <ul>
            <li><i class="icon-telephone114"></i> +1 900 234 567</li>
            <li><i class="icon-icons74"></i> 786 South Park Avenue</li>
            <li><i class="icon-icons20"></i> Mon to Sat 08:00 - 16:30</li>
          </ul>
        </div>
        <!-- / TOP BAR -->
        
        <!-- HEADER INNER -->
        <div class="header clearfix">
          <a href="{{ route('Index') }}" class="logo"><img src="{{asset('')}}main/assets/images/Blue Bold Typographic Aqua Water Logo.png" style="width: 150px;margin-top:-12px; margin-bottom: 13px;margin-left: 34px;" alt=""></a>
          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <div class="search-btn">
            <a href="javascript:void(0);" class="search-trigger"><i class="icon-icons185"></i></a>
          </div>
          
          <div class="search-container">
            <i class="fa fa-times header-search-close"></i>
            <div class="search-overlay"></div>
            <div class="search">
              <form>
                <label>Search:</label>
                <input type="text" placeholder="">
                <button><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          
          <nav class="main-nav navbar-collapse collapse" id="primary-nav">
            <ul class="nav nav-pills">
              <li><a href="{{route('Index')}}">Home</a></li>
              <li><a href="{{route('about-us')}}">About Us</a></li>
              <li><a href="{{route('services')}}">Services</a></li>
              <li><a href="{{route('news')}}">News</a></li>
              <li><a href="{{route('contact-us')}}">Contact</a></li>
              <li><a href="{{route('login')}}">Login</a></li>
              <li><a href="{{route('register')}}">Register</a></li>
            </ul>
          </nav>
        </div><!-- / HEADER INNER -->
      </div><!-- / CONTAINER -->
    </header><!-- / HEADER -->
  
