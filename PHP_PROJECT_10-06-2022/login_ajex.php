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
// include 'connect.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user_table where username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // $row=$result->fetch_all( MYSQLI_ASSOC);
    // $_SESSION['name']= $row['name'];
    $_SESSION['uname']= $_POST['username'];
    $_SESSION['password']= $_POST['password'];
    echo "loggedIn";
} else {
    echo "Not loggedIn";
}
