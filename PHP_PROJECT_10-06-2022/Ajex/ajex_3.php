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
    <div id="msg">

    </div>

    <form id="frm" style="border:1px solid #ccc">
        <div class="container">
            <h1>User Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
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
            <input type="password" placeholder="Enter Password" id="password" name="password" required>


            <!-- <label>
        Gender
      </label><br>
      <input type="radio" id="male" name="gender" value="male">
      <label for="female">Male</label><br>
      <input type="radio" id="female" name="gender" value="female">
      <label for="female">Female</label><br> -->

            <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <!-- <input type="submit" value="submit" class="signupbtn"> -->
                <button type="button" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function() {

            $(".cancelbtn").click(function() {
                
                $(".incliud").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".signupbtn").click(function(e) {
               
                var name = $("#name").val();
                var mobile = $("#mobile").val();
                var email = $("#email").val();
                var username = $("#username").val();
                var password = $("#password").val();

                $.ajax({
                    url: "ajex_3_insertdata.php",
                    type: "POST",
                    data: $("#frm").serialize(),
                    beforesend: function() {
                        $('#msg').fadeIn("");
                        $('#msg').html('Loading response...');
                    },
                    success: function(data) {
                        // load_page()
                        $('#frm').trigger("reset");
                        $('#msg').fadeIn();
                        $('#msg').html(data);
                        setTimeout(function() {
                            $('#msg').fadeOut("slow");
                        }, 4000);

                    }

                });

            })
        })
    </script>

</body>

</html>