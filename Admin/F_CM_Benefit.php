<?php
require ("_Connection.php");

    $msg="";
    
    $id = $_GET['id'];
    $benefit= mysqli_real_escape_string($con, $_GET['benefit']);
    $desc= mysqli_real_escape_string($con, $_GET['desc']);
    $status= mysqli_real_escape_string($con, $_GET['status']);

if(empty($id)){
    $sql1 = "SELECT `Benefit` from `benefits` where `Benefit` like '%$benefit%';";
        $result = mysqli_query($con, $sql1);
        $num = mysqli_num_rows($result);
         if($num != 0)
         {
            $msg = "Error";
            echo '<script type="text/javascript">';
            echo 'alert("Input already exists!")';
            echo '</script>';
            header("Location: CM_Benefit4.php?id=failed&msg=$msg");
         }
         else
            {
        $msg = "Added";
         $sql="INSERT INTO `benefits`
            (
             `Benefit`,
             `Benefit_Desc`,
             `Status`)
                VALUES (
                        '$benefit',
                        '$desc',
                        '$status'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }
             }

if(!empty($id)){
        $msg = "";
        $sql="UPDATE `benefits`
                SET
                  `Benefits` = '$benefit',
                  `Benefit_Desc` = '$desc',
                  `Status` = '$status'
                WHERE `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: CM_Benefit3.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: CM_Benefit4.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>