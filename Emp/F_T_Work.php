<?php
require ("F_Connection.php");

    $msg="";
    $userid = $_GET['userid'];
    $id = $_GET['id'];
    $company= mysqli_real_escape_string($con, $_GET['company']);
    $jobtitle= mysqli_real_escape_string($con, $_GET['jobtitle']);
    $wfromyear= mysqli_real_escape_string($con, $_GET['datepicker']);
    $wtoyear= mysqli_real_escape_string($con, $_GET['datepicker1']);

if(empty($id)){

    $msg = "Added";
    $sql="INSERT INTO `emp_workbg`
            (
             `Company_Name`,
             `Job_Title`,
             `From_Year`,
             `To_Year`,
             `Status`,
             `User_ID`)
                VALUES (
                        '$company',
                        '$jobtitle',
                        '$wfromyear',
                        '$wtoyear',
                        1,
                        '$userid'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `emp_workbg`
                SET
                  `Company_Name` = '$company',
                  `Job_Title` = '$jobtitle',
                  `From_Year` = '$wfromyear',
                  `To_Year` = '$wtoyear'
                WHERE `User_ID` = '$userid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_Work.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_Work.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>