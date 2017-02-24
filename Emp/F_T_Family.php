<?php
require ("F_Connection.php");

    $msg="";
    $userid = $_GET['userid'];
    $id = $_GET['id'];
    $famname= mysqli_real_escape_string($con, $_GET['famname']);
    $famoccupation= mysqli_real_escape_string($con, $_GET['famoccupation']);
    $famrelation= mysqli_real_escape_string($con, $_GET['famrelation']);

if(empty($id)){

    $msg = "Added";
    $sql="INSERT INTO `emp_familybg`
            (
             `Name`,
             `Occupation`,
             `Relation`,
             `Status`,
             `User_ID`)
                VALUES (
                        '$famname',
                        '$famoccupation',
                        '$famrelation',
                        1,
                        '$userid'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg);
                 }

if(!empty($id)){
        $msg = "Updated";
        $sql="UPDATE `emp_familybg`
                SET
                  `Name` = '$famname',
                  `Occupation` = '$famoccupation',
                  `Relation` = '$famrelation'
                WHERE `User_ID` = '$userid' && `id` = '$id';";
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg, $userid){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_Family.php?userid=$userid&id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_Family.php?userid=$userid&id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>