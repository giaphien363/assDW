<!DOCTYPE html>
<html lang="en">

<head>
   <!-- meta -->
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Folio - Personal Portfolio Template</title>
   <meta content="" name="keywords">
   <meta content="" name="description">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

   <!-- Bootstrap CSS File -->
   <link href="{{ asset('home_page/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

   <!-- Libraries CSS Files -->
   <link href="{{ asset('home_page/lib/ionicons/css/ionicons.min.css') }} " rel="stylesheet">
   <link href="{{ asset('home_page/lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">
   <link href="{{ asset('home_page/lib/magnific-popup/magnific-popup.css') }} " rel="stylesheet">
   <link href="{{ asset('home_page/lib/hover/hover.min.css') }} " rel="stylesheet">

   <!-- Main Stylesheet File -->
   <link href="{{ asset('home_page/css/style.css') }}" rel="stylesheet">

   <!-- Responsive css -->
   <link href="{{ asset('home_page/css/responsive.css') }} " rel="stylesheet">

   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.png">

   <!-- =======================================================
    Theme Name: Folio
    Theme URL: https://bootstrapmade.com/folio-bootstrap-portfolio-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

   <!-- start section navbar -->
   <nav id="main-nav">
      <div class="row">
         <div class="container">

            <div class="logo">
               <a href="javascript:void(0)"><img src="{{ asset('home_page/images/change-512x512.png') }}" alt="logo"></a>
            </div>

            <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>

            <ul class="nav-menu list-unstyled">
               <li><a href="#header" class="smoothScroll">Home</a></li>
               <li><a href="#contact" class="smoothScroll">Contact</a></li>
               
               @if(Auth::check())

               <li><a href="{{ route('dashboard') }}" class="smoothScroll">dashboard</a></li>
               @else
               <li><a href="{{ route('login') }}" class="smoothScroll">Login</a></li>
               @endif

            </ul>

         </div>
      </div>
   </nav>
   <!-- End section navbar -->


   <!-- start section header -->
   <div id="header" class="home">

      <div class="container">
         <div class="header-content">
            <h1>I'm <span class="typed"></span></h1>
            <p>designer, developer</p>

            <ul class="list-unstyled list-social">
               <li><a href="#"><i class="ion-social-facebook"></i></a></li>
               <li><a href="#"><i class="ion-social-twitter"></i></a></li>
               <li><a href="#"><i class="ion-social-instagram"></i></a></li>
               <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
               <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
               <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
   <!-- End section header -->


   <!-- start section about us -->
   <div id="about" class="paddsection">
      <div class="container">
         <div class="row justify-content-between">

            <div class="col-lg-4 ">
               <div class="div-img-bg">
                  <div class="about-img">
                     <img src="{{ asset('home_page/images/me.jpg') }}" class="img-responsive" alt="me">
                  </div>
               </div>
            </div>

            <div class="col-lg-7">
               <div class="about-descr">

                  <p class="p-heading">im a ux /ui designer austin based who loves clean, simple & unique design. i also enjoy crafting brand identities, icons, & ilustration work. </p>
                  <p class="separator">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family.English person.</p>

               </div>

            </div>
         </div>
      </div>
   </div>
   <!-- end section about us -->


   <!-- start section services -->
   <div id="services">
      <div class="container">

         <div class="services-carousel owl-theme">

            <div class="services-block">

               <i class="ion-ios-browsers-outline"></i>
               <span>UI/UX DESIGN</span>
               <p class="separator">To an English person, it will seem like simplified English,told me what </p>

            </div>

            <div class="services-block">

               <i class="ion-ios-lightbulb-outline"></i>
               <span>BRAND IDENTITY</span>
               <p class="separator">To an English person, it will seem like simplified English,told me what </p>

            </div>

            <div class="services-block">

               <i class="ion-ios-color-wand-outline"></i>
               <span>WEB DESIGN</span>
               <p class="separator">To an English person, it will seem like simplified English,told me what </p>

            </div>

            <div class="services-block">

               <i class="ion-social-android-outline"></i>
               <span>MOBILE APPS</span>
               <p class="separator">To an English person, it will seem like simplified English,told me what </p>

            </div>

            <div class="services-block">

               <i class="ion-ios-analytics-outline"></i>
               <span>Analytics</span>
               <p class="separator">To an English person, it will seem like simplified English,told me what </p>

            </div>

            <div class="services-block">

               <i class="ion-ios-camera-outline"></i>
               <span>PHOTOGRAPHY</span>
               <p class="separator">To an English person, it will seem like simplified English,told me what </p>

            </div>

         </div>

      </div>

   </div>
   <!-- end section services -->


   <!-- start section portfolio -->
   <div id="portfolio" class="text-center paddsection">

      <div class="container">
         <div class="section-title text-center">
            <h2>My Portfolio</h2>
         </div>
      </div>

      <div class="container">
         <div class="row">
            <div class="col-md-12">

               <div class="portfolio-list">

                  <ul class="nav list-unstyled" id="portfolio-flters">
                     <li class="filter filter-active" data-filter=".all">all</li>
                     <li class="filter" data-filter=".branding">branding</li>
                     <li class="filter" data-filter=".mockups">mockups</li>
                     <li class="filter" data-filter=".uikits">ui kits</li>
                     <li class="filter" data-filter=".webdesign">web design</li>
                     <li class="filter" data-filter=".photography">photography</li>
                  </ul>

               </div>

               <div class="portfolio-container">

                  <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding uikits webdesign">
                     <a class="popup-img" href="javascript: void(0)">
                        <img src="{{ asset('home_page/images/portfolio/1.jpg') }}" alt="img">
                     </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups uikits photography">
                     <a class="popup-img" href="javascript: void(0)">
                        <img src="{{ asset('home_page/images/portfolio/2.jpg') }}" alt="img">
                     </a>
                  </div>


                  <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding uikits webdesign">
                     <a class="popup-img" href="javascript: void(0)">
                        <img src="{{ asset('home_page/images/portfolio/3.jpg') }}" alt="img">
                     </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups uikits photography">
                     <a class="popup-img" href="javascript: void(0)">
                        <img src="{{ asset('home_page/images/portfolio/4.jpg') }}" alt="img">
                     </a>
                  </div>


                  <div class="col-lg-4 col-md-6 portfolio-thumbnail all branding uikits webdesign">
                     <a class="popup-img" href="javascript: void(0)">
                        <img src="{{ asset('home_page/images/portfolio/5.jpg') }}" alt="img">
                     </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-thumbnail all mockups uikits photography">
                     <a class="popup-img" href="javascript: void(0)">
                        <img src="{{ asset('home_page/images/portfolio/6.jpg') }}" alt="img">
                     </a>
                  </div>



               </div>
            </div>
         </div>
      </div>

   </div>
   <!-- End section portfolio -->


   <!-- start section journal -->
   <div id="journal" class="text-left paddsection">

      <div class="container">
         <div class="section-title text-center">
            <h2>journal</h2>
         </div>
      </div>

      <div class="container">
         <div class="journal-block">
            <div class="row">

               <div class="col-lg-4 col-md-6">
                  <div class="journal-info">

                     <a href="javascript: void(0)"><img src="{{ asset('home_page/images/blog-post-1.jpg') }}" class="img-responsive" alt="img"></a>

                     <div class="journal-txt">

                        <h4><a href="javascript: void(0)">SO LETS MAKE THE MOST IS BEAUTIFUL</a></h4>
                        <p class="separator">To an English person, it will seem like simplified English
                        </p>

                     </div>

                  </div>
               </div>

               <div class="col-lg-4 col-md-6">
                  <div class="journal-info">

                     <a href="javascript: void(0)"><img src="{{ asset('home_page/images/blog-post-2.jpg') }}" class="img-responsive" alt="img"></a>

                     <div class="journal-txt">

                        <h4><a href="javascript: void(0)">WE'RE GONA MAKE DREAMS COMES</a></h4>
                        <p class="separator">To an English person, it will seem like simplified English
                        </p>

                     </div>

                  </div>
               </div>

               <div class="col-lg-4 col-md-6">
                  <div class="journal-info">

                     <a href="javascript: void(0)"><img src="{{ asset('home_page/images/blog-post-3.jpg') }}" class="img-responsive" alt="img"></a>

                     <div class="journal-txt">

                        <h4><a href="javascript: void(0)">NEW LIFE CIVILIZATIONS TO BOLDLY</a></h4>
                        <p class="separator">To an English person, it will seem like simplified English
                        </p>

                     </div>

                  </div>
               </div>

            </div>
         </div>
      </div>

   </div>
   <!-- End section journal -->


   <!-- start sectoion contact -->
   <div id="contact" class="paddsection">
      <div class="container">
         <div class="contact-block1">
            <div class="row">

               <div class="col-lg-6">
                  <div class="contact-contact">

                     <h2 class="mb-30">GET IN TOUCH</h2>

                     <ul class="contact-details">
                        <li><span>23 Main, Street</span></li>
                        <li><span>New York, United States</span></li>
                        <li><span>+88 01912704287</span></li>
                        <li><span>example@example.com</span></li>
                     </ul>

                  </div>
               </div>

               <div class="col-lg-6">
                  <form action="" method="post" role="form" class="contactForm">
                     <div class="row">

                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>

                        <div class="col-lg-6">
                           <div class="form-group contact-block1">
                              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                              <div class="validation"></div>
                           </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="form-group">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                              <div class="validation"></div>
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                              <div class="validation"></div>
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                              <textarea class="form-control" name="message" rows="12" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                              <div class="validation"></div>
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <input type="submit" class="btn btn-defeault btn-send" value="Send message">
                        </div>

                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- start sectoion contact -->


   <!-- start section footer -->
   <div id="footer" class="text-center">
      <div class="container">
         <div class="socials-media text-center">

            <ul class="list-unstyled">
               <li><a href="#"><i class="ion-social-facebook"></i></a></li>
               <li><a href="#"><i class="ion-social-twitter"></i></a></li>
               <li><a href="#"><i class="ion-social-instagram"></i></a></li>
               <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
               <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
               <li><a href="#"><i class="ion-social-dribbble"></i></a></li>
            </ul>

         </div>

      </div>
   </div>
   <!-- End section footer -->

   <!-- JavaScript Libraries -->
   <script src="{{ asset('home_page/lib/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('home_page/lib/jquery/jquery-migrate.min.js') }}"></script>
   <script src="{{ asset('home_page/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('home_page/lib/typed/typed.js') }}"></script>
   <script src="{{ asset('home_page/lib/owlcarousel/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('home_page/lib/magnific-popup/magnific-popup.min.js') }}"></script>
   <script src="{{ asset('home_page/lib/isotope/isotope.pkgd.min.js') }}"></script>

   <!-- Template Main Javascript File -->
   <script src="{{ asset('home_page/js/main.js') }}"></script>

</body>

</html>