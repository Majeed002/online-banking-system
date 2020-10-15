<?php
 $usernameErr = $user_login_pwdErr = $tncErr = "";
 $username = $user_login_pwd = $tnc = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($_POST["username"])){
        $usernameErr = "*Username is required!"; 
    }
    else{
        $username = test_input($_POST["username"]);
    }
    if (empty($_POST["user_login_pwd"])){
        $user_login_pwdErr = "*Password is required!"; 
    }
    else{
        $user_login_pwd = test_input($_POST["user_login_pwd"]);
    }
    if (empty($_POST["tnc"])){
        $tncErr = "*Agree to T&C is required"; 
    }
    else{
        $tnc = test_input($_POST["tnc"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
