<?php
require ("F_Connection.php");

    $msg="";
    $userid = $_GET['User_ID'];
    $id = $_GET['id'];

//Delete

if(!empty($id)){
    $msg = "Deleted";
        $sql="DELETE 
        from `emp_educbg` 
         WHERE  `id` = '$id'";
        $result = mysqli_query($con, $sql);
        $stm = mysqli_query($con, $sql);
        myResponse($stm, $msg);
    }

function myResponse($stm, $msg){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_Education.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_Education.php?id=failed&msg=$msg");
            }  
}

mysqli_commit($con); 
?>