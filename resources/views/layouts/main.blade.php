<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'JsonFile') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/site.js') }}" defer></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="{{ $data['site']->site_twitter }}" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="{{ $data['site']->site_facebook }}" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="{{ $data['site']->site_linkedin }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="{{ $data['site']->site_instagram }}" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>{{ $data['site']->site_logo_text }}</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <!-- <li><a href="#portfolio">Portfolio</a></li> -->
          <li><a href="#team">Team</a></li>
          <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#footer">Contact Us</a></li>

          <li>
            @guest
            <a class="btn btn-b-n" href="{{ route('login') }}">
              <span class="fa fa-sign-in fa-lg"></span>
            </a>
            @else
            <a class="" href="{{ route('user.home') }}">
                <div class="pull-left">
                  @if( Auth::user()->imageurl != null )
                      <img src="{{ asset('img/profile_pic/'.Auth::user()->imageurl) }}" style="width:40px; height:40px; border-radius: 100%;" alt="User Image">
                  @else
                      <img src="{{ asset('img/profile_pic/user.png') }}" style="width:40px; height:40px; border-radius: 100%;" alt="User Image">
                  @endif
                </div>
            </a>
            @endguest
            </li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->


    <div>
        @yield('content')
    </div>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

                <div class="col-sm-6">

                  <div class="footer-info">
                    <h3>{{ $data['site']->site_logo_text }}</h3>
                    <p>{{ $data['site']->site_about_us }}</p>
                  </div>

                  <div class="footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>{{ $data['content'][0]->p }}</p>
                    <form action="#" method="">
                      <input type="email" name="email"><input type="submit"  value="Subscribe">
                    </form>
                  </div>

                </div>

                <div class="col-sm-6">
                  <div class="footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                      <li><a href="{{ route('homepage') }}">Home</a></li>
                      <li><a href="#about">About us</a></li>
                      <li><a href="#services">Services</a></li>
                      <li><a href="#faq">Terms of service</a></li>
                      <li><a href="#faq">Privacy policy</a></li>
                    </ul>
                  </div>

                  <div class="footer-links">
                    <h4>Contact Us</h4>
                    <p>{{ $data['site']->site_address }} <br>
                      <strong>Phone:</strong> {{ $data['site']->site_phone }} <br>
                      <strong>Email:</strong> {{ $data['site']->site_email }}<br>
                    </p>
                  </div>

                  <div class="social-links">
                    <a href="{{ $data['site']->site_twitter }}" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $data['site']->site_facebook }}" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $data['site']->site_instagram }}" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="{{ $data['site']->site_linkedin }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  </div>

                </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">
              
              <h4>Send us a message</h4>
              <p>Eos ipsa est voluptates. Nostrum nam libero ipsa vero. Debitis quasi sit eaque numquam similique commodi harum aut temporibus.</p>
              <form action="#" method="" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>

          </div>

          

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>{{ $data['site']->site_name }}</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <a href="{{ route('homepage') }}">{{ $data['site']->site_name }}</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <!-- <script src="lib/jquery/jquery.min.js"></script> -->
  <!-- <script src="lib/jquery/jquery-migrate.min.js"></script> -->
  <!-- <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="lib/easing/easing.min.js"></script> -->
  <!-- <script src="lib/mobile-nav/mobile-nav.js"></script> -->
  <!-- <script src="lib/wow/wow.min.js"></script> -->
  <!-- <script src="lib/waypoints/waypoints.min.js"></script> -->
  <!-- <script src="lib/counterup/counterup.min.js"></script> -->
  <!-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->
  <!-- <script src="lib/isotope/isotope.pkgd.min.js"></script> -->
  <!-- <script src="lib/lightbox/js/lightbox.min.js"></script> -->
  <!-- Contact Form JavaScript File -->
  <!-- <script src="contactform/contactform.js"></script> -->
  <!-- Template Main Javascript File -->
  <!-- <script src="js/main.js"></script> -->
</body> 
</html>