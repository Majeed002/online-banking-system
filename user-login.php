<?php 
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['user_mail_id']))
{
    header("location: ./Dashboard/User-Dashboard/my-transaction.php");
    exit;
}
require_once "./Includes/Database-Connection/db-connection-inc.php";

$cust_email_id = $cust_pwd = "";
$cust_email_id_err = $cust_pwd_err= "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['cust_email_id'])))
    {
        $cust_email_id_err = "*Please enter Email ID";
    }
    if(empty(trim($_POST['cust_pwd']))){
        $cust_pwd_err = "*Please enter Password";
    }
    else{
        $cust_email_id = trim($_POST['cust_email_id']);
        $cust_pwd = trim($_POST['cust_pwd']);
    }


if(empty($err))
{
    $sql = "SELECT customer_id, cust_email_id, cust_pwd FROM customer_details WHERE cust_email_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_cust_email_id);
    $param_cust_email_id = $cust_email_id;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $customer_id, $cust_email_id, $hashed_cust_pwd);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($cust_pwd, $hashed_cust_pwd))
                        {
                            // this means the cust_pwd is corrct. Allow user to login
                            session_start();
                            $_SESSION["cust_email_id"] = $cust_email_id;
                            $_SESSION["customer_id"] = $customer_id;
                            $_SESSION["customer_loggedin"] = true;

                            header("location: ./Dashboard/User-Dashboard/my-transaction.php");
                            
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
                    <button>Admin LOGIN</button>
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
                        
            <form action="" method="POST">
                
                <div class="login-credentials">
                    <div>    
                        <label for="cust_email_id">
                            <i class="far fa-user" style="color: rgb(26, 64, 99);"></i>
                            Email 
                            <span class="error-messages"> <br> <?php echo $cust_email_id_err; ?> </span>
                        </label>
                        <input id="cust_email_id" name="cust_email_id"  type="text" value="" placeholder="Enter your Email ID..." >
                    </div>

                    <div>
                        <label for="cust_pwd">
                            <i class="fas fa-key" style="color: rgb(26, 64, 99);"></i>
                            Password 
                            <span class="error-messages"> <br> <?php echo $cust_pwd_err; ?> </span>
                        </label>
                        <input id="cust_pwd" name="cust_pwd" value="" type="password" placeholder="Enter your password..." >
                    </div>
                </div>

                <div class="login-checkbox">
                    <label for="tnc"><a href="">Terms</a> and <a href="">Condition</a> Applied</label>
                    <br> 
                    <span class="error-messages"> </span> 
                </div>

                 <div class="login-submit-button"> 
                    <button type="submit">
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
<?php

include './footer.php';

?>   
</body>
</html>