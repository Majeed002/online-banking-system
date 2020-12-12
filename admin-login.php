<?php 
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['admin_mail_id']))
{
    header("location: ./Dashboard/Admin-Dashboard/home.php");
    exit;
}
require_once "./Includes/Database-Connection/db-connection-inc.php";

$admin_email_id = $admin_pwd = "";
$admin_email_id_err = $admin_pwd_err= "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['admin_email_id'])))
    {
        $admin_email_id_err = "*Please enter Email ID";
    }
    if(empty(trim($_POST['admin_pwd']))){
        $admin_pwd_err = "*Please enter Password";
    }
    else{
        $admin_email_id = trim($_POST['admin_email_id']);
        $admin_pwd = trim($_POST['admin_pwd']);
    }


if(empty($err))
{
    $sql = "SELECT admin_id, admin_email_id, admin_pwd FROM admin_login WHERE admin_email_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_admin_email_id);
    $param_admin_email_id = $admin_email_id;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $admin_id, $admin_email_id, $hashed_admin_pwd);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($admin_pwd, $hashed_admin_pwd))
                        {
                            // this means the admin_pwd is corrct. Allow user to login
                            session_start();
                            $_SESSION["admin_email_id"] = $admin_email_id;
                            $_SESSION["admin_id"] = $admin_id;
                            $_SESSION["loggedin"] = true;

                            header("location: ./Dashboard/Admin-Dashboard/home.php");
                            
                        }
                    }

                }

    }
}    


}


?>

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
        <title>Admin Login | Urban Bank</title>
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
       <ul class="user-login-button">
            <li>
                <a href="./user-login.php" >
                    <button>USER LOGIN</button>
                </a>
            </li>
        </ul>
    </nav>   
    <!-- End of the Navigation Bar-->

    <!--Login Form-->
        <div class="admin-login-form-container">

            <div class="logo-urban-bank-form">
                <img src="./Assets/Images/Login-Register/logo_urban_bank_login.png" alt="urban-bank" class="logo-urban-bank-form-img">
            </div>

            <div class="log-in-title">
                <h2 class="log-in-title">Admin Login</h2>
            </div>
                        
            <form action="" method="POST">
                
                <div class="admin-login-credentials">
                    <div>    
                        <label for="admin_email_id">
                            <i class="far fa-envelope" style="color: rgb(26, 64, 99);"></i>
                            Email-ID 
                            <span class="error-messages"> <br> <?php echo $admin_email_id_err; ?> </span>
                        </label>
                        <input id="admin_email_id" name="admin_email_id"  type="text" value="<?php $admin_email_id?>" placeholder="Enter your email-id..." >
                    </div>

                    <div>
                        <label for="admin_pwd">
                            <i class="fas fa-key" style="color: rgb(26, 64, 99);"></i>
                            Password <span class="error-messages"> <br> <?php echo $admin_pwd_err; ?> </span>
                        </label>
                        <input id="admin_pwd" name="admin_pwd"  type="password" value="<?php $admin_pwd?>" placeholder="Enter your password..." >
                    </div>
                </div>

                 <div class="admin-login-submit-button"> 
                    <button type="Submit">
                    <i class="fas fa-unlock-alt" style="color: whitesmoke;"></i>
                        Log In
                     </button>
                </div>
                <?php
                    if (isset($_GET["newpwd"])){
                        if($_GET["newpwd"] == "passwordupdated"){
                            echo '<center><div class="success-messages">Your Password has been reset!</div></center>';
                        }
                    }

                ?>
                <div class="forgot-password">
                     Forgot your 
                     <a href="./admin-forgot-password.php">
                        <span>Password?</span>
                    </a>
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