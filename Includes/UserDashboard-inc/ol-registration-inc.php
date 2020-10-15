<?php
$account_no = $aadhaar_no = $dob = $tnc ="";
$account_noErr = $aadhaar_noErr = $dobErr = $tncErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["account_no"])){
        $account_noErr = "*Account no. is required!"; 
    }
    else{
        $account_no = test_input($_POST["account_no"]);
        //Numeric Value only
        if (!preg_match ("/^[0-9]*$/", $account_no) ) {  
            $account_noErr = "*Account number must be in numeric form";  
        } 
        //Length of the Account Number
        else if (strlen ($account_no) != 7) {  
            $account_noErr = "*Account no must contain 7 digits.";  
        } 
    }

    if (empty($_POST["aadhaar_no"])){
        $aadhaar_noErr = "*Aadhaar no. is required!"; 
    }
    else{
        $aadhaar_no = test_input($_POST["aadhaar_no"]);
        if (!preg_match ("/^[0-9]*$/", $aadhaar_no) ) {  
            $aadhaar_noErr = "*Aadhaar number must be in numeric form";  
        } 
        else if (strlen ($aadhaar_no) != 12) {  
            $aadhaar_noErr = "*Aadhaar no must contain 12 digits.";  
        }
    }
    /*
    if (empty($_POST["dob"])){
        $dobErr = "*Date of Birth is required!"; 
    }
    else{
        $dob = test_input($_POST["dob"]);
    }
    */
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