<?php
session_start();
    $_SESSION['login'] = false;
    unset($_SESSION['userog']);
    unset($_SESSION['ClassNumber']);
session_destroy();

header("Location: login.php");
exit;
?>