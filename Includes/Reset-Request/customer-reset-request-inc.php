<?php

if (isset($_POST["send-pwd-link-submit"])){

    $selector = bin2hex(random_bytes(8));
    $customer_token = random_bytes(32);

    $url = "localhost/online-banking-system/customer-reset-password.php?selector=" . $selector . "&validator=" . bin2hex($customer_token);

    $customer_expires = date("U") + 300; 

    include '../Database-Connection/db-connection-inc.php'; 

    $cust_email_id = $_POST["cust_email_id"];
    //Delete the previous token if exists
    $sql = "DELETE FROM customer_pwdReset WHERE cust_pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an Error!" . $conn->error ;
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $cust_email_id);
        mysqli_stmt_execute($stmt);
    }
    //Insert
    $sql = "INSERT INTO customer_pwdReset (cust_pwdResetEmail, customer_pwdResetSelector, customer_pwdResetToken, customer_pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an Error!" . $conn->error ;
        exit();
    } else {
        $customer_hashedToken = password_hash($customer_token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $cust_email_id, $selector, $customer_hashedToken, $customer_expires);
        mysqli_stmt_execute($stmt);
    }
        
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    require '../PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 2;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'urban.contact.us@gmail.com';                 // SMTP username
    $mail->Password = 'Password@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to


    $mail->addAddress($cust_email_id);

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Set your Password for URBAN BANK';
    $mail->Body    = '<p> You have been successfully registred on URBAN BANK</p>';
    $mail->Body    .= '<p> Here is your password reset link: <br>';
    $mail->Body    .= '<a href="' .$url. '">' . $url . '</a></p>';


    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
    /*$to = $cust_email_id;

    $subject = 'Reset your Password for URBAN BANK';

    $message = '<p> We recieved a password reset request. The link to reset your password is below. If you did not made nay requst then just ignore this email</p>';
    
    $message .= '<p> Here is your password reset link: <br>';
    $message .= '<a href="' .$url. '">' . $url . '</a></p>';

    $headers = "From: URBAN BANK <urban.contact.us@gmail.com>\r\n";
    $headers .= "Reply-To: urban.contact.us@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";
    
    mail($to, $subject, $message, $headers);
*/
    header("Location: ../../forgot-password.php?reset=success");

}
else{
    header("Location: ../../forgot-password.php");
}