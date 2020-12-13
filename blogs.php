<?php
    include "./Includes/Database-Connection/db-connection-inc.php";
?>


<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE">
    <link rel="stylesheet" href="./Assets/Modules/Styles/icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/Modules/Styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script defer  src="./Assets/Modules/Scripts/app.js"></script>
    <link rel="icon" href="./Assets/Images/Bank_Logo/Title_icon.png" type="png">
    <title>Urban Bank | Official Website</title>
</head>
<body>
<div id="services-container">
    <div id="services-main">
    <!-- Navigation Bar  of Website-->  
    <nav>
        <!-- Logo Image of the navbar-->
        <div class="logo">
            <a href="./index.php"><img src="./Assets/Images/Bank_Logo/urban_bank_logo.png" title="Urban Bank" alt="Bank Logo"></a>
        </div>
        <!-- NavLinks-->
        <ul class="nav-links">
            <li>
                <a href="./index.php" >Home</a>
            </li>
            <li>
                <a  href="./services.php">Services</a>
            </li>
            <li>
                <a  href="./about-us.php">About Us</a>
            </li>
            <li>
                <a class="current" href=".blogs.php">Blogs</a>
            </li>  
        </ul>
        <!-- Login and Register Button-->
            <ul class="login-register-button">
            <li>
                <a href="./user-login.php" >
                    <button>LOGIN/REGISTER</button>
                </a>
            </li>
        </ul> 
        <!--Burger Menu for navbar-->
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>   
    <!-- End of the Navigation Bar-->
    
    <div class="about-us-title">Blogs</div>

    <div class="blog-flex-container">
        <?php
            $sql0 = "SELECT blog_id, blog_title, created FROM blog ORDER BY created DESC";
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $blog_id = $row["blog_id"];
                $sql1 = "SELECT blog_detail FROM blog_body WHERE blog_id=$blog_id";
                $result1 = $conn->query($sql1); ?>

                <div class="blog-flex-item">
                    <div class="blog-flex-container-title">
                        <h1 id="blog_title"><?php echo $row["blog_title"] . "<br>"; ?></h1>
                    </div>
                    <div class="blog-flex-container-title">
                        <p id="date"><?php echo "Date Creation : " .
                            date("d/m/Y", strtotime($row["created"])); ?></p>
                    </div>
                    <div class="blog-flex-container-body">
                        <p id="blog_detail"><?php while($row1 = $result1->fetch_assoc()) {
                            echo $row1["blog_detail"]; } ?></p>
                    </div>
                </div>

            <?php }
            } else {
                echo "No news available ! Please post some.";
            }
            $conn->close();
        ?>
    </div>

    



    </div>   
 </div>

 <?php

include './footer.php';

?>

</body>
</html>