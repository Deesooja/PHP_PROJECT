<?php
include 'connect.php';
session_start();

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
    <title>Patient profile</title>
</head>

<body>
    <h2 style="text-align:center">Patien Profile</h2>
    <div class="main">
        <div class="card">
            <img src="images\male.jpg" alt="John" style="width:100%" class="image">
            <h1 id="profile_name"></h1>
        </div>
        <div class="right">
            <div class="rightleft">
                <p id="name"> Name:-</p>
                <p id="age"> Age:-</p>
                <p id="gender"> Gender:-</p>
                <!-- <p id="disease_resion" >Disease/Resion :-</p> -->
                <div >
                    <h3>Disease/Resion :-</h3>
                    <ul id="disease_resion">  </ul>
                </div>

            </div>
            <div class="add_new_desease">
                <form id="addnew_deseases">
                    <textarea name="testaria" id="testaria" cols="30" rows="10" placeholder="Disease/Resion"></textarea>
                    <input type="button" id="submit" name="submit" value="Submit">
                </form>
            </div>

        </div>
        <div id="out">


        </div>
    </div>
    <script src="jquery.js"></script>



    <script>
        $(document).ready(function() {

            //------------- DATA RETRIVE FROM PATIENTA_TABLE------------

            $.getJSON(
                "patient_profiel_data_retrive_patient_table.php",
                function(data) {
                    // console.log(data);
                    $.each(data, function(key, value) {
                        // console.log(value.id);
                        $("#profile_name").append(value.name);
                        $("#name").append(value.name);
                        $("#age").append(value.age);
                        $("#gender").append(value.gender);

                    })

                }
            )
            //------ DATA RETRIVE FROM diseases_reason_table------------

            function deseases_data_deseases() {
                $.ajax({
                    url: "patient_profiel_data_retrive_deseases_table.php",
                    type: "GET",
                    success: function(data) {
                        // $(data).appendTo("#disease_resion");
                        $("#disease_resion").html(data);

                        // console.log(data);
                        // $("#disease_resion").append(data);
                        //  $.each(data,function(key,value){
                        //      $(".rightleft").append(value.name);
                        //     $(".rightright").append(value.name +""+ value.mobile +""+ value.email +""+ value.username);
                        //      $("#mobile").append(value.mobile);
                        //      $("#email").append(value.email);
                        //      $("#username").append(value.username);
                        //  })
                    }


                });

            }
            deseases_data_deseases();


             //------ INSERT DATA INTO  diseases_reason_table--------
             
             $("#submit").on("click", function(e) {
                $.ajax({
                    url: "patient_profiel_textaria.php",
                    type: "POST",
                    data: $('#addnew_deseases').serialize(),
                    success: function(data) {
                        deseases_data_deseases();
                        $('#addnew_deseases').trigger("reset");
                        // alert(data);
                        // console.log(data)
                        // alert(data);
                        // if (data ==="data_Inserted") {
                        //     $('#addnew_deseases').trigger("reset");
                        // } else {
                        //     alert(data);
                        // }
                    }

                });
            });

        })
    </script>
    <!-- <script>
        $(document).ready(function() {
            $.getJSON(
                "patient_profiel_data_retrive_deseases_table.php",
                function(data) {
                    console.log(data);
                    $.each(data, function(key, value) {
                        // console.log(value.id);
                        console.log(value.diseases_reason);
                        $("#disease_resion").append(value.diseases_reason);

                    })

                }
            )


        })
    </script> -->
    <!-- <script>
        $(document).ready(function() {
            function deseases_data_deseases() {
                $.ajax({
                    url: "patient_profiel_data_retrive_deseases_table.php",
                    type: "GET",
                    success: function(data) {
                        $(data).appendTo("#disease_resion");

                        // console.log(data);
                        // $("#disease_resion").append(data);
                        //  $.each(data,function(key,value){
                        //      $(".rightleft").append(value.name);
                        //     $(".rightright").append(value.name +""+ value.mobile +""+ value.email +""+ value.username);
                        //      $("#mobile").append(value.mobile);
                        //      $("#email").append(value.email);
                        //      $("#username").append(value.username);
                        //  })
                    }


                });

            }
            deseases_data_deseases();

        });
    </script> -->

    <!-- <script>
        $(document).ready(function() {
            $("#submit").on("click", function(e) {
                $.ajax({
                    url: "patient_profiel_textaria.php",
                    type: "POST",
                    data: $('#addnew_deseases').serialize(),
                    success: function(data) {
                        deseases_data_deseases();
                        $('#addnew_deseases').trigger("reset");
                        alert(data);
                        // console.log(data)
                        // alert(data);
                        // if (data ==="data_Inserted") {
                        //     $('#addnew_deseases').trigger("reset");
                        // } else {
                        //     alert(data);
                        // }
                    }

                });
            });

        });
    </script> -->


</body>

</html>