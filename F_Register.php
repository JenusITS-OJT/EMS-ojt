<?php
require ("F_Connection.php");

    $msg="";
    // $id = mysqli_real_escape_string($con, $_POST['id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $mobileno = mysqli_real_escape_string($con, $_POST['mobileno']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = (mysqli_real_escape_string($con, $_POST['pass']));
    $repassword = (mysqli_real_escape_string($con, $_POST['repass']));

    if ($_POST['pass']!= $_POST['repass'])
 {
     echo("Oops! Password did not match! Try again. ");
 }

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
            header("Location: S_Register_Error.php");
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
                `Password`)
                VALUES (
                '$firstname',
                '$lastname',
                '$mobileno',
                '$email',
                '$string')";
            $stm = mysqli_query($con, $sql);
            myResponse($stm,$msg);
            }
        }
    else{
        $msg = "MismatchPassword";
        header("Location: S_Register_PassError.php");
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
                header("Location: S_Register_Success.php");
                startSession($name, $userid);
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: S_Register_Error.php");
            }  
}

mysqli_commit($con); 
?>