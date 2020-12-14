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
        <title>Home | Dashboard</title>
    </head>
    <body id="admin-body-pd" >
        <header class="admin-header" id="admin-header">
            <div class="admin-header__toggle">
                <i class='bx bx-menu' id="admin-header-toggle"></i>
            </div>
            <div class="admin-logout">
            <a href="../../admin-logout.php"> <button type="submit"><i class='bx bx-log-out admin-header__icon' ></i>LOGOUT</button> </a>
                
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
                        <a href="./home.php" class="admin-nav__link active"  title="Home">
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
                        
                        <a href="./verified-account.php" class="admin-nav__link" title="Verified Account">
                        <i class='bx bx-check-double admin-nav__icon' ></i>
                            <span class="admin-nav__name">VERIFIED ACCOUNTS</span>
                        </a>

                        <a href="./online-approval.php" class="admin-nav__link" title="Online Approval">
                            <i class='bx bxs-user-check admin-nav__icon' ></i>
                            <span class="admin-nav__name">ONLINE APPROVAL</span>
                        </a>

                        <a href="./add-notice.php" class="admin-nav__link "  title="Add Notice">
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

                        <a href="./admin-interest-rate.php" class="admin-nav__link"  title="Interest Rate">
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

        


            <div class="heading-title">
                <h2>Home </h2>
            </div>

        <div class="home-container">
            <div class="home-wrapper">

                <div class="home" id="no-customer-card">
                    <div class="home-title" id="home-title">
                        <i class="fas fa-user    loan-icon" style="color: rgb(26, 64, 99); , hover"></i>
                        My Customers
                    </div>

                    <div class="home-number">
                    <?php
                    $sql = "SELECT count(customer_id) from customer_details;";
                    $res = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_array($res);
                            echo $result[0];
                    
                    
                    ?>
                    </div>
                
                    
                    <div class="button-home">   
                        <a class="btn-home" href="./my-customer.php" >
                            <button  class="btn-home" type="submit" >
                                <span>Manage</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="home" id="ol-registered-card">
                    <div class="home-title" id="home-title">
                        <i class="fas fa-user-check loan-icon" style="color: rgb(26, 64, 99); , hover"></i>
                        Online Registered
                    </div>
                    
                    <div class="home-number">
                        <?php
                        $sql = "SELECT count(ol_id) from ol_registration;";
                        $res = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_array($res);
                                echo $result[0];
                        
                        
                        ?>
                    </div>
                
                    
                    <div class="button-home">   
                        <a class="btn-home" href="./online-approval.php" >
                            <button  class="btn-home" type="submit" >
                                <span>Check</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="home" id="verified-customer-card">
                    <div class="home-title" id="home-title">
                        <i class="fas fa-check-double loan-icon" style="color: rgb(26, 64, 99); , hover"></i>
                        Verified Accounts
                    </div>
                    
                    <div class="home-number">
                        <?php
                        $sql = "SELECT count(vc_id) from verified_customer;";
                        $res = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_array($res);
                                echo $result[0];
                        
                        
                        ?>
                    </div>
                
                    
                    <div class="button-home">   
                        <a class="btn-home" href="./verified-account.php" >
                            <button  class="btn-home" type="submit" >
                                <span>Navigate</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="home" id="interest-rate-card">
                    <div class="home-title" id="home-title">
                        <i class="fas fa-percentage loan-icon" style="color: rgb(26, 64, 99); , hover"></i>
                        Interest Rate
                    </div>
                    
                    <div class="home-number">
                        <?php
                        $sql = "SELECT count(ir_id) from interest_rate;";
                        $res = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_array($res);
                                echo $result[0];
                        
                        
                        ?>
                    </div>
                
                    
                    <div class="button-home">   
                        <a class="btn-home" href="./admin-interest-rate.php" >
                            <button  class="btn-home" type="submit" >
                                <span>Update</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="home" id="no-notice-card">
                    <div class="home-title" id="home-title">
                        <i class="fas fa-sticky-note loan-icon" style="color: rgb(26, 64, 99); , hover"></i>
                        Notices
                    </div>
                    
                    <div class="home-number">
                        <?php
                        $sql = "SELECT count(notice_id) from notice;";
                        $res = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_array($res);
                                echo $result[0];
                        
                        
                        ?>
                    </div>
                
                    
                    <div class="button-home">   
                        <a class="btn-home" href="./add-notice.php" >
                            <button  class="btn-home" type="submit" >
                                <span>Add Notice</span>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="home" id="no-blog-card">
                    <div class="home-title" id="home-title">
                        <i class="fab fa-blogger-b loan-icon" style="color: rgb(26, 64, 99); , hover"></i>
                       Blogs
                    </div>
                    
                    <div class="home-number">
                    <?php
                        $sql = "SELECT count(blog_id) from blog;";
                        $res = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_array($res);
                                echo $result[0];
                        
                        
                        ?>
                    </div>
                
                    
                    <div class="button-home">   
                        <a class="btn-home" href="./post-blog.php" >
                            <button  class="btn-home" type="submit" >
                                <span>Post Blogs</span>
                            </button>
                        </a>
                    </div>
                </div>
                
            </div>       
        </div>
        <script src="assets/js/main.js"></script>
    </body>
</html>