<?php
    require('F_Connection.php');

    $msg="";
    
    $empid= mysqli_real_escape_string($con, $_GET['empid']);
    $datepicker= mysqli_real_escape_string($con, $_GET['datepicker2']);
    $timein= mysqli_real_escape_string($con, $_GET['timein']);
    $timeout= mysqli_real_escape_string($con, $_GET['timeout']);

if(empty($id)){
        $msg = "Added";
         $sql="INSERT INTO `schedule`
            (
             `Date`,
             `Starting_Time`,
             `Time_Out`,
             `Status`,
             `Emp_ID`)
                VALUES (
                        '$datepicker',
                        '$timein',
                        '$timeout',
                        1,
                        '$empid'
                        );";
        $stm = mysqli_query($con, $sql);
        myResponse($stm,$msg, $datepicker);
                 }

function myResponse($stm, $msg, $datepicker){
            if($stm)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_SetSchedule3.php?id=success&msg=$msg&datepicker=$datepicker");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_SetSchedule4.php?id=failed&msg=$msg&datepicker=$datepicker");
            }  
}

mysqli_commit($con); 
?>