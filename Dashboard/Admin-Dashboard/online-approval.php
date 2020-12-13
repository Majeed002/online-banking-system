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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Assets/Modules/Styles/dashboard-main.css">
        <script defer src="../../Assets/Modules/Scripts/admin-dashboard-app.js"></script>
        <title>Online Approval | Dashboard</title>
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
                        
                        
                        <a href="./verified-account.php" class="admin-nav__link" title="Verified Account">
                        <i class='bx bx-check-double admin-nav__icon' ></i>
                            <span class="admin-nav__name">VERIFIED ACCOUNTS</span>
                        </a> 
                        
                        <a href="./online-approval.php" class="admin-nav__link active" title="Online Approval">
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

        <div class="online-approval-container">
        
            <div class="heading-title">
                <h2>Online Approval</h2>
            </div>

                
                    
    
                    <div class="ol-delete">
                        <form action="../../Includes/Reset-Request/customer-set-request-inc.php" method="POST">
                                Send Password Link:
                                <input type="text" name="cust_email_id" >
                                <input type="submit" name="send-pwd-link-submit" value="Send Mail" class="accept"> 
                                <?php
                                    if (isset($_GET["reset"])){
                                        if($_GET["reset"] == "success"){
                                            echo '<span class="success-messages"> Email Sent!</span>';
                                        }
                                    }

                                ?>
                        </form>
                        
                        <form action="" method="POST">
                            Delete Aaddhar Card:
                            <input type="text" name="aaddhar_no" >
                            <input type="submit" name="delete" value="Delete Record" class="unaccept"> 
                        </form>

                        <?php
                            if(isset($_POST['delete']))
                            {
                                $aaddhar_no = $_POST['aaddhar_no'];
                                $sql1="DELETE from ol_registration where aaddhar_no='$aaddhar_no'";
                                $result1 = mysqli_query($conn,$sql1);

                                if($result1){
                                    ?>
                                    <p><?php echo "Deleted Record Successfully!!!"?></p><?php
                                }
                                
                            }
                        ?>
                    </div>
                    
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table">
                        <thead class="thead" style="background-color: rgb(26, 64, 99); color: whitesmoke; text-align:center;">
                            <tr>
                            <th scope="col">Registered Aaddhar Number</th>
                            <th scope="col">Uploaded Aaddhar Card</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql= " SELECT * from ol_registration";
                                $result= mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                <tr style=" color: rgb(26, 64, 99); text-align:center;">
                                    <td><?php echo $row['aaddhar_no']?></td>
                                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['aaddhar_card']).'" alt="Aadharcard" style="max-width:500px; height: 250px; border-radius:25px;">'; ?></td>
                            </tr>
                                    <?php
                                }
                            ?>
                        
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>