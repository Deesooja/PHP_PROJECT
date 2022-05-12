<?php
include 'include.php';


if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['fistname'] == "") || ($_REQUEST['lastname'] == "") || ($_REQUEST['username'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['mobile'] == "") || ($_REQUEST['password'] == "")) {
        echo "Fill the all fieled <hr> <br>";
    } else {
        $fistname = $_REQUEST['fistname'];
        $lastname = $_REQUEST['lastname'];
        $username = $_REQUEST['username'];
        if ($_REQUEST['email']) {
            $email = $_REQUEST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email1 = $email;
            } else {
                echo "invailed email";
            }
        }

        if ($_REQUEST['mobile']) {
            $mobile = $_REQUEST['mobile'];
            if (filter_var($mobile, FILTER_VALIDATE_INT)) {
                if (strlen($mobile) == 10) {
                    $mobile1 = $mobile;
                }
            } else {
                echo "inviled mobile number ";
            }
        }

        $password = $_REQUEST['password'];
        $cpassword = $_REQUEST['cpassword'];
        if ($password == $password) {
            // $password = $_POST['password'];
            $number = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if (strlen($password) < 8 && $number && $uppercase && $lowercase && $specialChars) {
            // if (strlen($password) < 8 && $number && $uppercase ) {
                $password1 = $password;
                $pass = password_hash($password1, PASSWORD_DEFAULT);
            } else {
                echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character";
            }
        }


        if (isset($email1) && isset($mobile1) && isset($pass)) {
            $sql = "INSERT INTO signup1(fist_name,last_name,username,email_address,mobile,password) VALUES(' $fistname','$lastname', '$username', '$email1', '$mobile', '$pass')";
            $result = $conn->query($sql);
            if ($result) {
                header("location:login.php");
                // echo "Data inserted <br>";
            }
        } else {
            if (!isset($mobile1)) {
                echo "invailed mobile No.<br>";

            }else {
                // echo "invailed mobile No.";

            }

            echo "fill the Currect information";

        }
    }
}



?>







<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Signup Form</h3><br>
    <form action="" method="post" class="signupmain">
        <label for="fistname"> Fist Name</label>
        <input type="text" name="fistname"><br>

        <label for="lastname"> FLast Name</label>
        <input type="text" name="lastname"><br>

        <label for="username"> Username</label>
        <input type="text" name="username"><br>

        <label for="email">Email Address</label>
        <input type="email" name="email"><br>

        <label for="mobile">Mobile Number</label>
        <input type="number" name="mobile"><br>
        <label for="password">Password</label>
        <input type="text" name="password" id=""><br>

        <label for="password">Conform Password</label>
        <input type="text" name="cpassword" id=""><br>


        <input type="submit" name="submit" value="Signup">


    </form>
</body>

</html>