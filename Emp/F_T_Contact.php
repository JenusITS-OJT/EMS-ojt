<?php
require ("_Connection.php");

    $msg="";
    $userid = $_GET['userid'];
    $id = $_GET['id'];
    $contactname= mysqli_real_escape_string($con, $_GET['contactname']);
    $address= mysqli_real_escape_string($con, $_GET['address']);
    $contactno= mysqli_real_escape_string($con, $_GET['contactno']);
    $relation= mysqli_real_escape_string($con, $_GET['relation']);

if(empty($id)){

    $msg = "Added";
    $sql="INSERT INTO `emp_emergency`
            (
             `Contact_Person`,
             `Contact_No`,
             `Address`,
             `Relation`,
             `Status`,
             `User_ID`)
                VALUES (
                        '$contactname',
                        '$contactno',
                        '$address',
                        '$relation',
                        1,
                        '$userid'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `emp_emergency`
                SET
                  `Contact_Person` = '$contactname',
                  `Contact_No` = '$contactno',
                  `Address` = '$address',
                  `Relation` = '$relation'
                WHERE `User_ID` = '$userid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_Contact.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_Contact.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>