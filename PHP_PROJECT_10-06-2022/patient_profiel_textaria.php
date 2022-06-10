<?php
include 'connect.php';
session_start();
$_POST["id"] = $_SESSION['id'];
$diseases="";
$id="";

if (isset($_POST["testaria"])  && isset($_POST["id"])) {
    $diseases = $_POST["testaria"];
    $id = $_POST["id"];

    $sql = "INSERT INTO diseases_reason_table (id,diseases_reason) VALUES( '{$id}','{$diseases}') ";
    $result = $conn->query($sql);
    if($result){
        echo "data_Inserted";
    } else{
        echo  " data NOT Inserted";
    }
    
} else {
    echo "Must filled all form fields.";
    echo $_POST["id"];
    echo $_POST["testaria"];
    // echo $_POST['email'];
    // echo $_POST['username'];
    // echo $_POST['password'];
}
