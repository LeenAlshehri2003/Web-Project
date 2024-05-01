<?php
session_start();
$errorMessage = isset($_SESSION['registration_error']) ? $_SESSION['registration_error'] : null;
$successMessage = isset($_SESSION['registration_success']) ? $_SESSION['registration_success'] : null;
unset($_SESSION['registration_error'], $_SESSION['registration_success']); // Clear the session variables
?>
<!DOCTYPE html>
<html>
    <head>
    <style>
    .custom-checkbox {
        width: 20px;
        height: 20px;
        vertical-align: middle;
    }
    .custom-label {
        vertical-align: middle;
        margin-left: 8px;  /* Space between checkbox and label */
    }
    .form-row {
    display: flex;
    justify-content: space-between;
    align-items: center; /* This aligns the items vertically center */
    margin-bottom: 20px; /* Adjust space between rows */
}

.form-column {
    display: flex;
    flex-direction: column; /* Stack the label and input vertically */
    flex: 1; /* Each column takes equal width */
    margin-right: 10px; /* Space between columns */
}

.form-column:last-child {
    margin-right: 0; /* Removes margin from the last column */
}

.checkbox-group {
    display: flex;
    flex-direction: column; /* Stack checkboxes vertically */
    padding: 10px; /* Padding around the checkbox area */
}

</style>

       
        <meta charset="utf-8">
        <title>sign up partner</title>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                                    <li><a href="PrePartnerlist%20English.html#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> English</a></li>
                                                    <li><a href="PrePartnerlist%20French.html#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> French</a></li>
                                                    <li><a href="PrePartnerlist%20Spanish.html#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Spanish</a></li>
                                                    <li><a href="PrePartnerlist%20Arabic.html#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Arabic</a></li>
                                                    <li><a href="PrePartnerlist%20Italien.html#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span>Italien</a></li>
                                                    <li><a href="PrePartnerlist%20Japanese.html#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Japanese</a></li>
                                                    <li><a href="PrePartnerlist%20Chinese.html#here"><span><img src="../assets/img/icon/icon12.svg" alt="Icon for langauges"></span> Chinese</a></li>
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
        <section class="contact-form-area pt-150 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
            <div class="container" style="padding: 0%;">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-form-wrapper text-center mb-30">
                            <h2 class="mb-45">Welcome To LingualLink, Our Partner!</h2>
                            <form id="signupForm" action="../assets/php/regPartner.php" method="post" class="row gx-3 comments-form contact-form">
                                <div class="col-lg-6 mb-30">
                                    <label>First name:*<br>
                                        <input type="text" name="firstname" placeholder="Enter First Name here" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Last name:*<br>
                                        <input type="text" name="lastname" placeholder="Enter Last Name here" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Your Username:*<br>
                                        <input type="text" name="username" placeholder="Enter username here" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Age:*<br>
                                        <input type="text" name="age" placeholder="Enter Age here" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Gender:*<br>
                                        <select name="gender">
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Email:*<br>
                                        <input type="email" name="email" placeholder="Enter Email here" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Password:*<br>
                                        <input type="password" name="password" placeholder="************" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Phone Number:*<br>
                                        <input type="text" name="number" placeholder="Enter Number here" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>City:*<br>
                                        <input type="text" name="city" placeholder="Enter City here" required>
                                        <div class="info" style="color: red;"></div>
                                    </label>
                                </div>
                               
                                <span class="tab-content pt-3 form-column checkbox-group">
              
                                  <label>Select Languages:*</label>
                                  <div>
                                <input type="checkbox" id="english" name="languages[]" value="1" style="width: 20px; height: 20px; vertical-align: middle;">
                                <label for="english" style="vertical-align: middle;">English</label>
                            </div>
                            <div>
                                <input type="checkbox" id="arabic" name="languages[]" value="2" style="width: 20px; height: 20px; vertical-align: middle;">
                                <label for="arabic" style="vertical-align: middle;">Arabic</label>
                            </div>
                            <div>
                                <input type="checkbox" id="french" name="languages[]" value="3" style="width: 20px; height: 20px; vertical-align: middle;">
                                <label for="french" style="vertical-align: middle;">French</label>
                                </div>

                                <div>
                                <input type="checkbox" id="spanish" name="languages[]" value="4" style="width: 20px; height: 20px; vertical-align: middle;">
                                <label for="spanish" style="vertical-align: middle;">Spanish</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Italian" name="languages[]" value="5" style="width: 20px; height: 20px; vertical-align: middle;">
                                <label for="Italian" style="vertical-align: middle;">Italian</label>
                            </div>
                            <div>
                                <input type="checkbox" id="japanese" name="languages[]" value="6" style="width: 20px; height: 20px; vertical-align: middle;">
                                <label for="japanese" style="vertical-align: middle;">Japanese</label>
                                </div>

                                <div>
                                <input type="checkbox" id="chinese" name="languages[]" value="7" style="width: 20px; height: 20px; vertical-align: middle;">
                                <label for="chinese" style="vertical-align: middle;">Chinese</label>
                                </div>
                                
</span> 
                                  
                              


                        
                                <div class="col-lg-12 mb-30">
                                    <label>Upload Picture (optional):<br>
                                        <input type="file" name="photo">
                                    </label>
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <label><strong>Enter Your Bio:*</strong><br>
                                        <textarea name="bio" rows="0" cols="40" required placeholder="Enter a short bio including languages spoken and cultural knowledge "></textarea>
                                    </label>
                                </div>
                                
                                <div class="col-lg-12">
                                    <a id="linking">
                                    <button  id="submitButton" type="submit" class="theme_btn message_btn mt-20" style="background-color: cornflowerblue; color: white;">Sign Up</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    
    <script>
window.onload = function() {
    // Display server-side error or success messages
    <?php if ($errorMessage): ?>
        Swal.fire({
            title: 'Error!',
            text: '<?php echo addslashes($errorMessage); ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    <?php elseif ($successMessage): ?>
        Swal.fire({
            title: 'Success!',
            text: '<?php echo addslashes($successMessage); ?>',
            icon: 'success',
            confirmButtonText: 'Great!'
        }).then((result) => {
            if (result.value) {
                window.location.href = 'HomePartner.php';
            }
        });
    <?php endif; ?>
};

$(document).ready(function() {
    // Client-side validation for the file type
    $('input[type="file"]').on('change', function() {
        var file = this.files[0];
        var fileType = file.type;
        var match = ['image/jpeg', 'image/png', 'image/gif'];
        if (!match.includes(fileType)) {
            event.preventDefault(); // Prevent form submission
            Swal.fire({
                title: 'Error!',
                text: 'Only image files (JPG, JPEG, PNG, GIF) are allowed.',
                icon: 'error',
                confirmButtonText: 'OK'
            });            this.value = ''; // Reset the input
        }
    });

  
});


</script>
 

        
<script>
$(document).ready(function() {
    $('#signupForm').submit(function(event) {
        var isChecked = $('input[type="checkbox"][name="languages[]"]:checked').length > 0;
        if (!isChecked) {
            event.preventDefault(); // Prevent form submission
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select at least one language!'
            });
        }
    });

    // Optional: Reset styling when a checkbox is checked
    $('input[type="checkbox"][name="languages[]"]').change(function() {
        if ($('input[type="checkbox"][name="languages[]"]:checked').length > 0) {
            // Reset any custom styling if needed
        }
    });
});
</script>
        

    

 <script>
$(document).ready(function () {
    // Validation functions for each type of input
    function validateName(value) {
        if (!value) return "This field cannot be empty.";
        return /^[a-zA-Z ]+$/.test(value) ? "" : "Only letters and spaces allowed.";
    }

  

    function validateEmail(value) {
        if (!value) return "This field cannot be empty.";
        return /^\S+@\S+\.\S+$/.test(value) ? "" : "Invalid email format.";
    }

    function validatePassword(value) {
        if (!value) return "This field cannot be empty.";
        return value.length >= 8 && /[!@#$%^&*(),.?":{}|<>]/.test(value) ? "" : "Password must be at least 8 characters long and include a special character.";
    }
    function validatePhoneNumber(value) {
        if (!value) return "This field cannot be empty.";
        return /^\d{10}$/.test(value) ? "" : "Phone number must be 10 digits long.";
    }
    function validateAge(value) {
        if (!value) return "This field cannot be empty.";
        return /^\d+$/.test(value) && parseInt(value) >= 18 ? "" : "Age must be a valid number (18+).";
    }

  
    // Validate all inputs except for the optional photo
    function validateInputs() {
        let allValid = true;
        $('input:not([type="file"])').each(function() {
            const interacted = $(this).data('interacted'); // Check if the user has interacted with the input
            const name = $(this).attr('name');
            let validationFunction = function() { return ""; };
            switch(name) {
                case 'firstname':
                case 'lastname':
                case 'city':
                    validationFunction = validateName;
                    break;
                    case 'age':
                    validationFunction = validateAge;
                    break;
                case 'email':
                    validationFunction = validateEmail;
                    break;
                case 'password':
                    validationFunction = validatePassword;
                    break;
                case 'number':
                    validationFunction = validatePhoneNumber;
                    break;
             
        
            }

            const validationResult = validationFunction($(this).val());
            if (interacted) { // Only show validation messages if the user has interacted with the input
                $(this).next('.info').text(validationResult);
                $(this).css('border-color', validationResult === "" ? 'grey' : 'red');
            }

            if (validationResult !== "") {
                allValid = false;
            }
        });

        return allValid;
    }

    // Attach interaction flag and validation handlers
    $('input').on('input', function() {
        $(this).data('interacted', true); // Mark as interacted when the user types in the input
        validateInputs(); // Validate inputs whenever they change
    });

    // Handle form submission attempt
    $('#signupForm').on('submit', function(event) {
        $('input').data('interacted', true); // Mark all as interacted on submit attempt
        const isFormValid = validateInputs();
        if (!isFormValid) {
            event.preventDefault();  // Prevent form submission if form is not valid
            alert('Please fill all required fields correctly before submitting.');
        }
    });
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
</body>

</html>
