<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="Styling\dashbord.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="user_profiel.php">User Profile</a></li>
    <li><a href="patient_table.php">Patient Table</a></li>
    <!-- <li><a href="#about">About</a></li> -->
  </ul>
  <div class="main">
    <h1>Dadhbord</h1>
    <!-- <input type="button" id="user_table" value="User Table"> -->
    <!-- <button id="user_table"> User Table</button> -->
  </div>
  <div id="user_live_search">
    <form id="user_live_searc_form">
      <input type="search" id="user_search" name="user_search">
    </form>
  </div>
  <div>
    <p><B> User Table </B></p>
    <div>
      <table id="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
          </tr>
        </thead>

      </table>

    </div>
    <!-- <table id="table">
      <thead>
        <tr>
          <td>Name</td>
          <td>Mobile</td>
          <td>Email</td>
        </tr>
      </thead>

    </table> -->


  </div>
  <script src="jquery.js"></script>
  <script>
    $(document).ready(function() {
      function load_table_data(page) {
        $.ajax({
          url: "user_table.php",
          type: "POST",
          data: {
            page_no: page
          },
          success: function(data) {
            console.log(data);
            if (data === "No Data") {
              $("#ajaxbtn").html("Finished");
              $("#ajaxbtn").prop("disabled", true);
            } else {
              $("#pagination").remove();
              $("#table").append(data);
            }
          }

        });
      }
      load_table_data();

      $(document).on("click", "#ajaxbtn", function() {
        $("#ajaxbtn").html("loading...");
        var page_id = $(this).data("id");
        // console.log( page_id);
        load_table_data(page_id);
      });

      // ---------LIVE_SEARCH----------
      $("#user_search").on("keyup", function() {

        $.ajax({
          url: "user_live_search.php",
          data: $("#user_live_searc_form").serialize(),
          success: function(data) {
            $("#table").html(data);

          }

        })
      })



    });
  </script>

</body>

</html>