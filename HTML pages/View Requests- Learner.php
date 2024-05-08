<?php require '../assets/php/load_requests.php';
if (!isset($_SESSION['user_id'])) {
    header('Location:SignInLearner.php');
    exit;
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Requests</title>
    <meta name="keywords" content="online education, e-learning, coaching, education, teaching, learning">
    <meta name="description" content="LinguaLink is a e-learning HTML website for language education ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                        <div class="logo"><a href="HomeLearner.php"><img
                                    src="../assets/img/logo/header_logo_LinguaLink.svg" alt="LingualLink"></a></div>
                    </div>
                    <div class="col-xl-7 col-lg-8 d-none d-lg-block">
                        <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                            <div class="nav-container">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown mega-menu">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                All Languages
                                            </a>
                                            <ul class="dropdown-menu submenu mega-menu__sub-menu-box"
                                                aria-labelledby="navbarDropdown">
                                                <li><a href="Partnerlist%20English.php#here"><span><img
                                                                src="../assets/img/icon/icon12.svg"
                                                                alt="Icon for langauges"></span> English</a></li>
                                                <li><a href="Partnerlist%20French.php#here"><span><img
                                                                src="../assets/img/icon/icon12.svg"
                                                                alt="Icon for langauges"></span> French</a></li>
                                                <li><a href="Partnerlist%20Spanish.php#here"><span><img
                                                                src="../assets/img/icon/icon12.svg"
                                                                alt="Icon for langauges"></span> Spanish</a></li>
                                                <li><a href="Partnerlist%20Arabic.php#here"><span><img
                                                                src="../assets/img/icon/icon12.svg"
                                                                alt="Icon for langauges"></span> Arabic</a></li>
                                                <li><a href="Partnerlist%20Italien.php#here"><span><img
                                                                src="../assets/img/icon/icon12.svg"
                                                                alt="Icon for langauges"></span>Italien</a></li>
                                                <li><a href="Partnerlist%20Japanese.php#here"><span><img
                                                                src="../assets/img/icon/icon12.svg"
                                                                alt="Icon for langauges"></span> Japanese</a></li>
                                                <li><a href="Partnerlist%20Chinese.php#here"><span><img
                                                                src="../assets/img/icon/icon12.svg"
                                                                alt="Icon for langauges"></span> Chinese</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                                <li><a class="dropdown-item" href="Partnerlist.php">View partners
                                                        List</a></li>
                                                <li><a class="dropdown-item" href="View Requests- Learner.php">Manage
                                                        requests</a></li>
                                                <li><a class="dropdown-item" href="View sessions - Learner.php">View
                                                        sessions </a></li>
                                                <li><a class="dropdown-item" href="faqHomeLearner.html">FAQ</a></li>
                                            </ul>
                                        </li>


                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Want to
                                                Know More?</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">

                                                <li><a class="dropdown-item" href="faqHomeLearner.html">FAQ</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="mailto:LingualLink@gmail.com" id="navbarDropdown5"
                                                role="button" aria-expanded="false">Contact Us!</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-xl-3 col-lg-2 col-7">
                        <div class="right-nav d-flex align-items-center justify-content-end">
                            <div class="right-btn mr-25 mr-xs-15">
                                <ul class="d-flex align-items-center">
                                    <li><a href="../assets/php/Signout.php" id="signout" class="theme_btn free_btn">Sign
                                            Out</a></li>
                                    <li><a class="sign-in ml-20" href="ProfilePage-LanguageLearner.php"><img
                                                src="../assets/img/icon/user.svg" alt=""></a></li>
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
    </header><!-- this is a test-->


    <main>
        <!--page-title-area start-->
        <section class="page-title-area d-flex align-items-end"
            style="background-image: url(../assets/img/banner\ photo.jpg )">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="page-title-wrapper mb-50">
                            <h1 style="text-align: left;" class="page-title mb-25">View Requests</h1>
                            <div class="breadcrumb-list">
                                <ul class="breadcrumb">
                                    <li><a href="HomeLearner.php">Home - </a></li>
                                    <li><a href="#">View Requests</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- blog-area start -->
    <section class="blog-area">
        <div class="blog-bg pt-150 pb-120 pt-md-100 pb-md-70 pt-xs-100 pb-xs-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-60">
                            <h2 class="mb-25">Requests</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="plan-tab mb-60">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link theme_btn active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">Pending Requests</button>
                                    <button class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Accepted Requests</button>
                                    <button class="nav-link theme_btn" id="nav-profile-tab1" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile1" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Rejected Requests</button>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <?php foreach ($requests as $item): ?>
                                <?php if ($item['Status'] === 'Pending'): ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="z-blogs mb-30">
                                            <div class="z-blogs__thumb mb-30">
                                                <a
                                                    >
                                                    <img src="<?= htmlspecialchars('../assets/img/Partners images/' . $item['PartnerPhoto']) ?>"
                                                        alt="Profile picture" width="420" height="320">
                                                </a>
                                            </div>
                                            <div class="z-blogs__content">
                                                <h5 class="mb-25"><?= htmlspecialchars($item['LanguageName']) ?> Course</h5>
                                                <h4 class="sub-title mb-15">Status: <?= htmlspecialchars($item['Status']) ?>
                                                </h4>
                                                <div>Partner:
                                                    <?php echo htmlspecialchars($item['PartnerFirstName'] . " " . $item['PartnerLastName']); ?>
                                                </div>
                                                <div>Session Date:
                                                    <?= htmlspecialchars($item['PreferredDate'], ENT_QUOTES, 'UTF-8') ?>
                                                </div>
                                                <div>Session Time:
                                                    <?= htmlspecialchars($item['PreferredTime'], ENT_QUOTES, 'UTF-8') ?>
                                                </div>
                                                <div>Duration: <?= htmlspecialchars($item['SessionDuration']) ?> hour</div>
                                                <div>Proficiency Level: <?= htmlspecialchars($item['ProficiencyLevel']) ?></div>
                                                <div>Session Price: <?= htmlspecialchars($item['SessionPrice']) ?> SAR</div>
                                                <div class="info-container"
                                                    style="display: flex; align-items: center; justify-content: space-between">
                                                    <a href="Edit Request.php?requestId=<?= htmlspecialchars($item['RequestID']) ?>"
                                                        class="theme_btn">Edit</a>
                                                    <a href="../assets/php/delete_request.php?requestId=<?= htmlspecialchars($item['RequestID']) ?>"
                                                        class="theme_btn" style="background-color: red;"
                                                        onclick="return confirm('Are you sure you want to delete this request?')">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <?php foreach ($requests as $item): ?>
                                <?php if ($item['Status'] === 'Accepted'): ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="z-blogs mb-30">
                                            <div class="z-blogs__thumb mb-30">
                                                <a
                                                    >
                                                    <img src="<?= htmlspecialchars('../assets/img/Partners images/' . $item['PartnerPhoto']) ?>"
                                                        alt="Profile picture" width="420" height="320">
                                                </a>
                                            </div>
                                            <div class="z-blogs__content">
                                                <h5 class="mb-25"><?= htmlspecialchars($item['LanguageName']) ?> Course</h5>
                                                <h4 class="sub-title mb-15">Status: <?= htmlspecialchars($item['Status']) ?>
                                                </h4>
                                                <div>Partner:
                                                    <?php echo htmlspecialchars($item['PartnerFirstName'] . " " . $item['PartnerLastName']); ?>
                                                </div>
                                                <div>Session Date:
                                                    <?= htmlspecialchars($item['PreferredDate'], ENT_QUOTES, 'UTF-8') ?>
                                                </div>
                                                <div>Session Time:
                                                    <?= htmlspecialchars($item['PreferredTime'], ENT_QUOTES, 'UTF-8') ?>
                                                </div>
                                                <div>Duration: <?= htmlspecialchars($item['SessionDuration']) ?> hour</div>
                                                <div>Proficiency Level: <?= htmlspecialchars($item['ProficiencyLevel']) ?></div>
                                                <div>Session Price: <?= htmlspecialchars($item['SessionPrice']) ?> SAR</div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1">
                        <div class="row">
                            <?php foreach ($requests as $item): ?>
                                <?php if ($item['Status'] === 'Rejected'): ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="z-blogs mb-30">
                                            <div class="z-blogs__thumb mb-30">
                                                <a
                                                    >
                                                    <img src="<?= htmlspecialchars('../assets/img/Partners images/' . $item['PartnerPhoto']) ?>"
                                                        alt="Profile picture" width="420" height="320">
                                                </a>
                                            </div>
                                            <div class="z-blogs__content">
                                                <h5 class="mb-25"><?= htmlspecialchars($item['LanguageName']) ?> Course</h5>
                                                <h4 class="sub-title mb-15">Status: <?= htmlspecialchars($item['Status']) ?>
                                                </h4>
                                                <div>Partner:
                                                    <?php echo htmlspecialchars($item['PartnerFirstName'] . " " . $item['PartnerLastName']); ?>
                                                </div>
                                                <div>Session Date:
                                                    <?= htmlspecialchars($item['PreferredDate'], ENT_QUOTES, 'UTF-8') ?>
                                                </div>
                                                <div>Session Time:
                                                    <?= htmlspecialchars($item['PreferredTime'], ENT_QUOTES, 'UTF-8') ?>
                                                </div>
                                                <div>Duration: <?= htmlspecialchars($item['SessionDuration']) ?> hour</div>
                                                <div>Proficiency Level: <?= htmlspecialchars($item['ProficiencyLevel']) ?></div>
                                                <!-- Messages or actions for rejected requests -->
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <li><a href="Post Request.php" class="theme_btn free_btn">Post Request </a></li>
                    </div>
                </div>

    </section>
    <!--footer-area start-->
    <footer class="footer-area footer-bg pt-220 pb-25 pt-md-100 pt-xs-100">
        <div class="footer-blur"></div>
        <div class="container">
            <div class="row mb-15">
                <div class="col-xl-3 col-lg-4 col-md-6  wow fadeInUp2 animated" data-wow-delay='.1s'>
                    <div class="footer__widget mb-30">
                        <div class="footer-log mb-20">
                            <a href="LandingPage.html" class="logo">
                                <img src="..\assets\img\logo\header_logo_LinguaLink.svg" alt="">
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