<?php

$dsn = "mysql:host=localhost;dbname=vtdb_controle";
$dbusername = "root";
$dbpassword = "";

try{
    
    $pdo = new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo ("Error: ".$e->getMessage());

}





