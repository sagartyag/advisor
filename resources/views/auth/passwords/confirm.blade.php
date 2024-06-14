<!doctype html>
<html lang="en">

<head>
    <!-- required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- #keywords -->
        <meta name="keywords" content="boot, Bootstrap, Forex and Stock Broker platform">
    <!-- #description -->
    <meta name="description" content="Forex and Stock Broker platform">
    <!-- #title -->
    <title>{{siteName()}} - Forgot Password </title>
    <!-- #favicon -->
    <link rel="shortcut icon" href="{{asset('')}}main/assets/images/fav.png" type="image/x-icon">
    <!-- ==== css dependencies start ==== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.36.0/tabler-icons.min.css">
    <link rel="stylesheet" href="{{asset('')}}main/assets/css/style.min.css">
</head>
<body>
     <!--  Preloader  -->
    <div class="preloader">
        <span class="loader"></span>
    </div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <button class="scrollToTop d-none d-md-flex d-center rounded" aria-label="scroll Bar Button"><i class="mat-icon fs-four nb4-color ti ti-arrow-up"></i></button>
    <!-- Scroll To Top End -->

    <!-- Start Custom Cursor -->
    <div class="mouse-follower">
        <span class="cursor-outline"></span>
        <span class="cursor-dot"></span>
    </div>
    <!-- End Custom Cursor -->

    <!-- Contact start -->
    <section class="sign nb4-bg h-100 d-flex align-items-center position-relative z-0">
        <div class="animation position-absolute top-0 left-0 w-100 h-100 z-n1">
            <img src="{{asset('')}}main/assets/images/star.png" alt="vector" class="position-absolute push_animat">
        </div>
        <div class="container ">
            <div class="row align-items-center justify-content-center justify-content-xl-start">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="welcome alt-color text-center text-md-start pt-120 pb-120 position-relative z-0">
                        <h1 class="display-one">Welcome Back!</h1>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 col-xxl-5 offset-xxl-1 text-center ms-xl-auto">
                    <div class="sign__content ms-md-5 ms-xxl-0 pt-120 pb-120">
                        <div class="head_part">
                            <a href="{{route('Index')}}"> <img src="{{asset('')}}main/assets/images/logo.png" alt="Logo"></a>
                            <h5 class="mt-5 mt-lg-6">Confirmation</h5>
                        </div>
                        <form method="POST" action="{{route('verifyCode')}}" autocomplete="off" id="frmContactus" class="contact__form mt-8 mt-lg-10  text-start">
                        {{ csrf_field() }}
                            <div class="d-flex flex-column gap-5 gap-lg-6 ">
                                <div class="row g-5 g-lg-6">
                                   
                              
                                <div class="single-input">
                                    <label class="mb-2 nw1-color" for="cpassword">Verification Code </label>
                                    <div class="input-pass">
                                        <input type="text" class="fs-six-up bg_transparent pe-13" name="code" id="cpassword" placeholder="enter verfication code" 
                                        required>
                                        <input type="hidden"  value="{{$userID}}" class="form-control" name="userID" >
                                   
                                    </div>
                                </div>
                                
                                
                              
                               
                            </div>
                            
                            <div class=" mt-7 mt-lg-8">
                                <button type="submit" class="cmn-btn py-3 px-5 px-lg-6 mt-7 mt-lg-8 w-100 d-center" name="submit" id="submit">Submit</button>
                            </div>
                        </form>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact end -->
@include('partials.notify')
    <!-- ==== js dependencies start ==== -->
    <script src="{{asset('')}}main/assets/js/plugins/plugins.js"></script>
    <script src="{{asset('')}}main/assets/js/plugins/plugin-custom.js"></script>
    <script src="{{asset('')}}main/assets/js/main.js"></script>
</body>

</html>