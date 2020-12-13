<?php 

include "./Includes/Database-Connection/db-connection-inc.php";


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

        </nav>   
        <!-- End of the Navigation Bar-->

        <!--Admin Reset Password Form-->
            <div class="admin-forgot-password-container">
                <?php
                
                 $selector = $_GET["selector"];
                 $validator = $_GET["validator"];

                 if(empty($selector) || empty($validator)){
                     echo "Could not Validate your Request" . $conn->error ;
                 }
                 else{
                     if(ctype_xdigit($selector) !==  false && ctype_xdigit($validator) !== false){
                        ?>
                        <div class="logo-urban-bank-form">
                            <img src="./Assets/Images/Login-Register/logo_urban_bank_login.png" alt="urban-bank" class="logo-urban-bank-form-img">
                        </div>

                        <div class="admin-forgot-password-title">
                            <h2 class="admin-forgot-password-title">Reset Password</h2>
                        </div>
                        <form action="./Includes/Reset-Request/customer-reset-password-inc.php" method="POST"> 
                            <input name="selector"  type="hidden" value="<?php echo $selector; ?>">
                            <input name="validator"  type="hidden" value="<?php echo $validator; ?>">
                            <div class="admin-forgot-password-credentials">
                                <div>
                                    <label for="cust_pwd">
                                        <i class="fas fa-key" style="color: rgb(26, 64, 99);"></i>
                                        Enter Password
                                        
                                    </label>
                                    <input id="cust_pwd_" name="cust_pwd"  type="password" placeholder="Enter a new password...">
                                </div>
                                <div>
                                    <label for="cust_pwd_cnf">
                                        <i class="fas fa-key" style="color: rgb(26, 64, 99);"></i>
                                        Confirm Password
                                        
                                    </label>
                                    <input id="cust_pwd_cnf" name="cust_pwd_cnf"  type="password" placeholder="Repeat new password...">
                                </div>
                            </div>
    
                            <div class="admin-forgot-password-send-button"> 
                                <button type="submit" name="customer-reset-password-submit">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                        
                     <?php   
                     }
                 }

                 
                ?>

                <?php
                    if (isset($_GET["newpwd"])){
                        if($_GET["newpwd"] == "empty"){
                            echo '<br><center><div class="error-messages"> Please fill all the fields!</div></center>';
                        }
                    }

                ?>

                <?php
                    if (isset($_GET["newpwd"])){
                        if($_GET["newpwd"] == "pwdlength"){
                            echo '<br><center><div class="error-messages"> Your Password should contain 8 characters!</div></center>';
                        }
                    }

                ?>

                <?php
                    if (isset($_GET["newpwd"])){
                        if($_GET["newpwd"] == "pwdnotsame"){
                            echo '<br><center><div class="error-messages"> Both Passsword does not match!</div></center>';
                        }
                    }

                ?>
            </div>
    </div>
</div>
<?php

include './footer.php';

?>
</body>
</html>