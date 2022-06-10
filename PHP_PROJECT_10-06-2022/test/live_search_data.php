<?php 
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "student";
$conn  = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection Failed");
}
// echo "Connection Successfull <hr>";

if(isset($_REQUEST['user_search'])){
    $search =$_REQUEST['user_search'];
$sql = "SELECT * FROM user_table WHERE id LIKE '%{$search}%' OR name LIKE '%{$search}%' ";
$result = $conn->query($sql);


$output = "";
$output .= "<table>";
$output .= "<thead>
<tr>
<th>Name</th>
<th>Mobile</th>
<th>Email</th>
</tr>
</thead>";

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
        <td>{$row["name"]}</td>
        <td>{$row["mobile"]}</td>
        <td>{$row["email"]}</td>
    </tr>";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    // $output .= "<tbody id='pagination'>
    //  <tr>
    //   <td colspan='3'>
    
    //  <button id='ajaxbtn' data-id='{$last_id}'>Load More</button>
    //  </td>
    //  </tr>
    //  </tbody>";

    echo $output;
} else {
    echo "No Data";
}

}
