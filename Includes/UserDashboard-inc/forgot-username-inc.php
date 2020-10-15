<?php
$user_mail = "";
$user_mailErr = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($_POST["user_mail"])){
        $user_mailErr = "*Email is required!"; 
    }
    else{
        $user_mail = test_input($_POST["user_mail"]);
        if (!filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {  
            $user_mailErr = "*Invalid email format";  
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