<?php

if (isset($_POST["admin-reset-request-submit"])){

    $selector = bin2hex(random_bytes(8));
    $admin_token = random_bytes(32);

    $url = "localhost/online-banking-system/admin-reset-password.php?selector=" . $selector . "&validator=" . bin2hex($admin_token);

    $admin_expires = date("U") + 300; 

    include '../Database-Connection/db-connection-inc.php';

    $admin_email_id = $_POST["admin_email_id"];
    //Delete the previous token if exists
    $sql = "DELETE FROM admin_pwdReset WHERE admin_pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an Error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $admin_email_id);
        mysqli_stmt_execute($stmt);
    }
    //Insert
    $sql = "INSERT INTO admin_pwdReset (admin_pwdResetEmail, admin_pwdResetSelector, admin_pwdResetToken, admin_pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an Error!";
        exit();
    } else {
        $admin_hashedToken = password_hash($admin_token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $admin_email_id, $selector, $admin_hashedToken, $admin_expires);
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


    $mail->addAddress($admin_email_id);

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Reset your Password for URBAN BANKt';
    $mail->Body    = '<p> We recieved a password reset request. The link to reset your password is below. If you did not made nay requst then just ignore this email</p>';
    $mail->Body    .= '<p> Here is your password reset link: <br>';
    $mail->Body    .= '<a href="' .$url. '">' . $url . '</a></p>';


    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
    /*$to = $admin_email_id;

    $subject = 'Reset your Password for URBAN BANK';

    $message = '<p> We recieved a password reset request. The link to reset your password is below. If you did not made nay requst then just ignore this email</p>';
    
    $message .= '<p> Here is your password reset link: <br>';
    $message .= '<a href="' .$url. '">' . $url . '</a></p>';

    $headers = "From: URBAN BANK <urban.contact.us@gmail.com>\r\n";
    $headers .= "Reply-To: urban.contact.us@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";
    
    mail($to, $subject, $message, $headers);
*/
    header("Location: ../../admin-forgot-password.php?reset=success");

}
else{
    header("Location: ../../admin-forgot-password.php");
}