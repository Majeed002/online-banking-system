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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="../../Assets/Modules/Styles/dashboard-main.css">
        <script defer src="../../Assets/Modules/Scripts/admin-dashboard-app.js"></script>
        <title>My Customer | Dashboard</title>
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

                        <a href="./my-customer.php" class="admin-nav__link active"  title="My Customers">
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
                <h2>My Customers</h2>
        </div>
        <div class="subheading-title">
            Customer Transaction History
        </div>
        <form action="" method="POST" >
                    <table class="table" >
                        <thead class="thead" style="background-color: rgb(26, 64, 99); color: whitesmoke; text-align:center;">
                            <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Remarks </th>
                            <th scope="col">Debit</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_GET['customer_id'])) {
                                    $_SESSION['customer_id'] = $_GET['customer_id'];
                                }
                                $sql= "SELECT * from passbook_".$_SESSION['customer_id'];
                                $result= mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_assoc($result))
                                {
                                    ?>
                                <tr style=" color: rgb(26, 64, 99); text-align:center;" >
                                    <td id="my-customer"><?php echo $row['transaction_id']?></td>
                                    <td id="my-customer">
                                        <?php 
                                        $time = strtotime($row["transaction_date"]);
                                        $sanitized_time = date("d/m/Y, g:i A", $time);
                                        echo $sanitized_time;
                                        ?>
                                    </td>
                                    <td id="my-customer"><?php echo $row['remarks']?></td>
                                    <td id="my-customer"><?php echo number_format($row["debit"]); ?></td>
                                    <td id="my-customer"><?php echo number_format($row["credit"]); ?></td>
                                    <td id="my-customer"><?php echo number_format($row["balance"]); ?></td>
                                    
                                    
                                   
                            </tr>
                                    <?php
                                }
                            ?>
                        
                        </tbody>
                    </table>
                </form>
                
                <div class="subheading-title"><a href="./my-customer.php" class="update">Back</a></div>
                
        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>