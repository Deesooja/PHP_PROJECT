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
            $(".incliud").hide();
            $(".incliud1").hide();

            $("#signup").click(function() {
                $(".incliud").show();
            });

            $("#login").click(function() {
                $(".incliud1").show();
            });

        });

        // $(document).ready(function() {
        //     $("#signup").click(function() {
        //         $(".incliud").show();
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
    </div>
    <div class="incliud1">
        <?php include 'login.php'; ?>
    </div>

    <div class="incliud">
        <?php include 'signup.php'; ?>
    </div>


</body>

</html>