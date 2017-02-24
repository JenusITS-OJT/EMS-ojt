<?php
require ("F_Connection.php");

    $msg="";
    $userid = $_GET['userid'];
    $id = $_GET['id'];
//Delete

if(!empty($id)){
    $msg = "Deleted";
        $sql="DELETE 
        from `emp_workbg` 
         WHERE  `id` = '$id'";
        $result = mysqli_query($con, $sql);
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_Work_.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_Work_.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>