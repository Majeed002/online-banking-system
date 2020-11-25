<?php include './Includes/UserDashboard-inc/user-login-inc.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE">
        <link rel="stylesheet" href="./Assets/Modules/Styles/icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="./Assets/Modules/Styles/main.css">
        <script  defer src="./Assets/Modules/Scripts/app.js"></script>
        <link rel="icon" href="./Assets/Images/Bank_Logo/Title_icon.png" type="png">
        <title>User Login | Urban Bank</title>
    </head>
<body>
<div id="form-container">
    <div id="form-main">
    <!-- Navigation Bar  of Website-->  
    <nav>
        <!-- Logo Image of the navbar-->
        <div class="logo">
            <a href="./index.php"><img src="./Assets/Images/Bank_Logo/urban_bank_logo.png" title="Urban Bank" alt="Bank Logo"></a>
        </div>
       <!-- Online Register Button-->
       <ul class="admin-login-button">
            <li>
                <a href="./admin-login.php" >
                    <button>ADMIN LOGIN</button>
                </a>
            </li>
        </ul>
    </nav>   
    <!-- End of the Navigation Bar-->

    <!--Login Form-->
        <div class="user-login-form-container">

            <div class="logo-urban-bank-form">
                <img src="./Assets/Images/Login-Register/logo_urban_bank_login.png" alt="urban-bank" class="logo-urban-bank-form-img">
            </div>

            <div class="log-in-title">
                <h2 class="log-in-title">User Login</h2>
            </div>
                        
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                
                <div class="login-credentials">
                    <div>    
                        <label for="username">
                            <i class="far fa-user" style="color: rgb(26, 64, 99);"></i>
                            Username 
                            <span class="error-messages"> <br> <?php echo $usernameErr; ?> </span>
                        </label>
                        <input id="username" name="username"  type="text" value="<?php $username; ?>" placeholder="Enter your username..." >
                    </div>

                    <div>
                        <label for="user_login_pwd">
                            <i class="fas fa-key" style="color: rgb(26, 64, 99);"></i>
                            Password <span class="error-messages"> <br> <?php echo $user_login_pwdErr; ?> </span>
                        </label>
                        <input id="user_login_pwd" name="user_login_pwd" value="<?php $user_login_pwd; ?>" type="password" placeholder="Enter your password..." >
                    </div>
                </div>

                <div class="login-checkbox">
                    <input type="checkbox" name="tnc" id="tnc" value="Agreed">
                    <label for="tnc"> I agree <a href="">Terms</a> and <a href="">Condition</a></label>
                    <br> 
                    <span class="error-messages"> <?php echo $tncErr; ?> </span> 
                </div>

                 <div class="login-submit-button"> 
                    <button type="Submit">
                    <i class="fas fa-unlock-alt" style="color: whitesmoke;"></i>
                        Log In
                     </button>
                </div>
                <div class="forgot-password">
                     Forgot 
                     <a href="./forgot-username.php">
                        <span>Username</span>
                    </a> 
                     or 
                     <a href="./forgot-password.php">
                        <span>Password?</span>
                    </a>
                </div>  
                
                
                <div class="ol-register-link">
                Didn't Registered Online?<a href="./ol-registration.php">Register Online.</a>
                </div>
            </form>
            
        </div>

    </div>
</div> 
<footer id="main-footer">
    <div class="contact-follow-container">
            
            <div class="contact-us-container">
                <div class="contact-us-title">
                    CONTACT US
                </div>
                <div class="contact-us-details">
                    <span class="phone-no">
                    <i class="fas fa-phone-alt"></i>
                        1800 1234 1324 (Tollfree) / (022) – 42929192 (chargeable number) 24 X 7
                    </span>
                    <span class="contact-us-mail">
                    <i class="fas fa-envelope"></i>
                    urban.help@gmail.com
                    </span>
                </div>
            </div>
            
            <div class="follow-us-container">
                <div class="follow-us-title">
                    FOLLOW US
                </div>
                <div class="social-icons">
                <i class="fab fa-twitter fa-lg" title="Twitter"></i>
                <i class="fab fa-facebook-f fa-lg" title="Facebook"></i>
                <i class="fab fa-linkedin-in fa-lg" title="LinkedIn"></i>
                <i class="fab fa-instagram fa-lg" title="Instagram"></i>
                </div>
            </div>
    </div>
    <div class="footer-body-container">
        <div class="quick-links-container">
            <ul>
                <li class="quick-links-title">Home</li>
                <li class="quick-links-content">Gallery</li>
                <li class="quick-links-content">Interest Rate</li>
                <li class="quick-links-content">Handpicked Offer</li>
            </ul>
            <ul>
                <li class="quick-links-title">Services</li>
                <li class="quick-links-content">We Provide</li>
                <li class="quick-links-content">Core Values</li>
                <li class="quick-links-content">Our Partners</li>
            </ul>
            <ul>
                <li class="quick-links-title">About Us</li>
                <li class="quick-links-content">History</li>
                <li class="quick-links-content">Our Mission</li>
                <li class="quick-links-content">Board of Directors</li>
                <li class="quick-links-content">Carrers</li>
            </ul>
            <ul>
                <li class="quick-links-title">Blogs</li>
                <li class="quick-links-content">Investment</li>
                <li class="quick-links-content">Loans</li>
                <li class="quick-links-content">Mobile Banking</li>
                <li class="quick-links-content">Miscellaneous</li>
            </ul>
            <ul>
                <li class="quick-links-title">Legal</li>
                <li class="quick-links-content">Privacy Policy</li>
                <li class="quick-links-content">Terms & Conditions</li>
                <li class="quick-links-content">Disclaimers</li>
                <li class="quick-links-content">Code of Commitment</li>
            </ul>
        </div>

        <div class="get-app-container">
            Download Mobile App
            <img src="./Assets/Images/Website-Footer/app-store-badge.png" alt="">
            <img src="./Assets/Images/Website-Footer/play-store-badge.png" alt="">
        </div>
        <div class="newsletter-container">
            Get in Touch with us
            <form action="/" method="get">
            <div class="subscribe-form">
                    <label for="subscribe">
                        <i class="far fa-envelope fa-lg"></i>
                    </label>
                    <input type="email" id="subscribe" name="subscribe" placeholder="Enter Your Email id..." required>
            
            </div>
            <div class="subscribe-button"> 
            <button type="submit">
                Subscribe Now!
            </button>
            </div>
            </form>
            <span>
                Subcribe to our newsletter to get daily updates.
            </span>
        </div>    
    </div> 
    <div class="footer-bottom-container">
            &copy; 2020 URBAN BANK | All Rights Reserved.
    </div>
</footer>   
</body>
</html>