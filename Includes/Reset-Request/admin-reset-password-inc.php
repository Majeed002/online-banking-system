<?php

if(isset($_POST["admin-reset-password-submit"])){

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $admin_pwd = $_POST["admin_pwd"];
    $admin_pwd_cnf = $_POST["admin_pwd_cnf"];

    if(empty($admin_pwd) || empty($admin_pwd_cnf)){
        header("Location: ../../admin-reset-password.php?newpwd=empty");
        exit();   
    }
    elseif($admin_pwd > 8){
        header("Location: ../../admin-reset-password.php?newpwd=pwdlength");
        exit();
    }   
    elseif($admin_pwd != $admin_pwd_cnf){
        header("Location: ../../admin-reset-password.php?newpwd=pwdnotsame");
        exit();
    }   

    $currentDate = date("U");

    include '../Database-Connection/db-connection-inc.php';

    $sql = "SELECT * FROM admin_pwdReset WHERE admin_pwdResetSelector=? AND admin_pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an Error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)){
            echo "You need to re-submit your Reset Request.";
            exit();
        } else{
            
            $admin_tokenBin = hex2bin($validator);
            $admin_tokenCheck = password_verify($admin_tokenBin, $row["admin_pwdResetToken"]);
            
            if($admin_tokenCheck === false){
                echo "You need to re-submit your Reset Request.";
                exit();
            } elseif($admin_tokenCheck === true){

                $admin_tokenEmail = $row["admin_pwdResetEmail"];

                $sql = "SELECT * FROM admin_login where admin_email_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "There was an Error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $admin_tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                            echo "There was an Error!";
                            exit();
                        } else{
                            
                            $sql = "UPDATE admin_login SET admin_pwd=? where admin_email_id=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "There was an Error!";
                                exit();
                            } else {
                                $hashed_admin_pwd = PASSWORD_HASH($admin_pwd, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $hashed_admin_pwd, $admin_tokenEmail);
                                mysqli_stmt_execute($stmt);
                                $sql = "DELETE FROM admin_pwdReset WHERE admin_pwdResetEmail=?;";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "There was an Error!";
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($stmt, "s", $admin_tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../../admin-login.php?newpwd=passwordupdated");
                                }
                            }
                        }
            

                }
            }


        }
    }


}
else{
    header("Location: ../../admin-forgot-password.php");
}