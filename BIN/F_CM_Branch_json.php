<?php
require ("_Connection.php");

 $id = mysqli_real_escape_string($con, $_POST['id']);

 if(!empty($id)){
        $sql="SELECT b.`ID`,
                     b.`Address`, 
                     b.`Contact_No`, 
                     b.`Email`, 
                     b.`Date_Established`, 
                     s.`Status_Name`
              FROM `branch` AS b
              INNER JOIN `status` AS s
              ON s.`ID` = b.`Status`
              where b.`ID` = $id;";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($result)){
        $val = array(
        'id'=>$row[0],
        'Address'=>$row[1],
        'Contact_No'=>$row[2],
        'Email'=>$row[3],
        'Date_Established'=>$row[4]);
        'Status_Name'=>$row[5]);
        header('Content-type: application/json');
        die(json_encode($val));
    }
}
mysqli_commit($con); 
?>