<?php
$dsn = "mysql:dbname=crunchandmunch;host:localhost";
$username = "root";
$password = "";

$conn = new PDO($dsn, $username, $password, array(
    PDO::ATTR_PERSISTENT => true
));

?>