<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Requests</title>
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
  
</head>
<body>

<header>
    <div id="theme-menu-two" class="main-header-area main-head-three pl-100 pr-100 pt-20 pb-15">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-5">
                    <div class="logo"><a href="HomePartner.php"><img src="../assets/img/logo/header_logo_LinguaLink.svg" alt="LingualLink"></a></div>
                </div>
                <div class="col-xl-7 col-lg-8 d-none d-lg-block">
                    <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                        <div class="nav-container">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                   
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                            <li><a class="dropdown-item" href="View Reviews - Partner.php">View my ratings</a></li>
                                            <li><a class="dropdown-item" href="partner_view_requests.php">Manage requests</a></li>
                                            <li><a class="dropdown-item" href="View sessions - Partner.php">View sessions </a></li>
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
                                <li><a href="../assets/php/Signout.php" class="theme_btn free_btn">Sign Out</a></li>
                                <li><a class="sign-in ml-20" href="ProfilePage-LanguagePartner.php"><img src="../assets/img/icon/user.svg" alt=""></a></li>
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
    </div> <!-- /.theme-main-menu -->
</header>

<main>


<section class="feature-course pt-150 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
    <h1 class="ol-lg-12 text-center" style="margin-bottom: 20px;">Language Partners</h1>
    <div class="row">
        <div class="text-center">
            <div class="plan-tab mb-60">
                <nav>
                    
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button id="allBtn" onclick="loadPartners('All')" class="nav-link theme_btn active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>
        <button id="englishBtn" onclick="loadPartners('English')" class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">English</button>
        <button id="arabicBtn" onclick="loadPartners('Arabic')" class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Arabic</button>
        <button id="frenchBtn" onclick="loadPartners('French')" class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">French</button>
        <button id="spanishBtn" onclick="loadPartners('Spanish')" class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Spanish</button>
        <button id="italianBtn" onclick="loadPartners('Italian')" class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Italian</button>
        <button id="japaneseBtn" onclick="loadPartners('Japanese')" class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Japanese</button>
        <button id="chineseBtn" onclick="loadPartners('Chinese')" class="nav-link theme_btn" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Chinese</button>

                        <!-- Add more buttons for other languages as needed -->
                        <div class="grid-row">
                        <div class="col-lg-4 col-md-6 grid-item">
                            
                        </div>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <!-- This is where the content will be inserted -->
        <div id="partnersContainer" class="row"></div>
    </div>
</section>
   
</main>

<footer class="footer-area footer-bg pt-220 pb-25 pt-md-100 pt-xs-100">
    <!-- Footer content -->
</footer>

<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
<script>
    $(document).ready(function() {
    // Function to fetch and display partners based on their language
    function loadPartners(language) {
        $.get('../assets/php/load_partnerlist.php?language=' + language, function(data) {
            $('#partnersContainer').html(data); // Insert the fetched content into the specified div
        });
    }

    // Initially load partners for English language
    loadPartners('English');

    // Handle button clicks to load different languages' partners
    $('#allBtn').click(function() {
        loadPartners('All');
    });

    $('#englishBtn').click(function() {
        loadPartners('English');
    });

    $('#arabicBtn').click(function() {
        loadPartners('Arabic');
    });

    $('#frenchBtn').click(function() {
        loadPartners('French');
    });

    $('#spanishBtn').click(function() {
        loadPartners('Spanish');
    });

    $('#italianBtn').click(function() {
        loadPartners('Italian');
    });

    $('#japaneseBtn').click(function() {
        loadPartners('Japanese');
    });

    $('#chineseBtn').click(function() {
        loadPartners('Chinese');
    });

    // Add click event handlers for other language buttons as needed
});

</script>

<script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
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

