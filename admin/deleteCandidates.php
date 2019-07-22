<?php 
    ini_set('display_errors' , 1);
    require_once 'config.php';

    $id = $_POST['id'];
    $cn = $_POST['cn'];


    $sql = " DELETE FROM  tblCandidates  WHERE  ClassNumber = '$cn'";

    if ($link->query($sql) === true) { //if query is successful
        $sql2 = " delete from tblVotes where CandidateId = '$id'";
        if ($link->query($sql2) === true) {
        echo 1;
    } else { 
        $truth = false;
        echo 0;
    }
}
?>