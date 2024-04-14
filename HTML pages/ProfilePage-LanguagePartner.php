<?php include 'load_partner_profile.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Language Partner Profile Page</title>
    <meta name="keywords" content="online education, e-learning, coaching, education, teaching, learning">
    <meta name="description" content="LinguaLink is a e-learning HTML website for language education ">
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

    <link rel="stylesheet" href="../assets/css/info-container.css">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
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
                            <div class="logo"><a href="HomePartner.html"><img src="../assets/img/logo/header_logo_LinguaLink.svg" alt="LingualLink"></a></div>
                        </div>
                        <div class="col-xl-7 col-lg-8 d-none d-lg-block">
                            <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                                <div class="nav-container">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                                    <li><a class="dropdown-item" href="View Reviews and Rates - Partner.html">View my ratings</a></li>
                                                    <li><a class="dropdown-item" href="View Requests - Partner.html">Manage requests</a></li>
                                                    <li><a class="dropdown-item" href="View sessions - Partner.html">View sessions </a></li>
                                                    <li><a class="dropdown-item" href="faqHomePartner.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                           
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Want to Know More?</a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                           
                                                    <li><a class="dropdown-item" href="faqHomePartner.html">FAQ</a></li>
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
                                        <li><a href="LandingPageSO.html" class="theme_btn free_btn">Sign Out</a></li>
                                        <li><a class="sign-in ml-20" href="Profile Page-Language Partner.html"><img src="../assets/img/icon/user.svg" alt=""></a></li>
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
         <!-- /.theme-main-menu -->
    </header>

  

    <main>
      <!--page-title-area start-->
       <section class="page-title-area d-flex align-items-end" style="background-image: url(../assets/img/banner\ photo.jpg )">
          <div class="container">
              <div class="row align-items-end">
                  <div class="col-lg-12">
                      <div class="page-title-wrapper mb-50">
                         <h1 class="page-title mb-25">Partner-profile</h1>
                         <div class="breadcrumb-list">
                            <ul class="breadcrumb">
                                <li><a href="Profile Page Native Speaker\index.html">Home - </a></li>
                                <li><a href="#">Partner Profile</a></li>
                            </ul>
                         </div>
                    </div>
                  </div>
              </div>
          </div>
      </section>
      <!--page-title-area end-->
       <!--Native Speaker-details-area start-->
       <section class="instructor-details-area pt-145 pb-110 pt-md-95 pb-md-60 pt-xs-95 pb-xs-60">
           <div class="container">
               <div class="row">
                   <div class="col-xl-6 col-lg-12">
                       <div class="instructor-profile">
                           <h2>Partner Profile</h2>
                           <ul class="profile-list mb-50">
                           <li>First Name: <span><?php echo htmlspecialchars($partnerProfile['FirstName']); ?></span></li>
        <li>Last Name: <span><?php echo htmlspecialchars($partnerProfile['LastName']); ?></span></li>
        <li>Age: <span><?php echo htmlspecialchars($partnerProfile['Age']); ?></span></li>
        <li>Gender: <span><?php echo htmlspecialchars($partnerProfile['Gender']); ?></span></li>
        <li>Email: <span><?php echo htmlspecialchars($partnerProfile['Email']); ?></span></li>
        <li>Mobile Num: <span><?php echo htmlspecialchars($partnerProfile['Phone']); ?></span></li>
        <li>City: <span><?php echo htmlspecialchars($partnerProfile['City']); ?></span></li>
        <li>Languages Spoken
        <ul>
            <?php foreach ($partnerData['Languages'] as $language): ?>
                <li><?php echo htmlspecialchars($language); ?></li>
            <?php endforeach; ?>
        </ul>
            </li>
                              
                                <li>
                                    <div class="social-media">
                                        <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.instagram.com/?hl=en"><i class="fab fa-instagram"></i></a>
                                        <a href="https://www.youtube.com/?app"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </li>
                           </ul>
                    
                       </div>
                   </div>
                   <div class="col-xl-6 col-lg-12">
                    <div class="Learner-profile-Pic">
                        <h2>Profile Picture</h2>
                        <hr>
                        <img src="<?php echo htmlspecialchars('uploads/' . $partnerData['Photo']); ?>" alt="Profile Picture" style="width: 500;">
        <!-- Ensure $partnerProfile['Photo'] contains the relative path to the image -->
                </div>
            </div>
                   <div class="col-xl-6 col-lg-12">
                       <div class="Language Partner-profile">
                           <h2>Language Partner Bio</h2>
                           <div class="star-icon mb-20">
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                            </div>
                        <!-- Assuming the bio is stored in $partnerProfile['Bio'] -->
                        <p class="mb-25"><?php echo htmlspecialchars($partnerProfile['Bio']); ?></p>
                        </div>
                        <hr>
                            <div class="info-container" style = "display: flex;align-items: center; justify-content: space-between;">
                            <h5 class="total-stu pt-30"><span><img src="../assets/img/icon/avatar-outline-badged-2.svg" alt=""> 193+ Students</span></h5>
                            <li><a href="../HTML pages/View Reviews and Rates - Partner.html" class="theme_btn free_btn">Rates and Reviews</a></li>
                            &nbsp;   &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                            <li><a href="Edit Language Partner Profile.html" class="theme_btn free_btn">Edit </a></li>
                            &nbsp;   &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                            <li><a href="#popup-box" class="theme_btn free_btn" style="background-color: red;">Delete </a></li>  
                       </div>
                       <div id="popup-box" class="modal">
                        <div class="content">
                            <br>
                            <p style="color: #000000;">
                                Are you sure you want to delete the Account
                            </p>
                            <br>
                            <b>
                                <div class="info-container" style = "display: flex;align-items: center; justify-content:left">
                                   
                                    &nbsp;   &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;
                                    <div style="display: flex; justify-content: center;">
                                    <li><a href="Delete Message-Language Partner.html" class="theme_btn free_btn">Yes </a></li>
                                   </div>
                                    </div>
                            </b>
                            <a href="#" class="box-close">
                                ×
                            </a>
                        </div>
                    </div>
               </div>
           </div>
           </div>
       </section>
       <!--Language Partner-details-area end-->
       <!--what-looking-for start-->
       <section class="what-looking-for pos-rel">
        <div class="what-blur-shape-one"></div>
        <div class="what-blur-shape-two"></div>
        <div class="what-look-bg gradient-bg pt-145 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-8">
                         <div class="section-title text-center mb-55">
                             <h5 class="bottom-line mb-25">Partners & Learners</h5>
                             <h2>What you Looking For?</h2>
                         </div>
                     </div>
                 </div>
                 <div class="row mb-85">
                     <div class="col-xl-6 col-lg-6 col-md-6">
                         <div class="what-box text-center mb-35 wow fadeInUp2 animated" data-wow-delay='.3s'>
                             <div class="what-box__icon mb-30">
                                 <img src="../assets/img/icon/phone-operator.svg" alt="">
                             </div>
                             <h3>Do you want to teach here?</h3>
                             <a href="SignUpPartner.html" class="theme_btn border_btn">Register as Partner</a>
                         </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6">
                         <div class="what-box text-center mb-35 wow fadeInUp2 animated" data-wow-delay='.3s'>
                             <div class="what-box__icon mb-30">
                                 <img src="../assets/img/icon/graduate.svg" alt="">
                             </div>
                             <h3>Do you want to learn here?</h3>
                             <a href="SignUpLearner.html" class="theme_btn border_btn active">Register as Learner</a>
                         </div>
                     </div>
                 </div>
               
             </div>
        </div>   
    </section>
       <!--what-loking-for end-->
       <!-- subscribe-area start -->
       <!-- subscribe-area end -->
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
                                <img src="../assets\img\logo\header_logo_LinguaLink.svg" alt="">
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
      <script src="../assets/js/Heart.js"></script>
    
      </body>
    </html>