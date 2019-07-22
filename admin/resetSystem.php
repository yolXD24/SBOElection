<?php 
    ini_set('display_errors', 1);
    require_once 'config.php';

   $sql="TRUNCATE tblCandidates"; 
   $sql2="TRUNCATE tblVotes"; 
   $sqlX="TRUNCATE tblCandidates2"; 
   $sql2X="TRUNCATE tblVotes2"; 
   $sql3="UPDATE tblVoter set status = 'False'"; 
   $sql4="UPDATE tblVoter2 set status = 'False'"; 
   if ($link->query($sql) === true && $link->query($sql2) === true && $link->query($sql3) === true && $link->query($sql4) === true && $link->query($sqlX) === true && $link->query($sql2X) === true) {
    echo "<script> alert('Reset Successful!') </script>";
    echo "Reset Successful!<br>";
    echo "<a href='adminpanel.php'>back to home</a>";
   }
   else{
       echo "<script> alert('Something Went Wrong!') </script>";
    }
    $link->close();

?>