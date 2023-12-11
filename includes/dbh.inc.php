<?php 
$dsn = "mysql:host=localhost;dbname=myfirstdatabase";  //dsn:DATA SOURCE NAME
$dbusername="root";
$dbpassword=" ";

try {
    $pdo=  new PDO($dsn, $dbusername, $dbpassword);//pdo: php data object, a way of connecting to database, other way is MySQLI
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERROMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e ->getMessage();
}