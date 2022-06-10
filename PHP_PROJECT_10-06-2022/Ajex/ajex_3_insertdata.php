<?php
include 'connect.php';
if (isset($_POST["name"]) && isset($_POST["mobile"])  && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO user_table (name,mobile,email,username,password) VALUES('{$name}','{$mobile}','{$email}','{$username}','{$password}')";
    $result = $conn->query($sql);
    if ($result) {
        echo  "Hello {$name} your data Inserted";
        // echo "done";
    } else {
        echo "not inserted";
        // echo "not";
    }
}else{
    echo "Must filled all form fields.";
    echo $_POST['name'];
    echo $_POST['mobile'];
    echo $_POST['email'];
    echo $_POST['username'];
    echo $_POST['password'];
}



// if (($_REQUEST['user_name'] == "") || ($_REQUEST['user_mobile'] == "") || ($_REQUEST['user_email'] == "") || ($_REQUEST['user_username'] == "") || ($_REQUEST['user_password'] == "")) {
//     echo "Fill the all fieled <hr> <br>";
// } else {
//     if (($_REQUEST['user_name'] == "")|| ($_REQUEST['user_password'] == "")) {
//         echo "Fill the all fieled <hr> <br>";
//     } else {
   
// }
