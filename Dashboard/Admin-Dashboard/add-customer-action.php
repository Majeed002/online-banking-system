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
        <title>Add Customer | Dashboard</title>
    </head>
    
        
        <!--Php Code to add customer detials -->

        <?php
            $cust_fname = mysqli_real_escape_string($conn, $_POST["cust_fname"]);
            $cust_lname = mysqli_real_escape_string($conn, $_POST["cust_lname"]);
            $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
            $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
            $aaddhar_no = mysqli_real_escape_string($conn, $_POST["aaddhar_no"]);
            $pan_no = mysqli_real_escape_string($conn, $_POST["pan_no"]);
            $cust_phone_no = mysqli_real_escape_string($conn, $_POST["cust_phone_no"]);
            $cust_address = mysqli_real_escape_string($conn, $_POST["cust_address"]);
            $account_no = mysqli_real_escape_string($conn, $_POST["account_no"]);
            $cust_email_id = mysqli_real_escape_string($conn, $_POST["cust_email_id"]);
            $o_balance = mysqli_real_escape_string($conn, $_POST["o_balance"]);


            $sql0 = "SELECT MAX(customer_id) FROM customer_details";
            $result = $conn->query($sql0);
            $row = $result->fetch_assoc();
            $id = $row["MAX(customer_id)"] + 1;

            /*  Prevent mismatch between cust_id and benef/passbook table number.
                This is because when a row is deleted from customer AUTO_INCREMENT does
                not reset but keeps increasing.
                Hence resest AUTO_INCREMENT to $id and eleminate the error. */
            $sql5 = "ALTER TABLE customer_details AUTO_INCREMENT=".$id;
            $conn->query($sql5);

            $sql1 = "CREATE TABLE passbook_".$id."(
                        transaction_id INT NOT NULL AUTO_INCREMENT,
                        transaction_date DATETIME,
                        remarks VARCHAR(255),
                        debit INT,
                        credit INT,
                        balance INT,
                        PRIMARY KEY(transaction_id)
                    )";

            $sql2 = "CREATE TABLE beneficiary_".$id."(
                        benef_id INT NOT NULL AUTO_INCREMENT,
                        benef_cust_id INT UNIQUE,
                        benef_email_id VARCHAR(30) UNIQUE,
                        benef_phone_no VARCHAR(20) UNIQUE,
                        benef_account_no INT UNIQUE,
                        PRIMARY KEY(benef_id)
                    )";

            $sql3 = "INSERT INTO customer_details VALUES(
                        NULL,
                        '$cust_fname',
                        '$cust_lname',
                        '$gender',
                        '$dob',
                        '$aaddhar_no',
                        '$pan_no',
                        '$cust_phone_no',
                        '$cust_address',
                        '$account_no',
                        '$cust_email_id',
                        NULL
                    )";

            $sql4 = "INSERT INTO passbook_".$id." VALUES(
                        NULL,
                        NOW(),
                        'Opening Balance',
                        '0',
                        '$o_balance',
                        '$o_balance'
                    )";

    ?>

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
                        
                        <a href="./add-customer.php" class="admin-nav__link active"  title="Add Customers">
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



        <div class="heading-title">
                <h2>Add Customer</h2>
        </div>

        <div class="flex-container">
            <div class="flex-item">
                <?php
                if (($conn->query($sql3) === TRUE)) { ?>
                    <p id="info"><?php echo "Customer created successfully !\n"; ?></p>
            </div>

            <div class="flex-item">
                <?php
                if (($conn->query($sql1) === TRUE)) { ?>
                    <p id="info"><?php echo "Passbook created successfully !\n"; ?></p>
                <?php
                } else { ?>
                    <p id="info"><?php
                    echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php } ?>
            </div>

            <div class="flex-item">
                <?php
                if (($conn->query($sql4) === TRUE)) { ?>
                    <p id="info"><?php echo "Passbook updated successfully !\n"; ?></p>
                <?php
                } else { ?>
                    <p id="info"><?php
                    echo "Error: " . $sql4 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php } ?>
            </div>

            <div class="flex-item">
                <?php
                if (($conn->query($sql2) === TRUE)) { ?>
                    <p id="info"><?php echo "Beneficiary created successfully !\n"; ?></p>
                <?php
                } else { ?>
                    <p id="info"><?php
                    echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php } ?>
            </div>

                <?php
                } else { ?>
            </div>
            <div class="flex-item">
                    <p id="info"><?php
                    echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php } ?>
            </div>
            <?php $conn->close(); ?>

            <div class="flex-item">
                <a href="./add-customer.php" class="button">Add Again</a>
            </div>

    </div>
    </body>
</html>