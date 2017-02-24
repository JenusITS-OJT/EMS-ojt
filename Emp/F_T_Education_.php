<?php
require ("F_Connection.php");

    $msg="";
    $userid = $_GET['userid'];
    $id = $_GET['id'];
    $educ= mysqli_real_escape_string($con, $_GET['educ']);
    $school= mysqli_real_escape_string($con, $_GET['school']);
    $address= mysqli_real_escape_string($con, $_GET['address']);
    $sfromyear= mysqli_real_escape_string($con, $_GET['datepicker']);
    $stoyear= mysqli_real_escape_string($con, $_GET['datepicker1']);

if(empty($id)){

    $msg = "Added";
    $sql="INSERT INTO `emp_educbg`
            (
             `School`,
             `Level_ID`,
             `Address`,
             `From_Year`,
             `To_Year`,
             `Status`,
             `User_ID`)
                VALUES (
                        '$school',
                        '$educ',
                        '$address',
                        '$sfromyear',
                        '$stoyear',
                        1,
                        '$userid'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "";
        $sql="UPDATE `emp_educbg`
                SET
                  `School` = '$school',
                  `Level_ID` = '$educ',
                  `Address` = '$address',
                  `From_Year` = '$sfromyear',
                  `To_Year` = '$stoyear'
                WHERE `User_ID` = '$userid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_Education_.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_Education_.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>