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
    
    <meta name="description"
        content="Join {{siteName()}}, the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta name="keywords"
        content="investment, HYIP, HYIP investment, hyip website, invest, investment, Investment Management system, investment script, Bug Finder, bug-finder, bugfinder.net, bugfinder">
    <link rel="shortcut icon" href="{{asset('')}}assets/uploads/gateway/favicon.png" type="image/x-icon">

    <link rel="apple-touch-icon" href="{{asset('')}}assets/uploads/gateway/logo.png">
    <title>{{siteName()}}| Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('')}}assets/uploads/gateway/favicon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{siteName()}}| Login">

    <meta itemprop="name" content="{{siteName()}}| Login">
    <meta itemprop="description"
        content="Join {{siteName()}}, the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta itemprop="image" content="{{asset('')}}assets/uploads/gateway/tenor.png">

    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Join {{siteName()}}, the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta property="og:description"
        content="Join {{siteName()}}, the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta property="og:image" content="{{asset('')}}assets/uploads/gateway/tenor.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:url" content="https://tenorai.live/">

    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/themes/screaminlizard/css/bootstrap.min.css" />

    <!-- owl carousel -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/themes/screaminlizard/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}assets/themes/screaminlizard/css/owl.theme.default.min.css">

    <!-- select 2 -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/themes/screaminlizard/css/select2.min.css">

    <script src="{{asset('')}}assets/themes/screaminlizard/js/fontawesomepro.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/themes/screaminlizard/css/style.css">
    <script src="{{asset('')}}assets/themes/screaminlizard/js/modernizr.custom.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="application/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="application/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

 

    <!-- PAGE-BANNER -->
    <style>
        .banner-section {
            background: url("{{asset('')}}assets/uploads/gateway/banner.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>
    


    <!-- login section -->
    <section class="login-section">
        <div class="container">
            <div class="row justify-content-center align-items-end">
                <div class="col-lg-5 col-md-8">
                    <div class="form-wrapper">
                        <div class="form-box">
                        <form method="POST" action="{{route('login')}}">

{{ csrf_field() }}
                           
                                                <p >Register Successfully</p>
                                                @if(session()->has('messages'))
                            <?php
                            $user_details=session()->get('messages')
                        ?>
                                                          
                            <h4 style="color:#FFFFFF ">Congratulations!  Your Account has been successfully Created.</h4>
                            <br>

                            <h4 style="color: white">Dear <span class="main-color"
                                    style="color: #ffc70d;font-weight: 700;">{{$user_details['name']  }}</span>
                            </h4>
                            <br>
                            <h4 style="color: white"> You have been successfully registered. <br> Your
                                user id is <span class="main-color"
                                    style="    color: #33ab71;font-weight: 700;">{{$user_details['username']  }}</span>
                                Password is: <span class="main-color" style="color: #33ab71;font-weight: 700;">
                                    {{$user_details['PSR']  }}</span> and Transaction Password is: <span class="main-color" style="color: #33ab71;font-weight: 700;">
                                        {{$user_details['TPSR']  }}</span>
                                please check your mail for more details.</h4>

                            @endif

                            <div class=" mt-7 mt-lg-8">
                                <a href="{{route('login')}}" type="" class="cmn-btn py-3 px-5 px-lg-6 mt-7 mt-lg-8 w-100 d-center"  id="submit">Login</a>
                            </div> 
                                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://tenorai.live/assets/iziToast.min.css">
    <script src="https://tenorai.live/assets/iziToast.min.js"></script>

    <script>
        "use strict";

        function notify(status, message) {
            iziToast[status]({
                message: message,
                position: "topRight"
            });
        }

    </script>
    <!-- payment gateway -->
   


    <script src="{{asset('')}}assets/themes/screaminlizard/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/owl.carousel.min.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/select2.min.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/apexcharts.min.js"></script>



    <script src="{{asset('')}}assets/themes/screaminlizard/js/notiflix-aio-2.7.0.min.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/pusher.min.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/vue.min.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/axios.min.js"></script>
    <!-- custom script -->
    <script src="{{asset('')}}assets/themes/screaminlizard/js/data.js"></script>
    <script src="{{asset('')}}assets/themes/screaminlizard/js/script.js"></script>









</body>

</html>
