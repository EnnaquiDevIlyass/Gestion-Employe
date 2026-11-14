<?php 
require_once 'cnx.php';
    $tab=[];//Pour stocker les erreurs 
    if($_POST){
        $cin=$_POST["cin"];
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $genre=$_POST["genre"];
        $age=$_POST["age"];
        $ville=$_POST["ville"];
        if(empty($cin)){
            $tab["cin"]="Cin est requis";
        }
        else{
            $sql=$con->prepare("select * from personne where cin like ?");
            $sql->execute(["%".$cin."%"]);
            $cmp=$sql->fetch();
            if($cmp){
                $tab["cin"]="Cin deja existe";
            }
        }
        if(empty($nom)){
            $tab["nom"]="Nom est requis";
        }
        if(empty($prenom)){
            $tab["prenom"]="Prenom est requis";
        }
        if(empty($genre)){
            $tab["genre"]="Genre est requis";
        }
        if(empty($age)){
            $tab["age"]="Age est requis";
        }
        if(empty($ville)){
            $tab["ville"]="Ville est requis";
        }
        if(empty($tab)){    
            $sql=$con->prepare('insert into personne(cin, nom, prenom, genre, age, ville) values (?, ?, ?, ?, ?, ?)');
            $sql -> execute([$cin, $nom, $prenom, $genre, $age, $ville]);
            header("location:acceuil.php");
            exit();
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .err{
            color:red;
        }
    </style>

</head>
<body>
    <div class="contain">
    <h1>Ajout d'une personne: </h1>
    <table>
      <form action="" method="post">
        <tr><td>CIN: </td><td><input type="text" name="cin" id="cin"></td><td><span class="err"><?php if(isset($tab["cin"])){echo $tab["cin"] ;} ?></span></td></tr>
        <tr><td>Nom: </td><td><input type="text" name="nom" id="nom"></td><td><span class="err"><?php if(isset($tab["nom"])){echo $tab["nom"]; } ?></span></td></tr>
        <tr><td>Prenom: </td><td><input type="text" name="prenom" id="prenom"></td><td><span class="err"><?php if(isset($tab["prenom"])){echo $tab["prenom"] ;} ?></span></td></tr>
        <tr>
          <td>Genre: </td>
          <td>
            <input type="radio" name="genre" value="M">M
            <input type="radio" name="genre" value="F">F
          </td><td><span class="err"><?php if(isset($tab["genre"])){echo $tab["genre"]; } ?></span></td>
        </tr>
        <tr><td>Age: </td><td><input type="number" name="age" id="age"></td><td><span class="err"><?php if(isset($tab["age"])){echo $tab["age"] ;} ?></span></td></tr>
        <tr><td>Ville: </td><td><input type="text" name="ville" id="ville"></td><td><span class="err"><?php if(isset($tab["ville"])){echo $tab["ville"]; } ?></span></td></tr>
         <tr></td><td><td><input type="submit" name="btn" value="Enregistrer"></td></tr>
      </form>
    </table>
  </div>
</body>
</html>