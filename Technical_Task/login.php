<?php
include 'include.php';
if(isset($_REQUEST['login'])){
    if (($_REQUEST['username'] == "") || ($_REQUEST['password'] == "")){
        echo "Fill the all fieled <hr> <br>";

    }else{
        $username = $_REQUEST['username'];
        // $username1 = stripcslashes($username);
        // mysqli_real_escape_string();
        $username1 =  $conn->real_escape_string($username);


        if($_REQUEST['password']){
            $password = $_REQUEST['password'];
        $password1 =  $conn->real_escape_string($password);
        $pass = password_hash($password1, PASSWORD_DEFAULT);
        }

         $sql ="SELECT * FROM signup1 WHERE username='$username1' AND password= '$pass' " ;
         $result = $conn->query($sql);
         if($result){
            header("location:student.php");
            //  echo "Logged in";
         }


    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <label for="username"> Username</label>
        <input type="text" name="username"><br>

        <label for="password">Password</label>
        <input type="text" name="password" id=""><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>