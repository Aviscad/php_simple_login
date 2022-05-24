<?php
//PDO COONNECTION
$username="viscad"; 
$password="viscad";
$servername="localhost";
$databasename="login-test";

$dsn = "mysql:host=${servername};dbname=${databasename}";

try {
    $conn = new PDO($dsn,$username,$password);
} catch (PDOException $e) {
    echo $e->getMessage();
}


