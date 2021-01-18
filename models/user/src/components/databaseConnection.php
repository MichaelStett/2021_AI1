<?php

$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="arturino";


try {
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUsername, $dbPassword);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
