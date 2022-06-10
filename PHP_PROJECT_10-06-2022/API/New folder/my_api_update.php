<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include "connect.php";
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$mobile = $data['mobile'];
$email = $data['email'];
$username = $data['username'];
$password = $data['password'];
$sql = "UPDATE user_table SET name = '{$name}', mobile = {$mobile}, email = '{$email}', username = '{$username}', password = '{$password}'WHERE id = {$id}";
$result = $conn->query($sql);
if($result){
    echo json_encode(array('message' => 'Student Record Updated.', 'status' => true));
}else{
    echo json_encode(array('message' => 'Student Record Not Updated.', 'status' => false));
}

?>