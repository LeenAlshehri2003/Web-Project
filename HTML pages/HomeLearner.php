<?php
session_start();
// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // store a message to display after redirecting
    $_SESSION['error'] = "You must log in to view this page";
    header("Location: SignInLearner.php"); // Redirect to the login page
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Home page of learner </title>
    <meta name="keywords" content="online education, e-learning, coaching, education, teaching, learning">
    <meta name="description" content="LinguaLink is a e-learnibg HTML website for language education ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/header_logo_LinguaLink.svg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/font.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/nice-select.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/spacing.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- preloader end  -->
    <header>
        <div id="theme-menu-two" class="main-header-area main-head-three pl-100 pr-100 pt-20 pb-15">
            <div class="container-fluid">
                <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-5">
                            <div class="logo"><a href="HomeLearner.php"><img src="../assets/img/logo/header_logo_LinguaLink.svg" alt="LingualLink"></a></div>
                        </div>
                        <div class="col-xl-7 col-lg-8 d-none d-lg-block">
                            <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                                <div class="nav-container">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown mega-menu">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                All Languages 
                                                </a>
                                                <ul class="dropdown-menu submenu mega-menu__sub-menu-box" aria-labelledby="navbarDropdown">
                                                    <li><a href="Partnerlist%20English.php#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> English</a></li>
                                                    <li><a href="Partnerlist%20French.php#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> French</a></li>
                                                    <li><a href="Partnerlist%20Spanish.php#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Spanish</a></li>
                                                    <li><a href="Partnerlist%20Arabic.php#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Arabic</a></li>
                                                    <li><a href="Partnerlist%20Italien.php#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span>Italien</a></li>
                                                    <li><a href="Partnerlist%20Japanese.php#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Japanese</a></li>
                                                    <li><a href="Partnerlist%20Chinese.php#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Chinese</a></li>
                                            </ul>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                                    <li><a class="dropdown-item" href="Partnerlist.php">View partners List</a></li>
                                                    <li><a class="dropdown-item" href="View Requests- Learner.php">Manage requests</a></li>
                                                    <li><a class="dropdown-item" href="View sessions - Learner.php">View sessions </a></li>
                                                    <li><a class="dropdown-item" href="faqHomeLearner.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                           
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Want to Know More?</a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                           
                                                    <li><a class="dropdown-item" href="faqHomeLearner.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                         
                                            <li class="nav-item">
                                            <a class="nav-link" href="mailto:LingualLink@gmail.com" id="navbarDropdown5" role="button"  aria-expanded="false">Contact Us!</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-7">
                            <div class="right-nav d-flex align-items-center justify-content-end">
                                <div class="right-btn mr-25 mr-xs-15">
                                    <ul class="d-flex align-items-center">
                                        <li><a href="../assets/php/Signout.php" id="signout" class="theme_btn free_btn">Sign Out</a></li>
                                        <li><a class="sign-in ml-20" href="ProfilePage-LanguageLearner.php"><img src="../assets/img/icon/user.svg" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="hamburger-menu d-md-inline-block d-lg-none text-right">
                                    <a href="javascript:void(0);">
                                        <i class="far fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div> <!-- /.theme-main-menu -->
    </header>


    

    <main>
       <!--slider-area start-->
       <section class="slider-area slider-gradient-bg pt-180 pb-100 pb-xs-50">
           <img class="sl-shape shape_01" src="../assets/img/icon/01.svg" alt="Shapes for website design">
            <img class="sl-shape shape_02" src="../assets/img/icon/02.svg" alt="Shapes for website design">
            <img class="sl-shape shape_03" src="../assets/img/icon/03.svg" alt="Shapes for website design">
            <img class="sl-shape shape_04" src="../assets/img/icon/04.svg" alt="Shapes for website design">
            <img class="sl-shape shape_05" src="../assets/img/icon/05.svg" alt="Shapes for website design">
            <img class="sl-shape shape_06" src="../assets/img/icon/06.svg" alt="Shapes for website design">
           <div class="main-slider">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="slider__content slider__content__02 pt-120">
                                <h5 class="left-line mb-20 pl-40 wow fadeInUp2 animated" data-wow-delay='.1s'>Welcome</h5>
                                <h1 class="main-title mb-40 wow fadeInUp2 animated" data-wow-delay='.2s'>Start Learning Today!</h1>
                                <h5 class="mb-35 wow fadeInUp2 animated" data-wow-delay='.3s'>Book your sessions from the "Manage requests" page .</h5>
                                <ul class="search__area d-md-inline-flex align-items-center justify-content-between mb-30 wow fadeInUp animated" data-delay="1.5s">
                                    
                                   
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="slider-img-box-two">
                                <div class="chose-img-wrapper mb-50 pos-rel">
                                    <img class="shape-avatar-bg" src="../assets/img/slider/avatar-bg.png" alt="">
                                    <div class="coures-member">
                                        <h5>Students</h5>
                              
                                        <span>25k+</span>
                                    </div>
                                    <div class="feature tag_01"><span><img src="../assets/img/icon/shield-check.svg" alt="Shapes for website design"></span> Safe & Secured</div>
                                    <div class="feature tag_02"><span><img src="../assets/img/icon/catalog.svg" alt="Shapes for website design"></span> 120+ Partners</div>
                                   
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </section>
       <!--slider-area end-->

       <script>
        window.onload = function() {
            <?php
            if (isset($_SESSION['registration_success'])) {
                echo "Swal.fire({
                    title: 'Success!',
                    text: '" . addslashes($_SESSION['registration_success']) . "',
                    icon: 'success',
                    confirmButtonText: 'Great!'
                });";
                unset($_SESSION['registration_success']);
            }
            ?>
        };
    </script> 
      
      
       <!--what-loking-for start-->
       <br><br><br><br><br><br><br>
       <section class="what-looking-for pos-rel gradient-bg pt-135 pb-115 pt-md-90 pb-md-70 pt-xs-90 pb-xs-70">
           <div class="what-blur-bg-three"></div>
            <div class="container">
                
                
                <div class="row">
                   <div class="col-lg-4 col-md-6">
                       <div class="single-box s-box-2 mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <div class="single-box__icon mb-25">
                                <img src="../assets/img/icon/skill-level-intermediate.svg" alt="">
                            </div>
                            <h4 class="sub-title mb-10">Learn New Skills</h4>
                        </div>
                   </div>
                   <div class="col-lg-4 col-md-6">
                       <div class="single-box s-box-2 sb-box-01 mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>
                            <div class="single-box__icon icon_02 mb-25">
                                <img src="../assets/img/icon/avatar-outline-alerted.svg" alt="">
                            </div>
                            <h4 class="sub-title mb-10">Expert Partners</h4>
                        </div>
                   </div>
                   <div class="col-lg-4 col-md-6">
                       <div class="single-box s-box-2 sb-box-02 mb-30 wow fadeInUp2 animated" data-wow-delay='.3s'>
                            <div class="single-box__icon icon_03 mb-25">
                                <img src="../assets/img/icon/report.svg" alt="">
                            </div>
                            <h4 class="sub-title mb-10">Free Initial Session</h4>
                        </div>
                   </div>
                </div>
            </div>
       </section>
       <!--what-loking-for end-->




       <!-- testimonial-area start -->
       <section class="testimonial-area nav-style-chevron pt-150 pb-120 pt-md-95 pb-md-70 pt-xs-95 pb-xs-5">
        <div class="container testimonial-bg">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title section-title-2 text-center mb-60">
                        <h5 class="bottom-line left-line mb-25 pl-40 pr-40">LinguaLink's Friends!</h5>
                        <h2 class="mb-25">What people say About Us</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="testimonial-active-full owl-carousel">
                        <div class="item">
                            <div class="testimonial-wrapper test-wrapper-full text-center mb-30">
                                <div class="quote-icon mb-20">
                                    <img src="../assets/img/icon/Quotemarks-right.svg" alt="quote-icon">
                                </div>
                                <h5>I have gained extreme benefit from this site.</h5>
                                <div class="testimonial-authors__content mt-65">
                                    <h3 class="mb-15">Sara William</h3>
                                    <p>Content Writing</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-wrapper test-wrapper-full text-center mb-30">
                                <div class="quote-icon mb-20">
                                    <img src="../assets/img/icon/Quotemarks-right.svg" alt="quote-icon">
                                </div>
                                <h5>The partners are great.</h5>
                                <div class="testimonial-authors__content mt-65">
                                    <h3 class="mb-15">Norah Almubarak</h3>
                                    <p>Designer</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-wrapper test-wrapper-full text-center mb-30">
                                <div class="quote-icon mb-20">
                                    <img src="../assets/img/icon/Quotemarks-right.svg" alt="quote-icon">
                                </div>
                                <h5>I love this! so amazing to learn from home.</h5>
                                <div class="testimonial-authors__content mt-65">
                                    <h3 class="mb-15">Leen Alshehri</h3>
                                    <p>Nurse</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
       </section>
       <!-- testimonial-area end -->





       <!-- faq-area start -->
       <section class="faq-area pos-rel gradient-bg pt-150 pb-120 pt-md-95 pb-md-90 pt-xs-95 pb-xs-90">
        <div class="faq-blur-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-6">
                    <div class="faq-que-list pl-75 mb-30">
                        <div class="section-title section-title-2 mb-45">
                            <h5 class="bottom-line left-line mb-25 pl-40">Questions</h5>
                            <h2 class="mb-25">Do you have questions?</h2>
                        </div>
                       
                    </div>
                    <div class="faq-btn pl-75 mt-50">
                        <a href="mailto:LingualLink@gmail.com" class="theme_btn">Ask Us!</a>
                    </div>
                </div>
            </div>
        </div>
       </section>
       <!-- faq-area end -->
     
    </main>















   <!--footer-area start-->
<footer class="footer-area footer-bg pt-220 pb-25 pt-md-100 pt-xs-100">
    <div class="footer-blur"></div>
    <div class="container">
        <div class="row mb-15">
            <div class="col-xl-3 col-lg-4 col-md-6  wow fadeInUp2 animated" data-wow-delay='.1s'>
                <div class="footer__widget mb-30">
                    <div class="footer-log mb-20">
                        <a href="LandingPage.html" class="logo">
                            <img src="../assets/img/logo/header_logo_LinguaLink.svg" alt="Logo of linguaLink">
                        </a>
                    </div>
                    <p>With LinguaLink, you can learn and excel in any language you desire. So hop on the ride!</p>
                    <div class="social-media footer__social mt-30">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp2 animated" data-wow-delay='.3s'>
                <div class="footer__widget mb-30 pl-40 pl-md-0 pl-xs-0">
                   
                    <ul class="fot-list">
                        
                        
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6  wow fadeInUp2 animated" data-wow-delay='.5s'>
                <div class="footer__widget mb-25 pl-65 pl-md-0 pl-xs-0">
                    <h6 class="widget-title mb-35">Contact us</h6>
                    <ul class="fot-list">
                        <li><a href="mailto:LingualLink@gmail.com">LingualLink@gmail.com</a></li>
                  
                        <li><a href="#">+966 533 799 602</a></li>
    
                        
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
    
        
     <div class="copy-right-area border-bot pt-40">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="copyright">
                        <h5>Copyright@ 2024 <a href="#">LingualLink</a>. All Rights Reserved</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!--footer-area end-->




<!-- JS here -->

<script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/isotope.pkgd.min.js"></script>
<script src="../assets/js/slick.min.js"></script>
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/jquery.nice-select.js"></script>
<script src="../assets/js/ajax-form.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<script src="../assets/js/jquery.scrollUp.min.js"></script>
<script src="../assets/js/imagesloaded.pkgd.min.js"></script>
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<script src="../assets/js/jquery.easypiechart.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/main.js"></script>
</body>

</html>

