<?php
require ("F_Connection.php");

    $msg="";
    
    $id = $_GET['id'];
    $leavename= mysqli_real_escape_string($con, $_GET['leave']);
    $desc= mysqli_real_escape_string($con, $_GET['desc']);
    $type= mysqli_real_escape_string($con, $_GET['type']);
    $status= mysqli_real_escape_string($con, $_GET['status']);

if(empty($id)){
    $sql1 = "SELECT `Leave_Name` from `leave` where `Leave_Name` like '%$leavename%';";
        $result = mysqli_query($con, $sql1);
        $num = mysqli_num_rows($result);
         if($num != 0)
         {
            $msg = "Error";
            echo '<script type="text/javascript">';
            echo 'alert("Input already exists!")';
            echo '</script>';
            header("Location: CM_Leave4.php?id=failed&msg=$msg");
         }
         else
            {
        $msg = "Added";
         $sql="INSERT INTO `leave`
            (
             `Leave_Name`,
             `Description`,
             `Type`,
             `Status`)
                VALUES (
                        '$leavename',
                        '$desc',
                        '$type',
                        '$status'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }
             }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `leave`
                SET
                  `Leave_Name` = '$leavename',
                  `Description` = '$desc',
                  `Type` = '$type',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Leave3.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Leave4.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>