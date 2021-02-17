<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Engineering Solution</title>
    <link rel="icon" href="{{asset('images/thumbnail/'.$dashboard_setting->fav_icon)}}" type="image/gif">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/inner.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">



</head>
<body>

    <header id="header-parent">
        <div class="top-menu-bar">
            <span class="menu-line"></span>
            <span class="menu-line"></span>
            <span class="menu-line"></span>
        </div>
        <div class="top-header">
            <div class="container">
                <div class="top-head-wrapper">
                    <p><i class="fa fa-phone" aria-hidden="true" ></i>  +1-{{$dashboard_setting->cell}}</p>
                    <span><i class="fa fa-envelope" aria-hidden="true" ></i> <a href="mailto: {{$dashboard_setting->email}} ">{{$dashboard_setting->email}}</a> </span>
                    <ul class="header-social-media">
                        <li><a href="{{$dashboard_setting->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="{{$dashboard_setting->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="{{$dashboard_setting->linkedin}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="mailto: {{$dashboard_setting->email}}" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="main-header-wrapper">
                    <a href="{{route('home')}}" class="logo"><img src="{{asset('images/thumbnail/'.$dashboard_setting->logo)}}" alt="logo"></a>
                   
                    <nav id="main-nav">
                        <ul>
                            <li><a href="{{route('home')}}">Home </a></li>
                            <li class="sub-menu-parent"><a href="{{route('services')}}" class="link">Our Services </a>
                                <ul id="sub-menu">
                                    @foreach($dashboard_service as $service)
                                    <li><a href="{{route('serviceInner',$service->slug)}}">{{$service->title}}</a></li>
                                    @endforeach
                                    </li>
                                </ul>


                            </li>
                            <li><a href="{{route('page',['referral-programs'])}}">Referral Program</a></li>
                            <li><a href="{{route('page',['career'])}}">Career</a></li>
                            <li><a href="{{route('allBlogs')}}">Blog</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                            <li><a href="{{route('payment')}}">Payment</a></li>
                            <li class="quote-btn-wrapper"><a id="quote-button" href="{{route('payment')}}">Payment</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="blank-div"></div>

    <div class="get-info-wrapp scrolled"><a href="{{route('quote')}}">Get A Free Quote</a></div>


    <!-- header section ends -->
    @yield('content')

      <!-- footer section starts -->

  <footer class="all-sec-padding footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="footer-logo-part">
                        <a href="index.php" class="footer-logo"><img src="{{asset('images/thumbnail/'.$dashboard_setting->footer_logo)}}" alt="footer-logo"></a>
                        
                        <p>{{$dashboard_setting->footer_description}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-col-wrapper">
                        <h3>Contact</h3>
                        <ul class="footer-list">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$dashboard_setting->address}}</li>
                            <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Phone:+1 ({{$dashboard_setting->phone}})</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">Email: {{$dashboard_setting->email}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <div class="footer-col-wrapper">
                        <h3>Quick Links</h3>

                        <ul class="footer-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <!-- <li><a href="service.php">Our Services</a></li> -->
                            <li><a href="{{route('page',['referral-programs'])}}">Programmes</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-col-wrapper">
                         
                        <h3>Subscribe</h3>
                        <p>Get updates & latest notification</p>
                        @if(Session::has('subscription_message'))
                                        <div class="alert alert-success alert-dismissible message">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {!! Session::get('subscription_message') !!}
                                        </div>
                                    @endif
                        <form action="{{route('subscription')}}" method="post" class="footer-form">
                        @csrf
                            <input type="email" name="email" placeholder="Enter Email">
                            <button class="footer-btn">Send</button>
                           
                        </form>
                        
                    </div>
                    @if($errors->has('email'))
                                    <span class="alert-danger">{{$errors->first('email')}}</span>
                                @endif
                                  
                </div>  
            </div>
        </div>

    </footer>
   
    <div class="design-content">
        <div class="container">
            <div class="design-content-wrapper">
                <p>Copyright © Elite3Engineering All Rights Reserved.</p>
                <p>Design & Developed By<a href="https://webhousenepal.com/" target="_blank">Web House Nepal</a></p>
            </div>
        </div>
    </div>
    

    <script src="{{asset('front/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/slick.min.js')}}"></script>
    <script src="{{asset('front/js/custom.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $(window).resize(function() {
              // This will execute whenever the window is resized
              $(window).height(); // New height
              if($(window).width()<992){
                
                $('.link').attr('href','#');
              }else{
                $('.link').attr('href','{{route('services')}}');
              }// New width
            });
        });
    </script>
    @stack('scripts')

</body>
</html>

