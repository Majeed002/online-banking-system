<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE">
    <link rel="stylesheet" href="./Assets/Modules/Styles/icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/Modules/Styles/main.css">
    <script defer src="./Assets/Modules/Scripts/app.js"></script>
    <link rel="icon" href="./Assets/Images/Bank_Logo/Title_icon.png" type="png">
    <title>Urban Bank | Official Website</title>
</head>

<body>
<div id="homepage-container">
    <div id="homepage-main">
    <!-- Navigation Bar  of Website-->  
    <nav>
        <!-- Logo Image of the navbar-->
        <div class="logo">
            <a href=""><img src="./Assets/Images/Bank_Logo/urban_bank_logo.png" title="Urban Bank" alt="Bank Logo"></a>
        </div>
        <!-- NavLinks-->
        <ul class="nav-links">
            <li>
                <a class="current" href="./index.php" >Home</a>
            </li>
            <li>
                <a  href="./services.php">Services</a>
            </li>
            <li>
                <a href="#">About Us</a>
            </li>
            <li>
                <a href="#">Blogs</a>
            </li>
            <li>
                <a href="#">News</a></li>
            <li>
                <a href="#">Downloads</a>
            </li>
            
            
        </ul>
        <!-- Login and Register Button-->
            <ul class="login-register-button">
            <li>
                <a href="./login.php" >
                    <button>LOGIN/REGISTER</button>
                </a>
            </li>
        </ul> 
        <!--Burger Menu for navbar-->
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>   
    <!-- End of the Navigation Bar-->
    
    <div class="img-slider">   
    </div>



    <div class="interest-rate-container">
        <div class="heading-interest-rate">
            <h2>
                Interest Rate
            </h2>
        </div>
        <div class="interest-rate-loan-wrapper">

            <div class="loan" id="personal-loan-card">
                <div class="loan-title">
                    <i class="fas fa-wallet" style="color: rgb(122, 92, 63);"></i>
                    Personal Loan
                </div>
                <div class="interest-rate-percentage">
                    1.5% p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. 01.08.2020 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
                <!--
                     <i class="fas fa-wallet fa-10x bg-img" style="color: rgba(211, 211, 211, 0.774);"></i>
                -->  
            </div>

            <div class="loan" id="home-loan-card">
                <div class="loan-title">
                    <i class="fas fa-home" style="color: rgb(48, 122, 60);"></i>
                    Home Loan
                </div>
                <div class="interest-rate-percentage">
                    6.95% p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. 01.08.2020 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="Car-loan-card">
                <div class="loan-title">
                    <i class="fas fa-car" style="color: rgba(184, 41, 5, 0.938);"></i>
                    Car Loan
                </div>
                <div class="interest-rate-percentage">
                    3.45% p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. 01.08.2020 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="business-loan-card">
                <div class="loan-title">
                    <i class="fas fa-chart-line" style="color: rgb(9, 162, 209);"></i>
                    Business Loan
                </div>
                <div class="interest-rate-percentage">
                    8.35% p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. 01.08.2020 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="gold-loan-card">
                <div class="loan-title">
                    <i class="fas fa-coins" style="color: rgb(204, 185, 98);"></i>
                    Gold Loan
                </div>
                <div class="interest-rate-percentage">
                    6.25% p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. 01.08.2020 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="education-loan-card">
                <div class="loan-title">
                    <i class="fas fa-graduation-cap" style="color: rgb(75, 75, 75);"></i>
                    Education Loan
                </div>
                <div class="interest-rate-percentage">
                    3.95% p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. 01.08.2020 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>
            
        </div>
        <div class="button-interest-rate">
            
            <a class="btn-interest-rate" href="#" target="_blank">
                <button  class="btn-interest-rate"type="button" >
                    <span>Check Eligibility</span>
                </button>
            </a>
           
        </div>
    </div>
    
    <!--
    <button class="to-top">
        <a href="#" class="top-top"></a>
    </button>
    -->


    
 </div>   
 </div>

 <footer id="main-footer">
        <div class="contact-follow-container">
            
            <div class="contact-us-container">
                <div class="contact-us-title">
                    CONTACT US
                </div>
            </div>
            
            <div class="follow-us-container">
                <div class="follow-us-title">
                    FOLLOW US
                </div>
            </div>
        </div> 
    </footer>
     
</body>
</html>