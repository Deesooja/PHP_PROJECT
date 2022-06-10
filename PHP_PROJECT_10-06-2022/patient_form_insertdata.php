<?php
include 'connect.php';
if (isset($_POST["name"])  && isset($_POST["age"]) && isset($_POST["diseases_Reasion"]) && isset($_POST["gender"])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $diseases_Reasion = $_POST['diseases_Reasion'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO patient_table (name,age,gender) VALUES('{$name}','{$age}','{$gender}')";
    $result = $conn->query($sql);
    echo  " {$name}  data Inserted";

    if ($result) {
        // echo  " {$name} data Inserted";
        $sql_1 = "select max(id) from patient_table";
        $result_1 = $conn->query($sql_1);
        $row = $result_1->fetch_assoc();

        //     echo '<pre>';
        //  echo print_r($row["max(id)"]);
        //  echo '</pre>';
        
        if ($row) {
            $id=$row["max(id)"];
            $sql_2 = "INSERT INTO diseases_reason_table (id,diseases_reason) VALUES('{$id}','{$diseases_Reasion}')";
            $result_2 = $conn->query($sql_2);
            if ($result_2) {
                echo  " {$name}  data Inserted";
            } else {
                echo "not Inserted data in  Diseases_reason_table";
            }
        }
        // echo "done";
    } else {
        echo "not inserted";
        // echo "not";
    }
} else {
    echo "Must filled all form fields.";
    // echo $_POST['name'];
    // echo $_POST['mobile'];
    // echo $_POST['email'];
    // echo $_POST['username'];
    // echo $_POST['password'];
}


