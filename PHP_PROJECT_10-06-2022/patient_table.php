<?php
session_start();
if (isset($_REQUEST['patient_view'])) {
  $_SESSION['id'] = $_REQUEST['view'];
  echo '<script>window.location.href = "patient_profiel.php";</script>';
}

if (isset($_REQUEST['add_patient'])) {
  echo '<script>window.location.href = "patient_form.php"</script>';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="Styling\patient_table.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1> Patient table</h1>
  <div class="add_patient">
    <form action="" class="add_patient_form" method="post">
      <!-- <input type="submit" name=" add_patient" value="Add" class="patient_add_submit"> -->
      <input type="hidden" name="patient_hidden" value="idofrow" class="patient_add_submit">
      <input type="submit" name=" add_patient" value="Add" class="patient_add_submit">
    </form>
    <div id="user_live_search">
    <form id="patient_live_search_form" >
      <input type="search" id="patient_search" name="patient_search" placeholder="Search Here">
    </form>
  </div><br>

  </div>
  <table id="patient_table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Deatail</th>
      </tr>
    </thead>
    <!-- <tbody>
            <tr>
                <td>1</td>
                <td>Deesooja</td>
                <td>05/05/1998</td>
                <td>male</td>
                <td>Fevar</td>
                <td><form method="POST">
                        <input  type="hidden" name="view" value="1">
                <input type="submit" name=" patient_view" value="View" class="patient_view_submit">
                </form></td>

            </tr>
        </tbody> -->

  </table>

  <script src="jquery.js"></script>
  <script>
    $(document).ready(function() {

      function load_table_data(page) {
        $.ajax({
          url: "patient_table_data_retrive.php",
          type: "POST",
          data: {
            page_no: page
          },
          success: function(data) {
            // console.log(data);
            if (data === "No Data") {
              $("#ajaxbtn_for_patient_table").html("Finished");
              $("#ajaxbtn_for_patient_table").prop("disabled", true);
            } else {
              $("#pagination").remove();
              $("#patient_table").append(data);
            }
          }

        });
      }
      load_table_data();

      $(document).on("click", "#ajaxbtn_for_patient_table", function() {
        $("#ajaxbtn_for_patient_table").html("loading...");
        var page_id = $(this).data("id");
        // console.log( page_id);
        load_table_data(page_id);
      });

      $("#patient_search").on("keyup", function() {
        $.ajax({
          url: "patient_data_live_search.php",
          data: $("#patient_live_search_form").serialize(),
          success: function(data) {
            $("#patient_table").html(data);
            console.log(data);
          }

        });
      })




    });
  </script>
</body>

</html>