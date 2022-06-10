<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "student";
$conn  = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed");
}
$sql = "DELETE FROM user_table WHERE id = '42' ";
$result = $conn->query($sql);
echo '<pre>';
echo print_r($result);
echo '</pre> <br> ';
echo "<br>";

echo $result;
echo "<br>";
echo var_dump($result);
// echo json_encode($result, JSON_PRETTY_PRINT);


if($result){
    echo "delete";

}else{
    echo "not deleted";
}
