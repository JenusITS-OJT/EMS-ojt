<?php
require ("_Connection.php");

    $msg="";
    // $id = mysqli_real_escape_string($con, $_POST['id']);
    $firstname = 'Louie';
    $lastname = 'Sjuana';
    $mobileno = '639232185925';
    $email = 'sample@yahoo.com';
    $password = 'password123';
    $repassword = 'password123';

//Add&Trappings

    $key = md5('australia');

    $salt = md5('australia');

    $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $password, MCRYPT_MODE_ECB)));

if(empty($id)){
    if ($password == $repassword){
        $result = mysqli_query($con, "SELECT * FROM employee 
            WHERE last_name = '$lastname' and First_Name = '$firstname'");
        $yes = mysqli_num_rows($result);
        if($yes >= 1){
            $msg = "AccountAlreadyExists";
            header("Location: Register_Error.php");
            }
        else{         
            echo '<script type="text/javascript">';
            echo 'alert("Successfully Saved!")';
            echo '</script>';       
            $msg = "Added";
            $sql="INSERT INTO `employee`
               (
                `First_Name`,
                `Last_Name`,
                `Contact_No`,
                `Email`,
                `Password`,
                `JobTitle_ID`)
                VALUES (
                '$firstname',
                '$lastname',
                '$mobileno',
                '$email',
                '$string',
                7);";
            $stm = mysqli_query($con, $sql);
            myResponse($stm,$msg);
            }
        }
    else{
        $msg = "MismatchPassword";
        header("Location: Register_PassError.php");
        }
    }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `employee`
                SET 
                  `First_Name` = '$firstname',
                  `Last_Name` = '$lastname',
                  `Contact_No` = '$mobileno',
                  `Email` = '$email',
                  `Password` = '$password'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: Register_Success.php");
                startSession($name, $userid);
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: Register_Error.php");
            }  
}

mysqli_commit($con); 
?>