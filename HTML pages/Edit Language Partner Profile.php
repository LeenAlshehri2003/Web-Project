<?php include '../assets/php/edit_partner_profile.php';

if (!isset($_SESSION['user_id'])) {
     header('Location:SignInPartner.php');
     exit;
 } ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile Page Language Partner</title>
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
                                                    <li><a class="dropdown-item" href="View Reviews.php?user_id=<?php echo $user_id; ?>">View my ratings</a></li>
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
                          <h1 class="page-title mb-25">Language Partner-profile</h1>
                          <div class="breadcrumb-list">
                             <ul class="breadcrumb">
                                 <li><a href="HomePartner.php">Home - </a></li>
                                 <li><a href="#">Language Partner Profile</a></li>
                             </ul>
                          </div>
                     </div>
                   </div>
               </div>
           </div>
       </section>
         <!--page-title-area end-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">

  <div class="col ">
    <form action="../assets/php/edit_partner_profile.php"  id="PartnerForm" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              
                <div class="row">
                  <div class="col-12 col-sm-auto mb-3">
                 
                    
    <img alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" style="width: 100px; height: 100px;">
    <input type="file" id="profile-image-upload" name="photo" class="hidden" onchange="previewFile()">
                     
                  </div>
                  </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                  
                    
                   
                  </div>
                  <div class="text-center text-sm-right">
                    <div class="text-muted"><small>Joined 31 Dec 2023</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Edit Profile</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>First Name</label>
                              <input class="form-control" type="text" name="FirstName" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>" >
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Last Name</label>
                              <input class="form-control" type="text" name="LastName" placeholder="Last Name"  value="<?php echo htmlspecialchars($lastName); ?>" >
                            </div>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input class="form-control" type="text" name="Phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($phone); ?>" >
                            </div>
                          </div>
                            <div class="col">
                            <div class="form-group">
                              <label for ="Gender" >Select Gender:<br></label>
                            </div>
                          <select id="Gender" name="Gender">
                            <option selected> Male</option>
                            <option>Female</option>
                          </select>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for ="Age" >Select Age:<br></label>
                            </div>
                              <input class="form-control" name="Age" type="text" placeholder="25" style ="width:150px;" value="<?php echo htmlspecialchars($age); ?>">
                            </div>
                            <div class="col">
                              <div class="form-group">
                                  <label>Select Languages:</label>
                                  <div>
                                      <input type="checkbox" id="english" name="languages[]" value="1"> <!-- Assuming 1 is the ID for English -->
                                      <label for="english">English</label>
                                  </div>
                                  <div>
                                      <input type="checkbox" id="arabic" name="languages[]" value="2"> <!-- Assuming 2 is the ID for Spanish -->
                                      <label for="arabic">Arabic</label>
                                  </div>
                                  <div>
                                      <input type="checkbox" id="french" name="languages[]" value="3"> <!-- Assuming 3 is the ID for French -->
                                      <label for="french">French</label>
                                  </div>
                                  <div>
                                      <input type="checkbox" id="spanish" name="languages[]" value="4"> <!-- Assuming 4 is the ID for German -->
                                      <label for="spanish">Spanish</label>
                                  </div>
                                  <div>
                                      <input type="checkbox" id="Italian" name="languages[]" value="5"> <!-- Assuming 5 is the ID for Chinese -->
                                      <label for="Italian">Italian</label>
                                  </div>
                                  <div>
                                      <input type="checkbox" id="japanese" name="languages[]" value="6"> <!-- Assuming 6 is the ID for Japanese -->
                                      <label for="japanese">Japanese</label>
                                  </div>
                                  <div>
                                      <input type="checkbox" id="chinese" name="languages[]" value="7"> <!-- Assuming 7 is the ID for Russian -->
                                      <label for="chinese">Chinese</label>
                                  </div>
                              </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col md-6 mb-3">
                            <label for ="City">City:<br></label>
                          </div>
                        </div>
                        <input class="form-control" type="text"  name="City" placeholder="Riyadh"  style ="width:150px;" value="<?php echo htmlspecialchars($city); ?>">
                        
                      </div>
                    </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea id="Bio" name="Bio" class="form-control" rows="5" placeholder="Languages and cultural knowldege"><?php echo htmlspecialchars($bio); ?></textarea>
                            </div>
                          </div>
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Session Price in SAR</label>
                              <input id="SessionPrice" name="SessionPrice" class="form-control" value="<?php echo htmlspecialchars($sessionPrice); ?>" ></input>
                            </div>
                          </div>
                        </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" id="CurrentPassPartner" name="CurrentPass" value="<?php echo ($currentPass); ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" id="NewPassPartner" name="NewPass" value="<?php echo ($currentPass); ?>" >
                              <span id="passwordHint" style="display:none; color: red;">Minimum 8 characters with 1 special character</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" id="ConfirmPassPartner" name="ConfirmPass" value="<?php echo ($currentPass); ?>"></div>
                              <span id="confirmPasswordHint" style="display:none; color: red;">Repeat the password</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3 mb-3">
                        <button  class="theme_btn free_btn"  type="submit" style="background-color: green;">Save</button>
                     
                      </div>
                   
                    <div class="col-12 col-md-3 mb-3">
                    <button class="theme_btn free_btn" type="reset">Clear</button>
                     
                    </div>
                 

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
        
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p><br>
            <li><a href="mailto:LinguaLink@gmail.com?subject=Edit Profile" class="theme_btn free_btn">Help</a></li>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
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
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('PartnerForm');
      // Get password fields and hint elements
  const newPasswordField = document.getElementById('NewPassPartner');
  const confirmPasswordField = document.getElementById('ConfirmPassPartner');
  const passwordHint = document.getElementById('passwordHint');
  const confirmPasswordHint = document.getElementById('confirmPasswordHint');

  // Event listeners for password fields to show and hide hints
  newPasswordField.addEventListener("focus", function() {
    passwordHint.style.display = "inline";
  });
  newPasswordField.addEventListener("blur", function() {
    passwordHint.style.display = "none";
  });
  confirmPasswordField.addEventListener("focus", function() {
    confirmPasswordHint.style.display = "inline";
  });
  confirmPasswordField.addEventListener("blur", function() {
    confirmPasswordHint.style.display = "none";
  });

    form.addEventListener("submit", function(event) {
      let isValid = true;
      const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;
      const inputs = form.querySelectorAll('input[type=text], input[type=password], textarea');

      // Check if all fields are filled
      inputs.forEach(input => {
        if (input.value.trim() === '') {
          Swal.fire({
        title: 'LinguaLink',
        text: 'Please fill out all fields.',
        icon: 'error',
        confirmButtonColor: '#FFA500',  
        confirmButtonText: 'OK'
    });
         
          input.style.border = '2px solid red';
          isValid = false;
        } else {
          input.style.border = '';
        }
      });

      // Check password requirements
      const password = document.getElementById('NewPassPartner').value;
      const confirmPassword = document.getElementById('ConfirmPassPartner').value;
      if (password.length < 8 || !specialCharRegex.test(password)) {
        Swal.fire({
        title: 'LinguaLink',
        text: 'Password must be at least 8 characters and contains one special character.',
        icon: 'error',
        confirmButtonColor: '#FFA500',  
        confirmButtonText: 'OK'
    });
        document.getElementById('NewPassPartner').style.border = '2px solid red';
        document.getElementById('ConfirmPassPartner').style.border = '2px solid red';
        isValid = false;
      } else {
        document.getElementById('NewPassPartner').style.border = '';
        document.getElementById('ConfirmPassPartner').style.border = '';
      }

      // Check if passwords match
      if (password !== confirmPassword) {
        Swal.fire({
        title: 'LinguaLink',
        text: 'Paswwords do not match , please enter matching passwords.',
        icon: 'error',
        confirmButtonColor: '#FFA500',  
        confirmButtonText: 'OK'
    });
        document.getElementById('NewPassPartner').style.border = '2px solid red';
        document.getElementById('ConfirmPassPartner').style.border = '2px solid red';
        isValid = false;
      } else {
        document.getElementById('ConfirmPassPartner').style.border = '';
      }

      // Validate language checkboxes
      const languageCheckboxes = document.querySelectorAll("[name='languages[]']");
      const isLanguageSelected = Array.from(languageCheckboxes).some(checkbox => checkbox.checked);
      if (!isLanguageSelected) {
        languageCheckboxes.forEach(checkbox => {
          const label = checkbox.nextElementSibling;
          if (label) label.style.color = 'red';
        });
        Swal.fire({
        title: 'LinguaLink',
        text: 'Please Select at least one language.',
        icon: 'error',
        confirmButtonColor: '#FFA500',  
        confirmButtonText: 'OK'
    });
        isValid = false;
      } else {
        languageCheckboxes.forEach(checkbox => {
          const label = checkbox.nextElementSibling;
          if (label) label.style.color = '';
        });
      }

      // Prevent form submission if validation fails
      if (!isValid) {
        event.preventDefault();
      }
    });
  });
</script>
    <script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/EditProfile_Partner.js"></script>
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
