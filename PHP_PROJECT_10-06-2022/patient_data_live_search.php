<?php
include 'connect.php';
if(isset($_REQUEST['patient_search'])){
    $search =$_REQUEST['patient_search'];
$sql = "SELECT * FROM patient_table WHERE id LIKE '%{$search}%' OR name LIKE '%{$search}%' ";
$result = $conn->query($sql);
$output = "";
if ($result->num_rows > 0) {
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
    echo $output;
}else {
    echo "No Data";
}

}



?>