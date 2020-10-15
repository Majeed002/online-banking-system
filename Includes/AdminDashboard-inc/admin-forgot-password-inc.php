<?php
 $admin_mailErr = "";
 $admin_mail = "";
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
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
