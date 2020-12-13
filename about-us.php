<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE">
    <link rel="stylesheet" href="./Assets/Modules/Styles/icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/Modules/Styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script defer  src="./Assets/Modules/Scripts/app.js"></script>
    <link rel="icon" href="./Assets/Images/Bank_Logo/Title_icon.png" type="png">
    <title>Urban Bank | Official Website</title>
</head>
<body>
<div id="services-container">
    <div id="services-main">
    <!-- Navigation Bar  of Website-->  
    <nav>
        <!-- Logo Image of the navbar-->
        <div class="logo">
            <a href="./index.php"><img src="./Assets/Images/Bank_Logo/urban_bank_logo.png" title="Urban Bank" alt="Bank Logo"></a>
        </div>
        <!-- NavLinks-->
        <ul class="nav-links">
            <li>
                <a href="./index.php" >Home</a>
            </li>
            <li>
                <a  href="./services.php">Services</a>
            </li>
            <li>
                <a class="current" href="./about-us.php">About Us</a>
            </li>
            <li>
                <a href="./blogs.php">Blogs</a>
            </li>  
        </ul>
        <!-- Login and Register Button-->
            <ul class="login-register-button">
            <li>
                <a href="./user-login.php" >
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
    
    <div class="about-us-title">About Us</div>


        <section class="team-section">
        <div class="team-container">
            <div class="heading-team">
                <h2>
                    Board of Directors 
                </h2>
            </div>
            <div class="team-row">
                <div class="team-items">
                    <div class="item">
                    <img src="./Assets/Images/About-us/team-1.jpg" alt="team" />
                        <div class="inner">
                            <div class="info">
                                <h5>John Peter</h5>
                                <p>Managing Director & CEO</p>
                                    <div class="social-links">
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="./Assets/Images/About-us/team-2.jpg" alt="team" />
                        <div class="inner">
                            <div class="info">
                                <h5>Abhay Gupta</h5>
                                <p>Executive Director & CFO</p>
                                    <div class="social-links">
                                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                                            <a href=""><i class="fab fa-twitter"></i></a>
                                            <a href=""><i class="fab fa-facebook-f"></i></a>
                                            <a href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                    <img src="./Assets/Images/About-us/team-3.jpg" alt="team" />
                        <div class="inner">
                            <div class="info">
                                <h5>Dani Rower</h5>
                                <p>Executive Director & COO</p>
                                    <div class="social-links">
                                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                                            <a href=""><i class="fab fa-twitter"></i></a>
                                            <a href=""><i class="fab fa-facebook-f"></i></a>
                                            <a href=""><i class="fab fa-instagram"></i></a>
                                     </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                    <img src="./Assets/Images/About-us/team-4.jpg" alt="team" />
                        <div class="inner">
                            <div class="info">
                                <h5>Jimmy Cliff</h5>
                                <p>Shareholder Director</p>
                                <div class="social-links">
                                    <div class="social-links">
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    



    </div>   
 </div>

 <?php

include './footer.php';

?>
</body>
</html>