<?php 
  require_once 'cnx.php';
  if($_POST){
    $cin=$_POST["cin"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $genre=$_POST["genre"];
    $age=$_POST["age"];
    $ville=$_POST["ville"];
    $sql=$con->prepare('insert into personne(cin, nom, prenom, genre, age, ville) values (?, ?, ?, ?, ?, ?)');
    $sql -> execute([$cin, $nom, $prenom, $genre, $age, $ville]);
    header("location:acceuil.php");
    exit();
  }
?>