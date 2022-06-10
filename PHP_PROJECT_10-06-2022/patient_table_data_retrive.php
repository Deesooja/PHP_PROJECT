<?php
// include 'connect.php';

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "student";
$conn  = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed");
}
// echo "Connection Successfull <hr>";

$limit = 5;
if (isset($_POST['page_no'])) {
    $page = $_POST['page_no'];
} else {
    $page = 0;
}

$sql = "SELECT * FROM patient_table LIMIT {$page} , $limit ";
$result = $conn->query($sql);
$output = "";
if ($result->num_rows > 0) {
    //  echo '<pre>';
    //  echo print_r("$result");
    //  echo '</pre>';
    
    $output .= "<tbody>";


    while ($row = $result->fetch_assoc()) {
        // echo '<pre>';
        // echo print_r($row);
        // echo '</pre>';

        $last_id = $row["id"];
        $output .= "<tr>
        <td>{$row["id"]}</td>
        <td>{$row["name"]}</td>
        <td>{$row["age"]}</td>
        <td>{$row["gender"]}</td>
        <td><form method='POST'>
        <input  type='hidden' name='view' value='{$row["id"]}'>
<input type='submit' name='patient_view' value='View' class='patient_view_submit'>
</form></td>
    </tr>";
    }
    $output .= "</tbody>";
    $output .= "<tbody id='pagination'>
     <tr>
      <td colspan=''>
    
     <button id='ajaxbtn_for_patient_table' data-id='{$last_id}'>Load More</button>
     </td>
     </tr>
     </tbody>";

    echo $output;
} else {
    echo "No Data";
}
