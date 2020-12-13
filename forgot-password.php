
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
            <link rel="icon" href="./Assets/Images/Bank_Logo/Title_icon.png" type="png">
            <title>Reset Password | Urban Bank</title>
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
            <!-- Login and Register Button-->
            <ul class="user-login-button">
            <li>
                <a href="./user-login.php" >
                    <button>BACK TO LOGIN</button>
                </a>
            </li>
        </ul> 
        </nav>   
        <!-- End of the Navigation Bar-->
    
        <!--Forgot Password Form-->
            <div class="user-forgot-password-container">
    
                <div class="logo-urban-bank-form">
                    <img src="./Assets/Images/Login-Register/logo_urban_bank_login.png" alt="urban-bank" class="logo-urban-bank-form-img">
                </div>
    
                <div class="forgot-password-title">
                    <h2 class="forgot-password-title">Reset Password</h2>
                </div>
    
                
                <form action="./Includes/Reset-Request/customer-reset-request-inc.php" method="POST">
                    <div class="forgot-password-credentials">
                        
    
                        <div>
                            <label for="cust_email_id">
                                <i class="far fa-envelope" style="color: rgb(26, 64, 99);"></i>
                                Email-ID
                            </label>
                            <input id="cust_email_id" name="cust_email_id"  type="text" placeholder="Enter your email id...">
                        </div>
                    </div>
    
                     <div class="forgot-password-send-button"> 
                        <button type="submit" name="send-pwd-link-submit">
                        <i class="far fa-paper-plane" style="color: whitesmoke;"></i>
                            Send to mail
                         </button>
                    </div>
                 </form>
                 <?php
                    if (isset($_GET["reset"])){
                        if($_GET["reset"] == "success"){
                            echo '<center><div class="success-messages"> Check your Email!</div></center>';
                        }
                    }

                ?>
            </div>
        </div>
    </div>
</div>   
    
<?php

include './footer.php';

?>     
    
<script  src="./Assets/Modules/Scripts/app.js"></script>
    
</body>
</html>