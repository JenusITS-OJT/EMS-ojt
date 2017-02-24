<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id'];
	$userid = $_GET['userid'];
//Delete

if(!empty($id)){
    $msg = "Deleted";
            $sql="DELETE  
            from `emp_familybg` 
            WHERE `id` = '$id'";
        $result = mysqli_query($con, $sql);
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_Family.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_Family.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>