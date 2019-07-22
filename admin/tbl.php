<?php
ini_set("display_errors",1);
require 'config.php';
$cns =[];
$sql = "SELECT CandidateId FROM tblVotes";
$resultx = $link->query($sql);
$rank = 1;
if ($resultx->num_rows > 0) {

    while ($row = $resultx->fetch_assoc()) {
       $cns[] = $row['CandidateId'];
        }
}

print_r($cns);
?>