<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="jq.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JQ</title>
    <body>
    <form id="sform">
        <div class="main">

            <label for="fname">Username</label>
            <input id="name" type="text" name="Username" placeholder="Username.." required><br>

            <label for="lname">Password</label>
            <input id="pass" type="text" name="Password" placeholder="Password.." required><br>
            <div class="submit">
                <input type="submit" value="Login" name="login" id="submit">
                <button type="button" name="Cencel" class="cencel">Cencel</button>
                <!-- <input type="submit" value="Cencel" name="Cencel" class="cencel"> -->

            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script>
        // $(document).ready(function() {
        //     $('#sform').submit(function() {
        //         var name = $("#name").val();
        //         var pass = $("#pass").val();
        //        alert(name + pass);
        //     })
        // });
        $(document).ready(function() {
                $("#name").val("Deesooja");
                $("#pass").val("asw123");
            })
      
    </script>

    </body>

</html>