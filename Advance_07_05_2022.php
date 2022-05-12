<!--------------- OBJECT ORIRENTED APROCH -------------------->
<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "phpmyadmin";
$conn  = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed");
}
echo "Connection Successfull <hr>";

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
     <!---------------------PHP CODE FOR RETRIVE DATE INTO DATABASE IN FORM  ------------------->
     <?php
            if (isset($_REQUEST['edit'])) {
                $sql = "SELECT *FROM student WHERE id={$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            ?>
            <!---------------------PHP CODE FOR RETRIVE DATE INTO DATABASE IN FORM  END ------------------->
    <div class="main">
        <div class="left">
           
            <form action="" method="POST" class="form">

                <label for="name" class="name"> Name </label>
                <input type="text" name="name" placeholder="Name" class="box" value="<?php if (isset($row['name'])) {
                                                                                            echo $row['name'];
                                                                                        }  ?>"><br><br>
                <label for="roll" class="roll"> Roll</label>
                <input type="text" placeholder="Roll" name="roll" class="box" value="<?php if (isset($row['roll'])) {
                                                                                            echo $row['roll'];
                                                                                        }  ?>"><br><br>
                <label for="address" class="id">Address</label>
                <input type="text" name="address" placeholder="Address" class="box" value="<?php if (isset($row['address'])) {
                                                                                                echo $row['address'];
                                                                                            }  ?>"><br><br>
                <div class="leftmain">
                    <input type="hidden" name="id" value="<?php echo $row['id'];  ?>">
                    <input type="submit" value="UPDATE" name="update" class="update"><br>
                    <button name="add" style="margin:2px ;" class="add"> ADD</button>
                </div>

            </form>

        </div>
        <div class="right">
            <!--------------------------- TABLE --------------------------->
            <table>
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> Name</th>
                        <th> roll</th>
                        <th> address</th>
                        <th> DELETE</th>
                        <th> Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <!---------------------PHP CODE FOR RETRIVE DATE INTO DATABASE IN TABLE  ------------------->

                    <?php $sql = "SELECT * FROM student";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["roll"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo '<td>
                        <form method="post">
                                <input type="hidden" name="id" value= ' . $row["id"] . '>
                             <input type="submit" value="Delet" name="delet" >
                        </form></td>';
                            echo '<td>
                        <form method="post">
                                <input type="hidden" name="id" value= ' . $row["id"] . '>
                             <input type="submit" value="Edit" name="edit">
                        </form></td>';
                            echo "</tr>";
                        }
                    }
                    ?>

        </div>
    </div>












    <!---------------------PHP CODE FOR UPDATE DATE INTO DATABASE SHOW IN TABLE  ------------------->

    <?php
    if (isset($_REQUEST['update'])) {
        if (($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == "")) {
            echo "<small>fill AIIL FIELD </small> <br>";
        } else {
            $name = $_REQUEST['name'];
            $roll = $_REQUEST['roll'];
            $address = $_REQUEST['address'];
            $sql = "UPDATE student SET name='$name', roll='$roll', address='$address' WHERE id={$_REQUEST['id']}";

            if ($conn->query($sql) === true) {
                echo "Date updated <br>";
            } else {
                echo "NOT Updated";
            }
        }
    }

    ?>
    <!---------------------PHP CODE FOR UPDATE DATE INTO DATABASE SHOW IN TABLE END  ------------------->



    <!---------------------PHP CODE FOR DELET DATE INTO DATABASE SHOW IN TABLE  ------------------->
    <?php
    if (isset($_REQUEST['delet'])) {

        $sql = "DELETE FROM student WHERE id={$_REQUEST['id']}";
        if ($conn->query($sql) === true) {
            echo "Date DELETED <br>";
        } else {
            echo "NOT DELETED";
        }
    }

    ?>






    <!---------------------PHP CODE FOR UPDATE DATE INTO DATABASE SHOW IN TABLE END  ------------------->









    <!---------------------PHP CODE FOR INSERT DATE INTO DATABASE SHOW IN TABLE  ------------------->
    <?PHP
    if (isset($_REQUEST['add'])) {
        if (($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == "")) {
            echo "<small>fill AIIL FIELD </small> <br>";
        } else {
            $name = $_REQUEST['name'];
            $roll = $_REQUEST['roll'];
            $address = $_REQUEST['address'];
            $sql = "INSERT INTO student(name, roll, address)  VALUES('$name', ' $roll','$address')";

            if ($conn->query($sql) === true) {
                echo "Date ADDED <br>";
            } else {
                echo "NOT ADDED";
            }
        }
    }
    ?>


    <!---------------------PHP CODE FOR INSERT DATE INTO DATABASE SHOW IN TABLE END  ------------------->








</body>

</html>