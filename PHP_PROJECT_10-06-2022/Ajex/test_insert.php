<?php
include 'connect.php';
if(isset($_POST["name"]) && isset($_POST["mobile"]) && isset($_POST["email"]) ){
    $name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
    $sql = "INSERT INTO test_insert (name,mobile,email) VALUES('{$name}','{$mobile}','{$email}')";
    if($conn->query($sql)){
        echo "Hello {$name} your record is saved.";
    }else{
        echo "Can't save form data.";
    }

}else{
    echo "Must filled all form fields.";
}


?>