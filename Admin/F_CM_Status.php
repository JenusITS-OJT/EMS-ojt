<?php
require ("_Connection.php");

    $msg="";
    $id = $_GET['id'];
    $statusname = mysqli_real_escape_string($con, $_GET['statusname']);
//Add

if(empty($id)){
    $msg = "Added";
    $sql="INSERT INTO `status`
            (
             `Status_Name`)
                VALUES (
                        '$statusname'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `status`
                SET 
                  `Status_Name` = '$statusname'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Status.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Status.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>