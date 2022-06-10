<?php
include "connect.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$mobile = $data['mobile'];
$email = $data['email'];
$username = $data['username'];
$password = $data['password'];

$sql = "INSERT INTO user_table (name,mobile,email,username,password) VALUES('{$name}','{$mobile}','{$email}','{$username}','{$password}')";
$result = $conn->query($sql);

if ($result) {
    echo json_encode(array('message' => 'Student Record Inserted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record Not Inserted.', 'status' => false));
}
