<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="Styling\index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
<script src="jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#login").click(function() {
                $(".incliud").toggle();
            });
        });

        // $(document).ready(function() {
        //     $("#signup").click(function() {
        //         $(".incliude1").toggle();
        //     });
        // });
    </script>
</head>

<body>

    <div class="topnav">
        <a class="active">Home</a>
        <a id="login">Login</a>
        <a id="signup">SignUp</a>
        <a id="profile">Profile</a>
    </div><br>
    <div class="incliude">
    <?php include 'login.php'; ?>

    </div>
    <div class="inlude1">
    
    <?php include 'signup.php'; ?>

    </div>




</body>

</html>