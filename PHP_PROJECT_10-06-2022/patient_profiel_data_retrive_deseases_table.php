<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "student";
$conn  = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed");
}
// echo "Connection Successfull <hr>";
session_start();
$id=$_SESSION['id'];
// echo $id;
$output="";

$sql = "SELECT * FROM diseases_reason_table where id=$id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row=$result->fetch_all( MYSQLI_ASSOC);
// $row=$result->fetch_assoc();
//    echo "<pre>";
//    echo print_r($row);
//    echo "</pre>"; 
// echo "Hello";

// $output .="<ul>";


foreach ($row as $value) {
    $output .= "<li> {$value['diseases_reason']} </li>";

}
// $output .="</ul>";
echo $output;
   
} else {
    echo "Not loggedIn";
}
