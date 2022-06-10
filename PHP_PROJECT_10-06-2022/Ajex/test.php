<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Ajex Styling\ajex_2.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <p id="msg"></p>
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

            <div class="clearfix">
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>

    </form>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".signupbtn").click(function() {
                var name = $("#name").val();
                var mobile = $("#mobile").val();
                var email = $("#email").val();
                if (name == "" || mobile == "" || email == "") {
                    $('#msg').fadeIn();
                    $('#msg').html('All fields are required.');

                } else {
                    $.ajax({
                        url: "test_insert.php",
                        type: "POST",
                        data: $('#frm').serialize(),
                        beforesend: function() {
                            $('#msg').fadeIn();
                            $('#msg').html('Loading response...');
                        },
                        success: function(data) {
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