<?php
session_start();
    $_SESSION['logins'] = false;
session_destroy();

header("Location: login.php");
exit;
?>