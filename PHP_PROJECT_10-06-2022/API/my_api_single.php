<?php 
include "connect_api.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$data= json_decode(file_get_contents("php://input"),true);
$id=$data['sid'];
$sql = "SELECT * FROM students WHERE id = {$id}";
$result=$conn->query($sql);
if($result->num_rows>0){
    $output =$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output, JSON_PRETTY_PRINT);
}else{
    $massage =array('message' => 'No Record Found.', 'status' => false);
    echo json_encode($massage,JSON_PRETTY_PRINT);
}







?>