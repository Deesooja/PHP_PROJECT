<?php
// setcookie("username", "Deesooja", time()+60*60*60*24); 
// setcookie("username", "kumar", time()+60*60*60*24); 
// echo $_COOKIE['username'];
// setcookie("username", "kumar", time()-60*60*60*24);
$cookie_name = "login";
if(isset($_REQUEST['login'])){ 
$cookie_value = $_REQUEST['Username'];
$cookie_value .= " ";
$cookie_value .= $_REQUEST['Password'];
setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 60 * 24);

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
      
          if(isset($_COOKIE[$cookie_name])){
              echo "Cookie".$_COOKIE[$cookie_name];
          }else{
              echo "Cookie is not set";
          }
      
    ?>
</body>

</html>