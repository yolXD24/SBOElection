<?php

define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', 'drb4x76fQU');
define('DB_PASSWORD', 'gKBEP1wVs5');
define('DB_NAME', 'remotemysql.com');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME,3306);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
