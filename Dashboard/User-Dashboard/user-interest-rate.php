<?php


session_start();

if(!isset($_SESSION['customer_loggedin']) || $_SESSION['customer_loggedin'] !==true)
{
    header("location: ../../user-login.php");
}



include '../../Includes/Database-Connection/db-connection-inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../Assets/Modules/Styles/icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" href="../../Assets/Images/Bank_Logo/Title_icon.png" type="png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="../../Assets/Modules/Styles/dashboard-main.css">
        <script defer src="../../Assets/Modules/Scripts/user-dashboard-app.js"></script>
        <title> Check Interest Rate | User Dashboard</title>
    </head>
    <body id="user-body-pd" >
        <header class="user-header" id="user-header">
            <div class="user-header__toggle">
                <i class='bx bx-menu' id="user-header-toggle"></i>
            </div>
            <div class="user-logout">
                <a href="../../user-logout.php"> <button type="submit"><i class='bx bx-log-out user-header__icon' ></i>LOGOUT</button> </a>
            </div>
        </header>

        <div class="user-l-navbar" id="user-nav-bar">
            <nav class="user-nav">
                <div class="user-logo-component">
                    <a href="./profile.php" class="user-nav__logo"  title="User Dashboard">
                        <i class='bx bx-user-circle user-nav__logo-icon' ></i>
                        <span class="user-nav__logo-name">USER</span>
                    </a>

                    <div class="user-sidebar-component">
                        <a href="./profile.php" class="user-nav__link "  title="Profile">
                        <i class='bx bxs-user-rectangle user-nav__icon' ></i>
                            <span class="user-nav__name">PROFILE</span>
                        </a>
                        
                        <a href="./my-transaction.php" class="user-nav__link" title="My Transaction">
                            <i class='bx bx-money user-nav__icon' ></i>
                            <span class="user-nav__name">MY TRANSACTION</span>
                        </a>

                        <a href="./transfer-fund.php" class="user-nav__link "  title="Transfer Fund">
                            <i class='bx bx-transfer user-nav__icon' ></i>
                            <span class="user-nav__name">TRANSFER FUND</span>
                        </a>

                        <a href="./notices.php" class="user-nav__link "  title="Notices">
                            <i class='bx bxs-note user-nav__icon' ></i>
                            <span class="user-nav__name">NOTICES</span>
                        </a>

                        <a href="./user-blogs.php" class="user-nav__link "  title="Blogs">
                            <i class='bx bxl-blogger user-nav__icon' ></i>
                            <span class="user-nav__name">BLOGS</span>
                        </a>

                        <a href="./grievances.php" class="user-nav__link"  title="Grievances">
                            <i class='bx bxs-news user-nav__icon' ></i>
                            <span class="user-nav__name">GRIEVANCE</span>
                        </a>

                        <a href="./user-interest-rate.php" class="user-nav__link active"  title="Interest Rate">
                            <i class='bx bx-line-chart user-nav__icon'></i>
                            <span class="user-nav__name">INTEREST RATE</span>
                        </a>
                    </div>
                </div>

                <a href="./profile.php" class="user-nav__logo"  title="Urban Bank">
                    <i class='bx bxs-bank user-nav__logo-icon' ></i>
                    <span class="user-nav__logo-name">&copy; URBAN BANK </span>
                </a>
            </nav>
        </div>
        <div class="heading-title">
                <h2>Interest Rate</h2>
        </div>

        <div class="interest-rate-container">
        
        <div class="interest-rate-loan-wrapper">

            <div class="loan" id="personal-loan-card">
                <div class="loan-title" id="loan-title">
                    <i class="fas fa-wallet loan-icon" style="color: rgb(122, 92, 63); , hover"></i>
                    
                    Personal Loan
                </div>
                <div class="interest-rate-percentage">
                <?php
                    $sql = "select * from interest_rate where ir_id=1;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['interest_rate'];
                        }
                    }
                    
                    ?>
                 p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. <?php
                    $sql = "select * from interest_rate where ir_id=1;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo date("d.m.Y", strtotime($row['create_at']));
                        }
                    }
                    
                    ?> 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="home-loan-card">
                <div class="loan-title" id="loan-title">
                    <i class="fas fa-home" style="color: rgb(48, 122, 60);"></i>
                    Home Loan
                </div>
                <div class="interest-rate-percentage">
                <?php
                    $sql = "select * from interest_rate where ir_id=2;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['interest_rate'];
                        }
                    }
                    
                    ?> p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f.  <?php
                    $sql = "select * from interest_rate where ir_id=2;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo date("d.m.Y", strtotime($row['create_at']));
                        }
                    }
                    
                    ?> 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="car-loan-card">
                <div class="loan-title" id="loan-title">
                    <i class="fas fa-car" style="color: rgba(184, 41, 5, 0.938);"></i>
                    Car Loan
                </div>
                <div class="interest-rate-percentage">
                <?php
                    $sql = "select * from interest_rate where ir_id=3;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['interest_rate'];
                        }
                    }
                    
                    ?> p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. <?php
                    $sql = "select * from interest_rate where ir_id=3;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo date("d.m.Y", strtotime($row['create_at']));
                        }
                    }
                    
                    ?> 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="business-loan-card">
                <div class="loan-title" id="loan-title">
                    <i class="fas fa-piggy-bank" style="color: rgb(9, 162, 209);"></i>
                    Saving Accounts
                </div>
                <div class="interest-rate-percentage">
                <?php
                    $sql = "select * from interest_rate where ir_id=4;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['interest_rate'];
                        }
                    }
                    
                    ?> p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. <?php
                    $sql = "select * from interest_rate where ir_id=4;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo date("d.m.Y", strtotime($row['create_at']));
                        }
                    }
                    
                    ?> 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="gold-loan-card">
                <div class="loan-title" id="loan-title">
                    <i class="fas fa-coins" style="color: rgb(204, 185, 98);"></i>
                    Gold Loan
                </div>
                <div class="interest-rate-percentage">
                <?php
                    $sql = "select * from interest_rate where ir_id=5;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['interest_rate'];
                        }
                    }
                    
                    ?> p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. <?php
                    $sql = "select * from interest_rate where ir_id=5;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo date("d.m.Y", strtotime($row['create_at']));
                        }
                    }
                    
                    ?> 
                </div>
                <div class="interest-rate-tc">
                   <a href="#">
                   *T&C Apply
                   </a> 
                </div>
            </div>

            <div class="loan" id="education-loan-card">
                <div class="loan-title" id="loan-title">
                    <i class="fas fa-graduation-cap" style="color: rgb(75, 75, 75);"></i>
                    Education Loan
                </div>
                <div class="interest-rate-percentage">
                <?php
                    $sql = "select * from interest_rate where ir_id=6;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['interest_rate'];
                        }
                    }
                    
                    ?> p.a.
                </div>
                <div class="interest-rate-date">
                    w.e.f. <?php
                    $sql = "select * from interest_rate where ir_id=6;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo date("d.m.Y", strtotime($row['create_at']));
                        }
                    }
                    
                    ?>
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


    </body>
</html>