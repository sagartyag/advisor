<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="Hyip Pro,  A Modern Hyip Investmet Platform">
    <meta name="keywords"
        content="investment, HYIP, HYIP investment, hyip website, invest, investment, Investment Management system, investment script, Bug Finder, bug-finder, bugfinder.net, bugfinder">
    <link rel="shortcut icon" href="main/assets/images/fav.png" type="image/x-icon">
    <base href="{{ asset('') }}">
    <link rel="apple-touch-icon" href="assets/uploads/logo/logo.png">
    <title>{{ siteName() }} | Dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="main/assets/images/fav.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ siteName() }} | Dashboard">

    <meta itemprop="name" content="{{ siteName() }} | Dashboard">
    <meta itemprop="description" content="Hyip Pro,  A Modern Hyip Investmet Platform">
    <meta itemprop="image" content="assets/uploads/logo/meta.png600x315">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Hyip Pro,  A Modern Hyip Investmet Platform">
    <meta property="og:description" content="Hyip Pro,  A Modern Hyip Investmet Platform">
    <meta property="og:image" content="assets/uploads/logo/meta.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:url" content="user/dashboard">

    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" type="text/css" href="assets/themes/screaminlizard/css/bootstrap.min.css" />


    <!-- owl carousel -->
    <link rel="stylesheet" type="text/css" href="assets/themes/screaminlizard/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/themes/screaminlizard/css/owl.theme.default.min.css">

    <!-- select 2 -->
    <link rel="stylesheet" type="text/css" href="assets/themes/screaminlizard/css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="assets/themes/screaminlizard/css/radialprogress.css">
    <script src="assets/themes/screaminlizard/js/fontawesomepro.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/themes/screaminlizard/css/style.css">

    <link rel="stylesheet" type="text/css" href="assets/themes/screaminlizard/css/dashboard.css">
    <script src="assets/themes/screaminlizard/js/modernizr.custom.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="application/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="application/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- bottom navbar -->
    <div class="bottom-nav fixed-bottom d-lg-none">
        <div class="link-item">
            <button onclick="toggleSideMenu()">
                <span class="icon"><i class="fal fa-ellipsis-v-alt"></i></span>
                <span class="text">Menus</span>
            </button>
        </div>
        <div class="link-item">
            <a href="user/deposit" {{menuActive('user.deposit')}}>
                <span class="icon"><i class="fal fa-layer-group" aria-hidden="true"></i></span>
                <span class="text">Activation</span>
            </a>
        </div>
        <div class="link-item {{menuActive('user.dashboard')}}">
            <a href="user/dashboard">
                <span class="icon"><i class="fal fa-house"></i></span>
                <span class="text">Home</span>
            </a>
        </div>
        <div class="link-item {{menuActive('user.Withdraw')}}">
            <a href="user/Withdraw">
                <span class="icon"><i class="fal fa-funnel-dollar" aria-hidden="true"></i></span>
                <span class="text">Withdrawal</span>
            </a>
        </div>
        <div class="link-item {{menuActive('user.profile')}}">
            <a href="user/profile">
                <span class="icon"><i class="fal fa-user"></i></span>
                <span class="text">Profile</span>
            </a>
        </div>
    </div>

    <div class="dashboard-wrapper">
        <!-- sidebar -->
        <div id="sidebar" class="">

            <div class="sidebar-top">
                <a class="navbar-brand d-none d-lg-block" href="{{asset('')}}"> <img
                        src="main/assets/images/logo.png" style="width: 177px; margin-bottom: 21px;margin-left: 34px;" alt="brand logo" /></a>
                <div class="mobile-user-area ">
                    <div class="thumb">
                        <img class="img-fluid user-img" src="assets/uploads/male-avatar-icon-13.jpg" alt="...">
                    </div>
                    <div class="content">
                        <h5 class="mt-1 mb-1">{{Auth::user()->name}}</h5>
                        <span class="">ID : {{Auth::user()->username}}</span>
                    </div>
                </div>
                <button class="sidebar-toggler d-lg-none" onclick="toggleSideMenu()">
                    <i class="fal fa-times"></i>
                </button>
            </div>

          

            <div class="wallet-wrapper m-4">
               
                <div class="d-flex justify-content-between mt-3">
                    <a class="btn btn-primary" href="user/invest"><i class="fal fa-wallet" aria-hidden="true"></i>
                        Deposit</a>
                    <a class="btn btn-primary" href="user/Withdraw"><i class="fal fa-usd-circle" aria-hidden="true"></i>
                        Withdraw</a>
                </div>
            </div>

            <ul class="main">
                <li>
                    <a class="sidebar-link {{menuActive('user.dashboard')}}" href="user/dashboard">
                        <i class="fal fa-border-all"></i> Dashboard </a>
                </li>
               
                <li>
                    <a  href="{{route('user.deposit')}}"class="sidebar-link {{menuActive('user.deposit')}}">
                        <i class="fal fa-layer-group"></i> Activation </a>
                </li>

                <li>
                    <a href="{{route('user.AddFund')}}" class="sidebar-link {{menuActive('user.AddFund')}}">
                        <i class="fal fa-file-medical-alt"></i> Add Fund </a>
                </li>

                <li>
                    <a href="{{route('user.referral-team')}}" class="sidebar-link {{menuActive('user.referral-team')}}">
                        <i class="fal fa-retweet-alt"></i> my referral </a>
                </li>

                <li>
                    <a href="{{route('user.level-team')}}" class="sidebar-link {{menuActive(' user.level-team')}}">
                        <i class="fal fa-retweet-alt"></i> Level Team </a>
                </li>
                
                <li>
                    <a href="{{route('user.leadership-bonus')}}" class="sidebar-link {{menuActive('user.leadership-bonus')}}">
                        <i class="far fa-sack-dollar"></i> Direct Income </a>
                </li>

                <li>
                    <a href="{{route('user.level-income')}}" class="sidebar-link {{menuActive('user.level-income')}}">
                        <i class="fal fa-layer-group"></i> Level Income </a>
                </li>

                <li>
                    <a href="{{route('user.roi-bonus')}}" class="sidebar-link {{menuActive('user.roi-bonus')}}">
                        <i class="far fa-search-dollar"></i>  Royalty Income </a>
                </li>

                <li>
                    <a href="{{route('user.reward-bonus')}}" class="sidebar-link {{menuActive('user.reward-bonus')}}">
                        <i class="far fa-sack-dollar"></i> Rewards Income</a>
                </li>

              

                
                <li>
                    <a href="{{route('user.dailyIncentive')}}" class="sidebar-link {{menuActive('user.dailyIncentive')}}">
                        <i class="far fa-search-dollar"></i> Retire Royalty Income </a>
                </li>

               
             

               
             
                <li>
                    <a href="{{route('user.Withdraw')}}" class="sidebar-link {{menuActive('user.Withdraw')}}">
                        <i class="fal fa-hand-holding-usd"></i> Withdrawal </a>
                </li>
                <li>
                    <a href="{{route('user.Withdraw-History')}}" class="sidebar-link {{menuActive('user.Withdraw-History')}}">
                        <i class="far fa-badge-dollar"></i> Withdrawal history </a>
                </li>
               
                <li>
                    <a href="{{route('user.profile')}}" class="sidebar-link {{menuActive('user.profile')}}">
                        <i class="fal fa-user"></i>profile settings </a>
                </li>
            

                <li class="">
                    <a href="logout" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fal fa-sign-out-alt"></i>Logout </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
            </form>

            </ul>
        </div>
        <!-- content -->
        <div id="content">
            <div class="overlay">
                <!-- navbar -->
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="d-lg-none" href="#">
                            <img src="main/assets/images/logo.png" alt="{{ siteName() }}" width="100">
                        </a>

                        <button class="sidebar-toggler d-none d-lg-block" onclick="toggleSideMenu()">
                            <i class="fal fa-bars"></i>
                        </button>

                        <span class="navbar-text" id="pushNotificationArea">
                            <!---- notification panel ---->

                            <!-- user panel -->
                            <div class="notification-panel user-panel d-none d-lg-inline-block">
                                <span class="profile">
                                    <img src="assets/uploads/male-avatar-icon-13.jpg" class="img-fluid" alt="user img" />
                                </span>
                                <ul class="user-dropdown">
                                    <li>
                                        <a href="user/dashboard"> <i class="fal fa-border-all"
                                                aria-hidden="true"></i> Dashboard </a>
                                    </li>
                                    <li>
                                        <a href="user/profile"> <i class="fal fa-user"></i> My Profile </a>
                                    </li>
                                   
                                    <li>
                                        <a href="logout"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out-alt"></i> Log Out </a>
                                      
                                    </li>
                                </ul>
                            </div>
                        </span>
                    </div>
                </nav>

                <!------------- others main dashboard body content ------------>