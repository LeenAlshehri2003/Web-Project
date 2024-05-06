<?php
session_start();
$error_message = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']);  // Clear the error message from session
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign in learner</title>
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
        <link rel="stylesheet" href="../assets/css/Filter Japanese.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="../assets/js/Filter.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- SweetAlert2 -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
                            <div class="logo"><a href="LandingPage.html"><img src="../assets/img/logo/header_logo_LinguaLink.svg" alt="LingualLink logo"></a></div>
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
                                            <li class="nav-item dropdown active">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sign Up
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                    <li><a class="dropdown-item" href="SignUpLearner.php">Sign Up as Learner</a></li>
                                                    <li><a class="dropdown-item" href="SignUpPartner.php">Sign Up as Partner</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown active">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sign In
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                    <li><a class="dropdown-item" href="SignInLearner.php">Learner's Sign in </a></li>
                                                    <li><a class="dropdown-item" href="SignInPartner.php">Partner's Sign in </a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Want to Know More?</a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                                    <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="mailto:LingualLink@gmail.com" id="navbarDropdown5" role="button"  aria-expanded="false">Contact Us!</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                      
                    </div>
            </div>
        </div> 
    </header>













    <main>
  
        <section class="contact-form-area pt-150 pb-120">
            <div class="container" style="padding: 0;">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="contact-form-wrapper text-center mb-30">
                            <h2 class="mb-45">Welcome Back, Learner!</h2>
                            <form id="loginForm" action="../assets/php/LoginLearner.php" method="post" class="comments-form contact-form">
                                <div class="mb-30">
                                    <label>Username: <br>
                                        <input type="text" id="username" name="username" placeholder="Enter Username here" required>
                                    </label>
                                    <div id="usernameInfo" class="info" style="color: red;"></div>
                                </div>
                                <div class="mb-30">
                                    <label>Password: <br>
                                        <input type="password" id="password" name="password" placeholder="Enter Password here" required>
                                    </label>
                                    <div id="passwordInfo" class="info" style="color: red;"></div>
                                </div>
                                <button type="submit" id="submitButton"  class="theme_btn message_btn mt-20" style="background-color: grey; " disabled>Sign In</button>

                                <a href="SignInPartner.php"  style="background-color: white; color:orange;" class="theme_btn message_btn mt-20">Not a Learner? Click to Sign in as a Partner</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
 
    <!-- Script for displaying SweetAlert2 based on PHP session error message -->
    <script>
    window.onload = function() {
        var errorMessage = "<?php echo addslashes($error_message); ?>";
        if (errorMessage) {
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    };
    </script>


    <script>
    $(document).ready(function () {
        function validateUsername(value) {
            if (value === "") return ""; // Allow empty for initial load
            if (/^\d+$/.test(value)) return "Username cannot be numbers only.";
            return "";
        }
    
        function validatePassword(value) {
            if (value === "") return ""; // Allow empty for initial load
            if (value.length < 8) return "Password must be at least 8 characters.";
            if (!/[!@#$%^&*(),.?":{}|<>]/.test(value)) return "Password must contain at least one special character.";
            return "";
        }
    
        function updateFormValidation() {
            const usernameValue = $('#username').val();
            const passwordValue = $('#password').val();
    
            const usernameInfo = validateUsername(usernameValue);
            const passwordInfo = validatePassword(passwordValue);
    
            $('#usernameInfo').text(usernameInfo);
            $('#passwordInfo').text(passwordInfo);
    
            const formValid = (usernameInfo === "" && passwordInfo === "");
            $('#submitButton').css('background-color', formValid ? 'cornflowerblue' : 'grey');
            $('#submitButton').prop('disabled', !formValid);
        }
    
        $('#username, #password').on('input', updateFormValidation);
    });
    </script>
   
    

   

   

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

