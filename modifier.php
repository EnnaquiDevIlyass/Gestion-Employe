<?php 
session_start();
require_once 'cnx.php';
if($_GET)
{
    $id=$_GET["id"];
    $_SESSION['id']=$id;
    $sql=$con->prepare("select * from personne where id=?");
    $sql->execute([$id]);

    $data=$sql->fetch();
   /*  echo "<p>Cin:".$data["cin"]."</p>";
    echo "<p>Nom:".$data["nom"]."</p>";
    echo "<p>Prénom:".$data["prenom"]."</p>";
    echo "<p>Genre:".$data["genre"]."</p>";
    echo "<p>Age:".$data["age"]."</p>";
    echo "<p>Ville:".$data["ville"]."</p>"; */
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modification d'une personne</h1>
    <table>
        <form action="update.php" method="post">
            <tr><td>CIN :</td><td><input type="text" name="cin" value="<?= $data["cin"] ?>"></td></tr>
            <tr><td>Nom:</td><td><input type="text" name="nom" id="" value="<?= $data["nom"] ?>"></td></tr>
            <tr><td>Prénom:</td><td><input type="text" name="prenom" id="" value="<?= $data["prenom"] ?>"></td></tr>
            <tr><td>Genre:</td><td><input type="radio" name="genre" value="M" 
            <?php if($data["genre"]==='M') echo 'checked' ?>
            >M <input type="radio" name="genre" value="F"
            <?php if($data["genre"]==='F') echo 'checked' ?>
            >F</td></tr>
            <tr><td>Age:</td><td><input type="number" name="age" id="" value="<?= $data["age"] ?>"></td></tr>
            <tr><td>Ville:</td><td><input type="text" name="ville" id="" value="<?= $data["ville"] ?>"></td></tr>
            <tr><td></td><td><input type="submit" value="Enregistrer"></td></tr>
        </form>
    </table>
</body>
</html>
