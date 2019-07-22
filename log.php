<?php
session_start();
ini_set('display_errors', 1);
require_once "config.php";
$cn = $_POST["cn"];
$email = $_POST["email"];
$pwd = $_POST["pw"];   


$password = md5($pwd);

$resp= null;

$sql1 = "SELECT Distinct Name,ClassNumber , Status ,password FROM tblVoter where BINARY email ='$email' and ClassNumber = '$cn' and password = '$password' ";
$result = $link->query($sql1);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION["ClassNumber"] = $row['ClassNumber'];
        $_SESSION["login"] = true;
        $_SESSION['userlog'] = 2;
        $resp  =  $row['Status'];
    }
} else {
   $resp = 0;
}
if ($resp  == 'True') {
    // header('Location:thankyou.php');
    $_SESSION["login"] = false;
}
echo $resp;

$link->close();

?>