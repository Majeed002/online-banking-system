<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: ../../admin-login.php");
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
        <script defer src="../../Assets/Modules/Scripts/admin-dashboard-app.js"></script>
        <title>Add Interest Rate | Dashboard</title>
    </head>
    <body id="admin-body-pd" >
        <header class="admin-header" id="admin-header">
            <div class="admin-header__toggle">
                <i class='bx bx-menu' id="admin-header-toggle"></i>
            </div>
            <div class="admin-logout">
            <a href="../../admin-logout.php""> <button type="submit"><i class='bx bx-log-out admin-header__icon' ></i>LOGOUT</button> </a>
            </div>
        </header>

        <div class="admin-l-navbar" id="admin-nav-bar">
            <nav class="admin-nav">
                <div class="admin-logo-component">
                    <a href="./home.php" class="admin-nav__logo"  title="Admin Dashboard">
                        <i class='bx bx-user-circle admin-nav__logo-icon' ></i>
                        <span class="admin-nav__logo-name">ADMIN</span>
                    </a>

                    <div class="admin-sidebar-component">
                        <a href="./home.php" class="admin-nav__link"  title="Home">
                        <i class='bx bx-home admin-nav__icon' ></i>
                            <span class="admin-nav__name">HOME</span>
                        </a>
                        
                        <a href="./add-customer.php" class="admin-nav__link "  title="Add Customers">
                            <i class='bx bxs-user-plus admin-nav__icon' ></i>
                            <span class="admin-nav__name">ADD CUSTOMERS</span>
                        </a>

                        <a href="./my-customer.php" class="admin-nav__link"  title="My Customers">
                            <i class='bx bxs-user-rectangle admin-nav__icon' ></i>
                            <span class="admin-nav__name">MY CUSTOMERS</span>
                        </a>
                        
                        <a href="./online-approval.php" class="admin-nav__link" title="Online Approval">
                            <i class='bx bxs-user-check admin-nav__icon' ></i>
                            <span class="admin-nav__name">ONLINE APPROVAL</span>
                        </a>

                        <a href="./add-notice.php" class="admin-nav__link"  title="Add Notice">
                            <i class='bx bxs-note admin-nav__icon' ></i>
                            <span class="admin-nav__name">ADD NOTICE</span>
                        </a>

                        <a href="./post-blog.php" class="admin-nav__link"  title="Post Blog">
                            <i class='bx bxl-blogger admin-nav__icon' ></i>
                            <span class="admin-nav__name">POST BLOG</span>
                        </a>

                        <a href="./newsletter.php" class="admin-nav__link"  title="Newsletter">
                            <i class='bx bxs-news admin-nav__icon' ></i>
                            <span class="admin-nav__name">NEWSLETTER</span>
                        </a>

                        <a href="./admin-interest-rate.php" class="admin-nav__link active"  title="Interest Rate">
                            <i class='bx bx-line-chart admin-nav__icon'></i>
                            <span class="admin-nav__name">INTEREST RATE</span>
                        </a>
                    </div>
                </div>

                <a href="./home.php" class="admin-nav__logo"  title="Urban Bank">
                    <i class='bx bxs-bank admin-nav__logo-icon' ></i>
                    <span class="admin-nav__logo-name">&copy; URBAN BANK </span>
                </a>
            </nav>
        </div>
         

        <div class="interest-container">


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
            </div>

            <div class="loan" id="business-loan-card">
                <div class="loan-title" id="loan-title">
                    <i class="fas fa-chart-line" style="color: rgb(9, 162, 209);"></i>
                    Business Loan
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
            </div>
                    
                </div>
                    <div class="button-interest-rate">
                        
                        <a class="btn-interest-rate" href="./admin-interest-rate-action.php" >
                            <button  class="btn-interest-rate" type="submit" >
                                <span>Update</span>
                            </button>
                        </a>
                    
                    </div>
                </div>
            </div>
        </div>
        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>