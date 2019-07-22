<?php 
require_once "config.php";
    $sql = "SELECT ClassNumber , Name , Status from tblVoter";
    $list = array();
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
             $json_array['ClassNumber'] = $row['ClassNumber'];
             $json_array['Name'] = $row['Name'];
             $json_array['Status'] = $row['Status'];
             array_push($list , $json_array);
        }
    }
?>