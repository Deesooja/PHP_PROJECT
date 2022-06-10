<?php
// include 'connect.php';

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
if (isset($_SESSION['uname'])) {
    if (!headers_sent()) {
        header('location: profile.php');
    } else {
        echo "<script> window.location = 'profile.php' </script>";
    }


    // echo ("<script>location.href='$yourURL'</script>");







    // if (isset($_REQUEST['login'])) {

    //     if (($_REQUEST['Username'] == "") || ($_REQUEST['Password'] == "")) {
    //         echo "Fill the all fieled <hr> <br>";
    //     } else {
    //         $username = $_REQUEST['Username'];
    //         $password = $_REQUEST['Password'];
    //         $sql = "SELECT * FROM login1 WHERE username='$username' AND password= '$password' ";
    //         $result = $conn->query($sql);
    //         $row =  $result->fetch_assoc();
    //         if (isset($row['username']) && isset($row['password'])) {
    //             //    echo "<pre>";
    //             //     echo print($row['username']);
    //             //     echo print($row['password']);
    //             //     echo "</pre>";
    //             $_SESSION['uname'] = $username;
    //             header('location: dashbord.php');
    //         } else {
    //             header('location: signup.php');
    //         }
    //     }
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="Styling\login_style.css" type='text/css' />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

</head>

<body>

    <h3> User Login </h3>

    <form id="login_frm" method="post">
        <div class="main">

            <label for="fname">Username</label>
            <input type="text" name="username" placeholder="Username.."><br>

            <label for="lname">Password</label>
            <input type="text" name="password" placeholder="Password.."><br>
            <div class="submit">
                <!-- <input type="submit" value="Login" name="login"> -->
                <button type="button" name="login" class="login">Login</button>
                <button type="button" name="Cencel" class="cencel">Cencel</button>
                <!-- <input type="submit" value="Cencel" name="Cencel" class="cencel"> -->

            </div>
        </div>
    </form>
    <script src="jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="login_validate.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".cencel").click(function() {
                jQuery(".incliud1").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".login").on("click", function(e) {
                function load_page() {
                    window.location.href = "dashbord.php";
                }
                $.ajax({
                    url: "login_ajex.php",
                    type: "POST",
                    data: $('#login_frm').serialize(),
                    success: function(data) {
                        // alert(data);
                        if (data == "loggedIn") {
                            load_page();
                        } else {
                            alert(data);
                        }
                    }

                });
            });

        });
    </script>

</body>

</html>