<?php include '../assets/php/load_partner_profile_Lside.php';


    session_start();
    if(isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
    } else {
        header("Location: SignInLearner.php"); // Redirect them to the login page if not logged in
        exit();
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Language Partner Profile Page</title>
    <meta name="keywords" content="online education, e-learning, coaching, education, teaching, learning">
    <meta name="description" content="LinguaLink is a e-learning HTML website for language education ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
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
  </head>

  <body>

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
      <!--page-title-area start-->
      <section class="page-title-area d-flex align-items-end" style="background-image: url(../assets/img/banner\ photo.jpg )">
          <div class="container">
              <div class="row align-items-end">
                  <div class="col-lg-12">
                      <div class="page-title-wrapper mb-50">
                         <h1 class="page-title mb-25">Partner-profile</h1>
                         <div class="breadcrumb-list">
                            <ul class="breadcrumb">
                                <li><a href="HomeLearner.php">Home -</a></li>
                                <li><a href="#">Partner Profile</a></li>
                            </ul>
                         </div>
                    </div>
                  </div>
              </div>
          </div>
      </section>


      
    
    <!-- Partner profile section -->
    <section class="partner-profile-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="partner-profile">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <img class="img-fluid" src="../assets/img/Partners images/<?php echo htmlspecialchars($partnerData['Photo']); ?>" alt="Partner profile picture"  style="width: 300px; height: 250px;">
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="instructor-profile">
                                    <h2>Partner Profile</h2>
                                    <ul class="profile-list mb-50">
                                        <li><span>First Name:</span> <?php echo htmlspecialchars($partnerData['FirstName']); ?></li>
                                        <li><span>Last Name:</span> <?php echo htmlspecialchars($partnerData['LastName']); ?></li>
                                        <li><span>Age:</span> <?php echo htmlspecialchars($partnerData['Age']); ?></li>
                                        <li><span>Gender:</span> <?php echo htmlspecialchars($partnerData['Gender']); ?></li>
                                        <li><span>Email:</span> <?php echo htmlspecialchars($partnerData['Email']); ?></li>
                                        <li><span>Mobile Num:</span> <?php echo htmlspecialchars($partnerData['Phone']); ?></li>
                                        <li><span>City:</span> <?php echo htmlspecialchars($partnerData['City']); ?></li>
                                        <li><span>Languages spoken:</span> <?php echo htmlspecialchars(implode(', ', $partnerData['Languages'])); ?></li>
                                        <li><span>Session price:</span> <?php echo htmlspecialchars($partnerData['SessionPrice']); ?> $/hour</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="instructor-profile">
                                    <h2>Instructor Bio</h2>
                                    <div class="star-icon mb-20">
                                        <?php 
                                            $filledStars = round($partnerData['AverageRating']);
                                            for ($i = 0; $i < $filledStars; $i++) {
                                                echo "<i class='fas fa-star' style='color: #FF723A; font-size: 15px; margin-right: 3px; display: inline-block;'></i>";
                                            }
                                        ?>
                                    </div>
                                    <p class="mb-25"><?php echo ($partnerData['Bio']); ?></p>
                                    <div class="info-container">
                                        <h5 class="total-stu pt-30"><span><img src="../assets/img/icon/avatar-outline-badged-2.svg" alt="icon"> <?php echo htmlspecialchars($partnerData['TotalReviews']); ?> Reviews</span></h5>
                                        <ul>
                                        <?php if(isset($partnerData['partnerid'])): ?>
   
    <li><a href="../HTML pages/View Reviews - Learner.php?partnerId=<?php echo $partnerData['partnerid']; ?>" class="theme_btn free_btn" style="text-align: center;">Rates and Reviews</a></li>
<?php endif; ?>
                                            <li><a href="mailto:<?php echo htmlspecialchars($partnerData['Email']); ?>" class="theme_btn free_btn">Arrange new meeting</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <img src="../assets/img/logo/header_logo_LinguaLink.svg" alt="logo">
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
  <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/isotope.pkgd.min.js"></script>
  <script src="../assets/js/slick.min.js"></script>

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
  <script src="../assets/js/Heart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../assets/js/Upartner_profile.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/metisMenu.min.js"></script>
  </body>
</html>
