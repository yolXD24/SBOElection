<?php
session_start();
ini_set('display_errors', 1);
require_once "config.php";

$email = $_POST["email"];
$pwd = $_POST["pw"];   


$password = md5($pwd);

$sql1 = "SELECT username ,email ,password FROM tblAdmin where  BINARY email ='$email' or BINARY username = '$email' and password = '$password' ";
$result = $link->query($sql1);

if ($result->num_rows > 0) {
    $_SESSION["logins"] = true;
    $_SESSION["user"] = $email;
    $_SESSION["user"] = $email;
    echo $_SESSION["user"];
    echo 1;
    
} else {
    echo 0;
}

$link->close();

?>