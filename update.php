<?php
session_start();

require_once 'cnx.php';
if(isset($_SESSION["id"])){
    $id=$_SESSION["id"];
    $sql=$con->prepare("select * from personne where id=?");
    $sql->execute([$id]);
}
if($_POST)
    {
        $cin=$_POST["cin"];
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $genre=$_POST["genre"];
        $age=$_POST["age"];
        $ville=$_POST["ville"];

        $sql=$con->prepare("update personne set nom=?,prenom=?,genre=?,age=?,ville=? where id=?");
        $sql->execute([$nom,$prenom,$genre,$age,$ville,$id]);
        header('location:acceuil.php');
        unset($_SESSION["id"]);//detruire la variable de session id
        exit();//quitter le script en cours

    }
?>