<?php
ini_set("display_errors",1);
session_start();
require "config.php";

$candid = $_POST["candid"];
$candid = array_unique($candid);


$resp = null;

for ($i = 0; $i < count($candid); $i++) {
    $check = "select * from  tblCandidates where ClassNumber  = '$candid[$i]'";
    $checking = $link->query($check);
    if ($checking->num_rows == 0) {

        $sql = "INSERT INTO tblCandidates(ClassNumber )
        VALUES (' $candid[$i]')";

        if ($link->query($sql) === true) { //if query is successful 
            header("Location: candidates.php");
        } else { 
            echo ("Error description: " . mysqli_error($sql));
        }
    }else{
        header("Location: candidates.php");
    }

}
// exit;
$link->close(); //disconnect from db
