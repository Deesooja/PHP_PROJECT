<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
 include "connect_api.php";
 $sql= "SELECT * FROM students";
 $result=$conn->query($sql);
 if($result->num_rows>0){
    $output =$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output, JSON_PRETTY_PRINT);

 }else{
    echo json_encode(array('message' => 'No Record Found.', 'status' => false), JSON_PRETTY_PRINT);
 }

?>
