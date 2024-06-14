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
    <base href="https://tenorai.live/">
    <meta name="description"
        content="Join Tenor Ai , the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta name="keywords"
        content="investment, HYIP, HYIP investment, hyip website, invest, investment, Investment Management system, investment script, Bug Finder, bug-finder, bugfinder.net, bugfinder">
    <link rel="shortcut icon" href="assets/upload/logo/sfavicon.png" type="image/x-icon">

    <link rel="apple-touch-icon" href="{{asset('')}}assets/uploads/gateway/logo.png">
    <title>Tenor AI | About Us</title>
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{asset('')}}assets/uploads/gateway/favicon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Tenor AI | About Us">

    <meta itemprop="name" content="Tenor AI | About Us">
    <meta itemprop="description"
        content="Join Tenor Ai , the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta itemprop="image"
        content="https://tenorai.live/{{asset('')}}assets/uploads/gateway/tenor.png">

    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Join Tenor Ai , the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta property="og:description"
        content="Join Tenor Ai , the top-notch arbitrage trading platform, offering manual and auto trading solutions, liquidity farming, and a lucrative referral program. Start profiting from the market imbalances today and earn up to 10% commissions by referring others">
    <meta property="og:image"
        content="https://tenorai.live/{{asset('')}}assets/uploads/gateway/tenor.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:url" content="https://tenorai.live/">

    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}assets/themes/screaminlizard/css/bootstrap.min.css" />

    <!-- owl carousel -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}assets/themes/screaminlizard/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}assets/themes/screaminlizard/css/owl.theme.default.min.css">

    <!-- select 2 -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}assets/themes/screaminlizard/css/select2.min.css">

    <script src="{{asset('')}}assets/themes/screaminlizard/js/fontawesomepro.js"></script>
    <link rel="stylesheet" type="text/css"
        href="{{asset('')}}assets/themes/screaminlizard/css/style.css">
    <script src="{{asset('')}}assets/themes/screaminlizard/js/modernizr.custom.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="application/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="application/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- navbar -->
    

    <!-- PAGE-BANNER -->
    <style>
        .banner-section {
            background: url("{{asset('')}}assest2/uploads/gateway/banner.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        }

    </style>
     <style>
        .error {
            color: green;
            font-size: 1.3em;
            margin-top: 5px;
            list-style-type: none;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            /* Adjust this value to control the spacing */
        }

        .logo img {
            width: 180px;
            height: auto;
        }
    </style>
    </style>
    <style>
    .login-section {
        background: url("{{ asset('main/assets/images/testi-bg.jpg') }}") no-repeat center center;
        background-size: cover;
        min-height: 100vh; /* Ensures it covers the full viewport height */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px; /* Optional: Add padding for better spacing */
    }

    
</style>

    <!-- banner section -->
    
    <!-- banner section -->

    <!-- register start -->
    <section class="login-section register">
        <div class="container">
            <div class="row justify-content-center align-items-end">
                <div class="col-lg-7 col-md-8">
                    <div class="form-wrapper">
                        <div class="form-box">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-influencer" role="tabpanel"
                                    aria-labelledby="pills-influencer-tab">
                                  
                                    <form action="{{ route('registers') }}" method="post">
                                        @csrf
                                        <div class="logo">
                                    <a href="{{ route('Index') }}">
                                        <img src="{{ asset('main/assets/images/logo.png') }}"
                                            alt="Logo">
                                    </a>
                                </div>
                                        @if($errors->any())
                                            <div class="error">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @csrf

@php
$sponsor = @$_GET['ref'];
$name = \App\Models\User::where('username', $sponsor)->first();
@endphp
                 
<div class="mb-4">
                                        <h4>Create an account</h4>
                                    </div>
                                        <div class="row g-4">
                                            <div class="input-box col-lg-6">
                                                <input type="text" id="signupform-referral"
                                                    class="form-control check_sponsor_exist" name="sponsor" value=""
                                                    data-response="sponsor_res" placeholder="Sponsor Id">
                                                    <span id="sponsor_res"><?=($name)?$name->name:"";?></span>
                                            </div>
                                           
                                            <div class="input-box col-lg-6">
                                                <input type="text" name="name" class="form-control" value=""
                                                    placeholder="Name" autocomplete="off" />
                                            </div>

                                            <div class="input-box col-lg-6">
                                                <input type="text" name="email" class="form-control" value=""
                                                    placeholder="Email Id" autocomplete="off" />
                                            </div>


                                            <div class="input-box col-lg-6">
                                                <input type="text" name="phone" class="form-control dialcode-set"
                                                    value="" placeholder="Mobile No" />
                                            </div>


                                            <div class="input-box col-lg-6">
                                                <input type="password" name="password" value="" class="form-control"
                                                    placeholder="Password" />
                                            </div>
                                            <div class="input-box col-lg-6">
                                                <input type="password" name="confirmation_password" value="" class="form-control"
                                                    placeholder="Confirm Password" />
                                            </div>

                                          

                      

                                            <div class="col-12">
                                                <div class="links">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault" />
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            I Agree with the Terms & conditions </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn-custom w-100" type="submit">sign up</button>
                                        <div class="bottom">
                                            Do you already have an account? <a href="{{route('login')}}">Login here</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register end -->

    <!-- footer section -->
    <!-- payment gateway -->
  
    <!-- footer section -->
   



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





    <script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>
    <script>
        $('.check_sponsor_exist').keyup(function (e) {
            var ths = $(this);
            var res_area = $(ths).attr('data-response');
            var sponsor = $(this).val();
            // alert(sponsor); 
            $.ajax({
                type: "POST",
                url: "{{ route('getUserName') }}",
                data: {
                    "user_id": sponsor,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    // alert(response);      
                    if (response != 1) {
                        // alert("hh");
                        $(".submit-btn").prop("disabled", false);
                        $('#' + res_area).html(response).css('color', '#fff').css('font-weight',
                                '800')
                            .css('margin-buttom', '10px');
                    } else {
                        // alert("hi");
                        $(".submit-btn").prop("disabled", true);
                        $('#' + res_area).html("Sponsor ID Not exists!").css('color', 'red').css(
                            'margin-buttom', '10px');
                    }
                }
            });
        });

    </script>


</body>

</html>






