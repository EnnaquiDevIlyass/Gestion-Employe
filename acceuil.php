
<?php
require_once 'cnx.php';
$sql=$con->prepare("select * from personne");
$sql->execute();
//Pour recuperer toutes les données et les stocker dans un tableau
// On utilise la methode fetchAll
$data=$sql->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="Ajouter.php">Ajouter une personne</a>
    <h1>Listes des personnes</h1>
    <table>
        <tr>
            <th>Cin</th>
            <th>Nom</th><th>Prenom</th>
            <th>Id</th><th>Cin</th>
            <th>Ville</th><th>Action</th>
        </tr>
         <?php foreach($data as $d):?>
      <tr>
        <td><?php echo //$d["cin"];
         $d->cin ?></td> 
        <td><?php echo //$d["nom"]
         $d->nom;?></td> 
        <td><?php echo //$d["prenom"] 
        $d->prenom;?></td> 
        <td><?php echo //$d["genre"]
        $d->genre; ?></td> 
        <td><?php echo //$d["age"]
        $d->age;?></td> 
        <td><?php echo //$d["ville"]
        $d->ville;?></td> 
        <td><a href="modifier.php?id=<?= $d->id ;?>">Modifier</a> | <a href="#" onclick="Supprimer(<?= $d->id ;?>)">Suprrimer</a></td>
      </tr>
    <?php endforeach ?>
</table>

<?php
// Afficher le nombre de personne
$sql=$con->prepare("select count(*) as Nbr from personne");
$sql->execute();
$compte=$sql->fetch();
?>
<p>il y a <?php echo $compte["Nbr"]?> personnes</p>
<p>il y a <?= $compte["Nbr"]?> personnes</p>
<script>
    function Supprimer(id){
            let rep=confirm("Voulez-vous vraiment supprimer ")
            if (rep){
                window.location.href=`delete.php?id=${id}`
            }
   }
</script>
</body>
</html>