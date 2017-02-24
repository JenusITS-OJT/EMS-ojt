<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id'];
    $educationallevel = mysqli_real_escape_string($con, $_GET['educationallevel']);
    $status = mysqli_real_escape_string($con, $_GET['status']);
//Add

if(empty($id)){
    $msg = "Added";
    $sql="INSERT INTO `educational_level`
            (
             `Educational_Level_Name`,
             `Status`)
                VALUES (
                        '$educationallevel',
                        '$status'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `educational_level`
                SET 
                  `Educational_Level_Name` = '$educationallevel',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_EducationLevel.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_EducationLevel.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>