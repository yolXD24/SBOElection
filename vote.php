<?php
session_start();
ini_set('display_errors', 1);

require_once "config.php";
$votes = $_POST["votes"];
$resp = [];

// $user = $_SESSION["ClassNumber"];   
for ($i = 0; $i < count($votes); $i++) {
    echo $votes[$i];
    $sql = "INSERT INTO tblVotes (ClassNumber , CandidateId)
        VALUES(".$_SESSION['ClassNumber'].",$votes[$i])";

    
    if ($link->query($sql) === true) { //if query is successful
        $link->query("UPDATE tblVoter set status = 'True' where ClassNumber =" .$_SESSION['ClassNumber'] );
        array_push($resp, 1);
    } else { 
        array_push($resp, 'fail');
    }

    
}

$link->close();
?>