<!-- <?php
include 'connect.php';
if (isset($_REQUEST['cancel'])) {
  // header('location: patient_table.php');
  
}

?> -->




<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="Styling\patient_form.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient detail Form</title>

</head>

<body>

  <form style="border:1px solid #ccc" id="patient_form">
    <div class="container">
      <h1>Patient form </h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="Name.." required>

      
      <label for="age"><b>Date Of Birth</b></label>
      <input type="text" placeholder="Age" name="age" id="age" required> <br><br>

      <!-- <label for="fname">Username</label>
      <input type="text" name="Username" placeholder="Username.."> -->

      <label for=">Diseases/Reasion"><b>Diseases/Reasion</b></label>
      <input type="text" placeholder="Diseases/Reasion" name="diseases_Reasion" id="diseases_Reasion" required>

      <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->

      <label>
        Gender
      </label><br>
      <input type="radio" id="gender" name="gender" value="male">
      <label for="female">Male</label><br>
      <input type="radio" id="gender" name="gender" value="female">
      <label for="female">Female</label><br>

      <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

      <div class="clearfix">
        <!-- <button type="button" class="cancelbtn" name="cancel">Cancel</button> -->
        <!-- <input type="submit" value="Cancel" name="cancel" class="cancelbtn">
        <input type="submit" value="ADD Detail" name="add" class="signupbtn"> -->

        <button type="submit" class="signupbtn">ADD Detail</button>
      </div>
    </div>
  </form>
  <div id="msg_loadaria">
   
  </div>
  <script src="jquery.js"></script>
  <script>
    // $(document).ready(function() {
    //   $(".cancelbtn").click(function() {
    //     $(".").load("patient_table.php");
    //   });
    // });

  </script>
  <script>
    $(document).ready(function() {
      function load_page() {
        window.location.href = "patient_table.php";
      }
      // $(".signupbtn").click(function() {
      $(".signupbtn").on("click", function(e) {
        e.preventDefault();
        //  $('#msg').html($('#frm').serialize());
        var name = $("#name").val();
        var age = $("#age").val();
        var diseases_Reasion = $("#diseases_Reasion").val();
        if (name == ""|| age == "" || diseases_Reasion == ""|| !$('input:radio[name=gender]').is(':checked')) {
          $('#msg_loadaria').fadeIn();
          $('#msg_loadaria').html('All fields are required.');
        } else {
          $.ajax({
            url: "patient_form_insertdata.php",
            type: "POST",
            data: $('#patient_form').serialize(),
            beforesend: function() {
              $('#msg_loadaria').fadeIn("");
              $('#msg_loadaria').html('Loading response...');
            },
            success: function(data) {
              console.log(data);
              load_page()
              $('#patient_form').trigger("reset");
              $('#msg_loadaria').fadeIn();
              $('#msg_loadaria').html(data);
              setTimeout(function() {
                $('#msg_loadaria').fadeOut("slow");
              }, 4000);

            }
          });
        }


      });
    });
  </script>

</body>

</html>