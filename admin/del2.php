<?php 
    ini_set('display_errors' , 1);
    require_once 'config.php';

    $id = $_POST['id'];
    $cn = $_POST['cn'];

    $sql = "DELETE FROM  tblCandidates2  WHERE  CandidateId  = '$cn'";

    if ($link->query($sql) === true) { //if query is successful
        $sql2 = " delete from tblVotes2 where CandidateId = '$id'";
        if ($link->query($sql2) === true) {
        echo 1;
    } else { 
        $truth = false;
        echo 0;
    }
}
?>