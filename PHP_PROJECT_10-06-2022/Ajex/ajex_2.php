<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="Ajex Styling\ajex_2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>

</head>

<body>


    <form id="frm" style="border:1px solid #ccc">
        <div class="container">
            <h1>User Sign Up</h1>
            <hr>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name.." required>

            <label for="mobile">Mobile</label>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile.." required>

            <label for="email"><b>Email</b></label>
            <input type="text" id="email" placeholder="Enter Email" name="email" required>

            <label for="fname">Username</label>
            <input type="text" id="username" name="username" placeholder="Username..">

            <label for="psw"><b>Password</b></label>
            <input type="password" id="password" placeholder="Enter Password" name="password" required><br>
            <!-- <input type="button" name="signupbtn" id="signupbtn" value="Submit" > -->

            <!-- <label>
        Gender
      </label><br>
      <input type="radio" id="male" name="gender" value="male">
      <label for="female">Male</label><br>
      <input type="radio" id="female" name="gender" value="female">
      <label for="female">Female</label><br> -->

            <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

            <div class="clearfix">
                <button type="button" class="signupbtn" name="signupbtn">Submit</button>
                <button type="button" class="cancelbtn">Cancel</button>
                <!-- <input type="submit" name="signupbtn" id="signupbtn" value="Submit"> -->

            </div>
        </div>

    </form>
    <div id="msg"></div>

    <script src="jquery.js"></script>
    <!-- <script>
        $(document).ready(function() {

            $(".cancelbtn").click(function() {
                $(".incliud").hide();
            });
        });
    </script> -->
    <script>
        $(document).ready(function() {
            function load_page() {
                window.location.href = "ajex_2_login.php";
            }
            // $(".signupbtn").click(function() {
            $(".signupbtn").on("click", function(e) {
                e.preventDefault();
                //  $('#msg').html($('#frm').serialize());
                var name = $("#name").val();
                var mobile = $("#mobile").val();
                var email = $("#email").val();
                var username = $("#username").val();
                var password = $("#password").val();
                if (name == "" || mobile == "" || email == "" || username == "" || password == "") {
                    $('#msg').fadeIn();
                    $('#msg').html('All fields are required.');
                } else {
                    $.ajax({
                        url: "ajex_2_insertdata.php",
                        type: "POST",
                        data: $('#frm').serialize(),
                        beforesend: function() {
                            $('#msg').fadeIn("");
                            $('#msg').html('Loading response...');
                        },
                        success: function(data) {
                            load_page()
                            $('#frm').trigger("reset");
                            $('#msg').fadeIn();
                            $('#msg').html(data);
                            setTimeout(function() {
                                $('#msg').fadeOut("slow");
                            }, 4000);

                        }
                    });
                }


            });
        });
    </script>

</body>

</html>