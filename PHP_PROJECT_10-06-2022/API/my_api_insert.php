<?php
include "connect_api.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];


$sql = "INSERT INTO students (student_name,age,city) VALUES('{$name}','{$age}','{$city}')";
$result = $conn->query($sql);

if ($result) {
    echo json_encode(array('message' => 'Student Record Inserted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record Not Inserted.', 'status' => false));
}
?>
