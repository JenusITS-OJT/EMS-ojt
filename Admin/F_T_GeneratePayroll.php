<?php
require ("F_Connection.php");

    $msg="";
    $id = $_GET['id'];
    $from= mysqli_real_escape_string($con, $_GET['datepicker']);
    $to= mysqli_real_escape_string($con, $_GET['datepicker1']);

//Get User_ID, Hourly Rate
$sql = "SELECT `User_id`,
              `Basic_Pay`
              FROM `employee`
              WHERE `JobTitle_ID` != 1
              AND `Basic_Pay` != 0;";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
{

//Compute Total Working Hours
  $User_ID = $row[0];
  settype ( $HourlyRate , float );
  $HourlyRate = ($row[1]*12)/261/8;
  $sql1 = "SELECT `Hours`
                FROM `attendance` 
                WHERE `Emp_ID` = '$User_ID' AND 
                `Date` BETWEEN '$from' AND '$to'
                GROUP BY `Date`
                ;";
          $result1 = mysqli_query($con, $sql1);
          $row1 = mysqli_fetch_array($result1);
          $Hours =  $Hours + $row1[0];

//Compute Days Present
  $sql2 = "SELECT COUNT(`Time_Out`)
                FROM `time` 
                WHERE `User_ID` = '$User_ID' AND 
                `Time_Out` BETWEEN '$from' AND '$to'
                ;";
          $result2 = mysqli_query($con, $sql2);
          $row2 = mysqli_fetch_array($result2);
          $Present =  $row2[0];

//Compute Days Absent
  $sql3 = "SELECT COUNT(`Status`)
                FROM `attendance`
                WHERE `Emp_ID` = '$User_ID' AND 
                `Date` BETWEEN '$from' AND '$to'
                AND `Status` = 1;
                ;";
          $result3 = mysqli_query($con, $sql3);
          $row3 = mysqli_fetch_array($result3);
          $Absent =  $row3[0];

//Compute Night Differential

  $ND = (6*$Present)*($HourlyRate*0.1);

  $msg = "Added";
  $sqll="INSERT INTO `payroll`
            (
             `Date_From`,
             `Date_To`,
             `Total_Working_Hours`,
             `Absences`,
             `Night_Differential`,
             `Tardiness`,
             `Regular_OT_Hours`,
             `Gross_Pay`,
             `Net_Pay`,
             `Deductions`,
             `Emp_ID`)
                VALUES (
                        '$from',
                        '$to',
                        '$Hours',
                        '$Absent',
                        '$ND',
                        '$HourlyRate',
                        '$ND',
                        '$ND',
                        '$ND',
                        '$ND',
                        '$User_ID'
                        );";
        $stm = mysqli_query($con, $sqll);
        myResponse($stm,$msg);
             }




function myResponse($msg){
            if($msg)
            {   
                $msg .= " SUCCESSFULLY!";
                header("Location: T_GeneratePayroll1.php?id=success&msg=$msg");
            }
            else
            {
                $msg .= " FAILED!";
                header("Location: T_GeneratePayroll.php?id=success&msg=$msg");
            }  
}

mysqli_commit($con); 
?>