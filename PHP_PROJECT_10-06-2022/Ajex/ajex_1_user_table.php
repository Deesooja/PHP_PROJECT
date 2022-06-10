<?php
include 'connect.php';
// include 'connect.php';

$sql = "SELECT * FROM user_table";
$result = $conn->query($sql);
$output="";
 if($result->num_rows>0){
    //  echo '<pre>';
    //  echo print_r("$result");
    //  echo '</pre>';
    
     $output = '<table>
     <tr>
         <th>Name</th>
         <th>Mobile</th>
         <th>Email</th>
     </tr>';
     while($row = $result->fetch_assoc()){
        $output .= "<tr>
        <td>{$row["name"]}</td>
        <td>{$row["mobile"]}</td>
        <td>{$row["email"]}</td>
    </tr>";
     }
     $output .="</table>";
     echo $output;
 }else{
     echo "No Data";
 }



?>