<?php
session_start();
if (!isset($_SESSION['username'])) {
    if (isset($_REQUEST['login'])) {
        if (isset(($_REQUEST['Username'])) && isset(($_REQUEST['Password']))) {

            // echo $_COOKIE['PHPSESSID'];
            $_SESSION['username'] = $_REQUEST['Username'];
            $_SESSION['Password'] = $_REQUEST['Password'];
            // $_SESSION['username']='Deesooja';
            // $_SESSION['Password']='12345';
            header('location: welcome.php');
        }
    }
}else{
    header('location: welcome.php');

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
        <label for="fname">Username</label>
        <input type="text" name="Username" placeholder="Username.."><br>

        <label for="lname">Password</label>
        <input type="text" name="Password" placeholder="Password.."><br>
        <div class="submit">
            <input type="submit" value="Login" name="login">
        </div>
    </form>
    <?php
    if (isset($_REQUEST['login'])) {

    echo $_SESSION['username'] . "<br>";
    echo $_SESSION['Password'];
    }
    ?>
    

</body>

</html>