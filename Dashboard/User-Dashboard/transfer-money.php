<?php

session_start();

if(!isset($_SESSION['customer_loggedin']) || $_SESSION['customer_loggedin'] !==true)
{
    header("location: ../../user-login.php");
}

include '../../Includes/Database-Connection/db-connection-inc.php'; 


if (isset($_GET['customer_id'])) {
    $id = $_GET['customer_id'];
}

$sql0 = "SELECT * FROM customer_details WHERE customer_id=".$id;
$result0 = $conn->query($sql0);
$row0 = $result0->fetch_assoc();

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

        <form  action="./transfer-money-action.php" method="post">
        
        <div class="flex-container">
            <div class=container>
                <label>
                    To : <label id="info_label">
                        <?php echo $row0["cust_fname"]." ".$row0["cust_lname"] ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
                <div class=container>
                    <label style="margin-top:2rem">Account No :</label><br>
                    <input name="account_no" size="30" type="text" required />
                </div>
                <div class=container>
                    <label style="margin-top:2rem">Amount :</label><br>
                    <input name="amt" size="30" type="text" required />
                </div>
                <div  class=container>
                    <label style="margin-top:2rem">PAN No. :</b></label><br>
                    <input name="pan_no" size="30" type="text" required />
                </div>
        </div>

        

        <div class="flex-container" style="flex-direction:coloumn;">

            <div class="container">
                <button type="submit" style=" font-family:'Roboto',sans-serif; font-size:1.5rem;">Add</button>
                <button type="reset" onclick="return confirmReset();" style="background-color:red; font-family:'Roboto',sans-serif; font-size:1.5rem;" >Reset</button>
            </div>

        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
    }
    </script>
        
    </body>
</html>