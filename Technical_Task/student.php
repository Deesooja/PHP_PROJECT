<?php
include 'include.php';
// echo "student page";
if (isset($_REQUEST['save'])) {
    if (($_REQUEST['name'] == "") || ($_REQUEST['class'] == "") || ($_REQUEST['section'] == "") || ($_REQUEST['adhaar'] == "")) {
        echo "Fill the all fieled <hr> <br>";
    } else {
        $name = $_REQUEST['name'];
        $class = $_REQUEST['class'];
        $section = $_REQUEST['section'];
        $adhaar = $_REQUEST['adhaar'];
        $sql = "INSERT INTO studentinfo(name,class,section,adhaar) VALUES('$name', '$class','$section','$adhaar')";
        $result = $conn->query($sql);
        if ($result) {
            echo "Data Submited";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="studentmain1">
        <form action="" method="post" class="studentmaininfo">
            <label for="name">Name</label>
            <input type="text" name="name"><br>

            <label for="class"> Class</label>
            <input type="text" name="class"><br>

            <label for="Section"> Section</label>
            <input type="text" name="section"><br>

            <label for="adhaar">Adhaar No.</label>
            <input type="number" name="adhaar"><br>
            <input type="submit" name="save" value="Save">

        </form>
        <table>
            <thead>
                <tr>
                    <th> Id</th>
                    <th> Name</th>
                    <th> Class</th>
                    <th> Section</th>
                    <th> Adhaar</th>
                </tr>

            </thead>
            <tbody>
                <?php

                $sql = "SELECT* FROM studentinfo";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row =  $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["class"] . "</td>";
                        echo "<td>" . $row["section"] . "</td>";
                        echo "<td>" . $row["adhaar"] . "</td>";

                        echo "</tr>";
                    }
                }
                ?>

            </tbody>
        </table><br><br>

        <?php


        ?>
    </div>




    <div class="studentmain2">


        <form action="" method="post" class="studentmainsearch">
            <label for="name">Name</label>
            <input type="text" name="name"><br>

            <label for="class"> Class</label>
            <input type="text" name="class"><br>

            <label for="adhaar">Adhaar No.</label>
            <input type="number" name="adhaar"><br>
            <input type="submit" name="search" value="search">

        </form>

        <table>
            <thead>
                <?php
                // include 'include.php';


                if (isset($_REQUEST['search'])) {
                    if (($_REQUEST['name'] == "") || ($_REQUEST['class'] == "") || ($_REQUEST['adhaar'] == "")) {
                        echo "Fill the all fieled <hr> <br>";
                    } else {
                        $name = $_REQUEST['name'];
                        $class = $_REQUEST['class'];
                        $adhaar = $_REQUEST['adhaar'];
                        $sql = "SELECT* FROM studentinfo WHERE name='$name' AND class='$class' AND adhaar='$adhaar' ";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        if ($result->num_rows > 0) {
                            echo " <th> Id</th>";
                            echo "<th> Name</th>";
                            echo " <th> Class</th>";
                            echo "<th> Section</th>";
                            echo "<th> Adhaar</th>";
                        }
                    }
                }
                ?>
            </thead>
            <tbody>
                <?php
                if (isset($_REQUEST['search'])) {
                    if (($_REQUEST['name'] == "") || ($_REQUEST['class'] == "") || ($_REQUEST['adhaar'] == "")) {
                        echo "Fill the all fieled <hr> <br>";
                    } else {
                        $name = $_REQUEST['name'];
                        $class = $_REQUEST['class'];
                        $adhaar = $_REQUEST['adhaar'];
                        $sql = "SELECT* FROM studentinfo WHERE name='$name' AND class='$class' AND adhaar='$adhaar' ";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        if ($result->num_rows > 0) {

                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["class"] . "</td>";
                            echo "<td>" . $row["section"] . "</td>";
                            echo "<td>" . $row["adhaar"] . "</td>";

                            echo "</tr>";
                        } else {
                            echo "Error";
                        }
                    }
                }



                ?>
            </tbody>
        </table>

    </div>
</body>


</html>