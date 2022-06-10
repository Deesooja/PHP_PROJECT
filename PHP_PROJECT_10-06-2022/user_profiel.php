<?php
include 'connect.php';
session_start();
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="Styling\profile.css">
    <link rel="stylesheet" href="Styling\profile_2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>
</head>

<body>

    <head class="head">
        <div class="chip1">
            <div class="chip">
                <img src="images\male.jpg" alt="Person" width="96" height="96">
                <!-- <button name="logout" id="logout">Logout</button> -->
                <?php if (isset($_SESSION['uname'])) {
                    echo $_SESSION['uname'];
                } ?>
            </div>

        </div>

        <div class="logout">
            <form id="logout" method="post">
                <input type="submit" name="logout" value="Logout">
            </form>
        </div>

    </head>

    <h2 style="text-align:center">User Profile</h2>
    <div class="main">
        <div class="card">
            <img src="images\male.jpg" alt="John" style="width:100%" class="image">
            <h1 id="profile_name"></h1>
            <!-- <h1> <?php if (isset($_SESSION['uname'])) {
                        echo $_SESSION['uname'];
                    } ?></h1> -->
            <!-- <p class="title">CEO & Founder, Example</p> -->
            <!-- <p>Harvard University</p> -->
            <!-- <div style="margin: 24px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
            <p><button>Contact</button></p> -->
        </div>
        <div class="right">
            <div class="rightleft">
                <p id="name"> Name:-</p>
                <p id="mobile"> Mobile:-</p>
                <p id="email"> Email:-</p>
                <p id="username"> Username:-</p>
            </div>
            <div class="rightright">
                

            </div>

        </div>
        <div id="out">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $("button").click(function() {
                $("#out").load("demo_test.txt");
            });
        });
        jQuery(document).ready(function() {
            jQuery(".logout").click(function() {
                alert("hello");
                // jQuery(".out").load('logout.php');
            });
        });
    </script> -->

    <!-- <script>
         $(document).ready(function() {
             $.ajax({
                 url: "user_profiel_retrive_data.php",
                 type : "GET",
                 dataType: "JSON",
                 success: function(data){
                         console.log(data);

                    //  $.each(data,function(key,value){
                    //      $(".rightleft").append(value.name);
                    //     $(".rightright").append(value.name +""+ value.mobile +""+ value.email +""+ value.username);
                    //      $("#mobile").append(value.mobile);
                    //      $("#email").append(value.email);
                    //      $("#username").append(value.username);
                    //  })
                 }


             });
         });


    </script> -->
    <script>
        $.getJSON(
            "user_profiel_retrive_data.php",
            function(data){
                // console.log(data);
                $.each(data,function(key,value){
                    // console.log(value.id);
                    
                    $("#profile_name").append(value.name);
                    $("#name").append(value.name);
                    $("#mobile").append(value.mobile);
                    $("#email").append(value.email);
                    $("#username").append(value.username);

                })

            }
        )
    </script>


</body>

</html>