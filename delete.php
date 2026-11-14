<?php 
require_once 'cnx.php';
if($_GET)
{
    $id=$_GET["id"];
    $sql=$con->prepare("delete from personne
    where id=?");
    $sql->execute([$id]);
    header('location:acceuil.php');
    exit();
}
?>
