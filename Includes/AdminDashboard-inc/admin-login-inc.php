<?php
 $admin_mailErr = $admin_login_pwdErr = "";
 $admin_mail = $admin_login_pwd = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($_POST["admin_mail"])){
        $admin_mailErr = "*Email is required!"; 
    }
    else{
        $admin_mail = test_input($_POST["admin_mail"]);
        if (!filter_var($admin_mail, FILTER_VALIDATE_EMAIL)) {  
            $admin_mailErr = "*Invalid email format";  
        }  
    }
    if (empty($_POST["admin_login_pwd"])){
        $admin_login_pwdErr = "*Password is required!"; 
    }
    else{
        $admin_login_pwd = test_input($_POST["admin_login_pwd"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
