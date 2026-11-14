<?php

$dsn="mysql:host=localhost;dbname=phptest";
$user="root";
$pwd="";
try {
    $con=new PDO($dsn,$user,$pwd);
   // echo "Connexion avec succés";
} catch (Exception $e) {
    echo "Echec de connexion :".$e->getMessage();
}
?>