<?php

if(isset($_POST["customer-reset-password-submit"])){

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $cust_pwd = $_POST["cust_pwd"];
    $cust_pwd_cnf = $_POST["cust_pwd_cnf"];

    if(empty($cust_pwd) || empty($cust_pwd_cnf)){
        header("Location: ../../customer-reset-password.php?selector=".$selector."&validator=".$validator."&newpwd=empty");
        exit();   
    }
    elseif($cust_pwd > 8){
        header("Location: ../../customer-reset-password.php?selector=".$selector."&validator=".$validator."&newpwd=pwdlength");
        exit();
    }   
    elseif($cust_pwd != $cust_pwd_cnf){
        header("Location: ../../customer-reset-password.php?selector=".$selector."&validator=".$validator."&newpwd=pwdnotsame");
        exit();
    }   

    $currentDate = date("U");

    include '../Database-Connection/db-connection-inc.php';

    $sql = "SELECT * FROM customer_pwdReset WHERE customer_pwdResetSelector=? AND customer_pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an Error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)){
            echo "You need to re-submit your Reset Request." . $conn->error ;
            exit();
        } else{
            
            $customer_tokenBin = hex2bin($validator);
            $customer_tokenCheck = password_verify($customer_tokenBin, $row["customer_pwdResetToken"]);
            
            if($customer_tokenCheck === false){
                echo "You need to re-submit your Reset Request." . $conn->error ;
                exit();
            } elseif($customer_tokenCheck === true){

                $customer_tokenEmail = $row["cust_pwdResetEmail"];

                $sql = "SELECT * FROM customer_details where cust_email_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "There was an Error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $customer_tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                            echo "There was an Error!";
                            exit();
                        } else{
                            
                            $sql = "UPDATE customer_details SET cust_pwd=? where cust_email_id=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "There was an Error!";
                                exit();
                            } else {
                                $hashed_cust_pwd = PASSWORD_HASH($cust_pwd, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $hashed_cust_pwd, $customer_tokenEmail);
                                mysqli_stmt_execute($stmt);
                                $sql = "DELETE FROM customer_pwdReset WHERE cust_pwdResetEmail=?;";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "There was an Error!";
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($stmt, "s", $customer_tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../../user-login.php?newpwd=passwordupdated");
                                }
                            }
                        }
            

                }
            }


        }
    }


}
else{
    header("Location: ../../user-login.php");
}