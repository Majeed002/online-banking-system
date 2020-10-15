<?php include './Includes/UserDashboard-inc/ol-registration-inc.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE">
    <link rel="stylesheet" href="./Assets/Modules/Styles/icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/Modules/Styles/main.css">
    <script  defer src="./Assets/Modules/Scripts/app.js"></script>
    <link rel="icon" href="./Assets/Images/Bank_Logo/Title_icon.png" type="png">
    <title>Online Register | Urban Bank </title>
</head>

<body>
    <!-- Navigation Bar  of Website-->  
    <nav>
        <!-- Logo Image of the navbar-->
        <div class="logo">
            <a href="./index.php"><img src="./Assets/Images/Bank_Logo/urban_bank_logo.png" title="Urban Bank" alt="Bank Logo"></a>
        </div>
       <!-- Online Register Button-->
       <ul class="user-login-button">
            <li>
                <a href="./login.php" >
                    <button>Back to Login</button>
                </a>
            </li>
        </ul>
    </nav>   
    <!-- End of the Navigation Bar-->

    <!--Login Form-->
        <div class="user-ol-register-form-container">

            <div class="logo-urban-bank-form">
                <img src="./Assets/Images/Login-Register/logo_urban_bank_login.png" alt="urban-bank" class="logo-urban-bank-form-img">
            </div>

            <div class="ol-register-title">
                <h2 class="ol-register-title">Online Registration</h2>
            </div>
                        
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                
                <div class="ol-register-credentials">
                    <div>    
                        <label for="account_no">
                            <i class="far fa-user" style="color: rgb(26, 64, 99);"></i>
                            Account Number
                            <span class="error-messages"> <br> <?php echo $account_noErr; ?> </span>
                        </label>
                        <input id="account_no" name="account_no"  type="text" value="<?php $account_no; ?>" placeholder="Enter bank account number..." >
                    </div>

                    <div>
                        <label for="aadhaar_no">
                            <i class="far fa-id-card style="color: rgb(26, 64, 99);"></i>
                            Aadhaar Number 
                            <span class="error-messages"> <br><?php echo $aadhaar_noErr; ?> </span>
                        </label>
                        <input id="aadhaar_no" name="aadhaar_no" value="<?php $aadhaar_no; ?>" type="text" placeholder="Enter your aadhaar number..." >
                    </div>
<!--
                    <div>    
                        <label for="dob">
                            <i class="far fa-calendar-alt" style="color: rgb(26, 64, 99);"></i>
                            Date of Birth 
                            <span class="error-messages"> <?php echo $dob; ?> </span>
                        </label>
                        <input id="dob" name="dob"  type="date" value="<?php $dobErr; ?>" placeholder="Enter your Birthdate..." >
                    </div>
-->
                </div>

                <div class="ol-register-checkbox">
                    <input type="checkbox" name="tnc" id="tnc" value="Agreed">
                    <label for="tnc"> I agree <a href="">Terms</a> and <a href="">Condition</a></label>
                    <br> 
                    <span class="error-messages"> <?php echo $tncErr; ?> </span> 
                </div>

                 <div class="ol-register-button"> 
                    <button type="Submit">
                    <i class="fas fa-user-plus" style="color: whitesmoke;"></i>
                        Register
                     </button>
                </div> 
                
                <div class="register-process-link">
                Want be a member?<a href="./reg.php">Registration Process.</a>
                </div>
            </form>
            
        </div>


</body>
</html>