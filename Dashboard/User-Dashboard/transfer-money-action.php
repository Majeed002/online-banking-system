<?php

session_start();

if(!isset($_SESSION['customer_loggedin']) || $_SESSION['customer_loggedin'] !==true)
{
    header("location: ../../user-login.php");
}

include '../../Includes/Database-Connection/db-connection-inc.php'; 



$err_no = -1;

if (isset($_GET['customer_id'])) {
    $receiver_id = $_GET['customer_id'];
}

$sender_id = $_SESSION['customer_id'];
$amt = mysqli_real_escape_string($conn, $_POST["amt"]);
$pan_no = mysqli_real_escape_string($conn, $_POST["pan_no"]);

$sql0 = "SELECT * FROM customer_details WHERE customer_id=".$sender_id." AND pan_no='".$pan_no."'";
$result0 = $conn->query($sql0);
$row0 = $result0->fetch_assoc();

$sql5 = "SELECT * FROM customer_details WHERE customer_id=".$receiver_id;
$result5 = $conn->query($sql5);
$row5 = $result5->fetch_assoc();

if (($result0->num_rows) > 0) {
    $sql1 = "SELECT balance FROM passbook_".$sender_id." ORDER BY transaction_id DESC LIMIT 1";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $sender_balance = $row1["balance"];

    $updated_sender_balance = $sender_balance - $amt;
    if($updated_sender_balance >= 0) {
        $sql2 = "SELECT balance FROM passbook_".$receiver_id." ORDER BY transaction_id DESC LIMIT 1";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $receiver_balance = $row2["balance"];

        $updated_receiver_balance = $receiver_balance + $amt;

        $sql3 = "INSERT INTO passbook_".$sender_id." VALUES(
                    NULL,
                    NOW(),
                    'Sent to: ".$row5["cust_fname"]." ".$row5["cust_lname"].", AC/No: ".$row5["account_no"]."',
                    '$amt',
                    '0',
                    '$updated_sender_balance'
                )";

        $sql4 = "INSERT INTO passbook_".$receiver_id." VALUES(
                    NULL,
                    NOW(),
                    'Received from: ".$row0["cust_fname"]." ".$row0["cust_lname"].", AC/No: ".$row0["account_no"]."',
                    '0',
                    '$amt',
                    '$updated_receiver_balance'
                )";

        if (($conn->query($sql3) === TRUE) && ($conn->query($sql4) === TRUE)) {
            $err_no = 0;
        }
    }
    else {
        $err_no = 1;
    }
}
else {
    $err_no = 2;
}

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
        <script defer src="../../Assets/Modules/Scripts/user-dashboard-app.js"></script>
        <title>Add Benificiary | User Dashboard</title>
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
                        <a href="./profile.php" class="user-nav__link"  title="Profile">
                        <i class='bx bxs-user-rectangle user-nav__icon' ></i>
                            <span class="user-nav__name">PROFILE</span>
                        </a>
                        
                        <a href="./my-transaction.php" class="user-nav__link"  title="My Transaction">
                            <i class='bx bx-money user-nav__icon' ></i>
                            <span class="user-nav__name">MY TRANSACTION</span>
                        </a>

                        <a href="./atm-simulator.php" class="user-nav__link" title="Atm Simulator">
                            <i class='bx bx-box user-nav__icon' ></i>
                            <span class="user-nav__name">ATM SIMULATOR</span>
                        </a>

                        <a href="./transfer-fund.php" class="user-nav__link active"  title="Transfer Fund">
                            <i class='bx bx-transfer user-nav__icon' ></i>
                            <span class="user-nav__name">TRANSFER FUND</span>
                        </a>

                        <a href="./notices.php" class="user-nav__link"  title="notices">
                            <i class='bx bxs-note user-nav__icon' ></i>
                            <span class="user-nav__name">NOTICES</span>
                        </a>

                        <a href="./user-blogs.php" class="user-nav__link"  title="Blogs">
                            <i class='bx bxl-blogger user-nav__icon' ></i>
                            <span class="user-nav__name">BLOGS</span>
                        </a>

                        <a href="./grievances.php" class="user-nav__link"  title="Grievances">
                            <i class='bx bxs-news user-nav__icon' ></i>
                            <span class="user-nav__name">GRIEVANCE</span>
                        </a>

                        <a href="./user-interest-rate.php" class="user-nav__link"  title="Interest Rate">
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
                <h2>Add Benificary Details</h2>
        </div>

        <div class="flex-container">
        <div class="flex-item">
            <?php
            if ($err_no == -1) { ?>
                <p id="info"><?php echo "Connection Error ! Please try again later.\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 0) { ?>
                <p id="info"><?php echo "Transfer Successful !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info"><?php echo "Insufficient Funds !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 2) { ?>
                <p id="info"><?php echo "Wrong password entered !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Go Back</a>
        </div>
    </div>
        
    </body>
</html>