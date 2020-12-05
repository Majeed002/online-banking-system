<?php
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
        <title> Notices | User Dashboard</title>
    </head>
    <body id="user-body-pd" >
        <header class="user-header" id="user-header">
            <div class="user-header__toggle">
                <i class='bx bx-menu' id="user-header-toggle"></i>
            </div>
            <div class="user-logout">
                <button type="submit"><i class='bx bx-log-out user-header__icon'></i>LOGOUT</button>
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
                        
                        <a href="./my-transaction.php" class="user-nav__link"  title="My Transaction">
                            <i class='bx bx-money user-nav__icon' ></i>
                            <span class="user-nav__name">MY TRANSACTION</span>
                        </a>

                        <a href="./transfer-fund.php" class="user-nav__link " title="Transfer Fund">
                            <i class='bx bx-transfer user-nav__icon' ></i>
                            <span class="user-nav__name">TRANSFER FUND</span>
                        </a>

                        <a href="./notices.php" class="user-nav__link active"  title="Notices">
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
                <h2>Notices</h2>
        </div>
        
       <div class="blog-flex-container">
       
        <?php
            $sql0 = "SELECT notice_id, notice_title, created FROM notice ORDER BY created DESC";
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $notice_id = $row["notice_id"];
                $sql1 = "SELECT notice_detail FROM notice_body WHERE notice_id=$notice_id";
                $result1 = $conn->query($sql1); ?>

                <div class="blog-flex-item">
                    <div class="blog-flex-container-title">
                        <h1 id="notice_title"><?php echo $row["notice_title"] . "<br>"; ?></h1>
                    </div>
                    <div class="blog-flex-container-title">
                        <p id="date"><?php echo "Date Creation : " .
                            date("d/m/Y", strtotime($row["created"])); ?></p>
                    </div>
                    <div class="blog-flex-container-body">
                        <p id="notice_detail"><?php while($row1 = $result1->fetch_assoc()) {
                            echo $row1["notice_detail"]; } ?></p>
                    </div>
                </div>

            <?php }
            } else {
                echo "No Notice available ! ";
            }
            $conn->close();
        ?>
    </div>
    </body>
</html>