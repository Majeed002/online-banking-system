<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE">
    <link rel="stylesheet" href="./Assets/Modules/Styles/icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/Modules/Styles/main.css">
    <link rel="icon" href="./Assets/Images/Bank_Logo/Title_icon.png" type="png">
    <title>Urban Bank | Official Website</title>
</head>

<body>
    <!-- Navigation Bar  of Website-->  
    <nav>
        <!-- Logo Image of the navbar-->
        <div class="logo">
            <a href=""><img src="./Assets/Images/Bank_Logo/urban_bank_logo.png" title="Urban Bank" alt="Bank Logo"></a>
        </div>
        <!-- NavLinks-->
        <ul class="nav-links">
            <li>
                <a href="./index.html" >Home</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">About Us</a>
            </li>
            <li>
                <a href="#">Blogs</a>
            </li>
            <li>
                <a href="#">News</a></li>
            <li>
                <a href="#">Downloads</a>
            </li>
            
            
        </ul>
        <!-- Login and Register Button-->
            <ul class="login-register-button">
            <li>
                <a href="./login.html" >
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
<div class= "wrapper">
    <div class="title">
        registration form
    </div>
    <form action="/" method="GET">
        <div class="form">
            <div class="inpu_field">
                <label>First Name<span style="color: blue;">*</span></label>
                <input type = "text" class = "input" required>
            </div>
            <div class="inpu_field">
                <label>Last Name<span style="color: blue;">*</span></label>
                <input type = "text" class = "input" required>
            </div>
            <div class="inpu_field">
                <label>Email id<span style="color: blue;">*</span></label>
                <input type = "email" class = "input" required>
            </div>
            <div class="inpu_field">
               <label>Gender<span style="color: blue;">*</span></label>
                
               <div class="custom_select">
                    
               <select>
                        <option vlaue="" disabled>Select</option>
                        <option vlaue="male">Male</option>
                        <option vlaue="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="inpu_field">
                <label>Address<span style="color: blue;">*</span></label>
                <textarea class="textarea" required></textarea>
            </div>
            <div class="inpu_field">
                <label>Contact No<span style="color: blue;">*</span></label>
                <input type = "number" class = "input" required>
            </div>
            
    
            <div class="inpu_field">
                <label>Adhar Number<span style="color: blue;">*</span></label>
                <input type = "number" class = "input" required>
            </div>
            <div class="inpu_field">
                <label>Account Number<span style="color: blue;">*</span></label>
                <input type = "number" class = "input" required>
            </div>
            <div class="inpu_field">
               <label>Account Type<span style="color: blue;">*</span></label>
                <div class="custom_select">
                    <select>
                        <option vlaue="" disabled>Select</option>
                        <option vlaue="savings">Saving</option>
                        <option vlaue="current">Current</option>
                    </select>
                </div>
            </div>
            <div class="inpu_field">
                <label>IFSC code<span style="color: blue;">*</span></label>
                <input type = "number" class = "input" required>
            </div>
            <div class="inpu_field">
               <label>Branches<span style="color: blue;">*</span></label>
                <div class="custom_select">
                    <select>
                        <option vlaue="" disabled>Select</option>
                        <option vlaue="vashi">Vashi</option>
                        <option vlaue="nerul">Nerul</option>
                        <option vlaue="thane">Thane</option>
                        <option vlaue="panvel">Panvel</option>
                        <option vlaue="kharghar">Kharghar</option>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="inpu_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agreed to terms and conditions</p>
                
            </div>
            <div class="inpu_field">
                <input type="submit" value="Register" class="buttons">
            </div>
        </div>
    </div>
    </form>
    

    
<script  src="./Assets/Modules/Scripts/app.js"></script> 


</body>
</html>