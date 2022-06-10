<?php

// $conn = mysqli_connect("localhost", "root", "", "student");
include 'connect.php';

if(isset($_POST["fullname"]) && isset($_POST["age"]) && isset($_POST["gender"]) && isset($_POST["country"])){

	$name = $_POST['fullname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];

	$sql = "INSERT INTO test_2 (name, age, gender, country) VALUES ('{$name}', '{$age}', '{$gender}', '{$country}')";

	// if(mysqli_query($conn, $sql)){
        $result = $conn->query($sql);
	if($result){

		echo "Hello {$name} your record is saved.";
	}else{
		echo "Can't save form data.";
	}

}else{
	echo "Must filled all form fields.";
    // echo  $_POST['fullname'];
    // echo  $_POST['age'];
    // echo  $_POST['gender'];
    // echo  $_POST['country'];


}

?>
