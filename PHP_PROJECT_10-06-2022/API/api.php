<!-- <?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "student";
$conn  = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed");
}
// echo "Connection Successfull <hr>";

$sql = "SELECT * FROM user_table";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output =$result-> fetch_all(MYSQLI_ASSOC);
    $json_data=json_encode($output,JSON_PRETTY_PRINT);
    
    $fiel_name= "my-".date("d-m-y").".json";
    if(file_put_contents('My_json/{$fiel_name}',$json_data )){
        echo $fiel_name. "File created.";
    }else{
        echo "not Inserted";
    }
    
}else{
    echo "data not retrive";
}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" id="form" action="form_data.php">
        <input type="text" name="name" id="" placeholder="name">
        <input type="text" name="age" id=""  placeholder="age">
        <input type="text" name="city" id=""  placeholder="city">
        <input type="submit">
    </form>
    
</body>
</html>